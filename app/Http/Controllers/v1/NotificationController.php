<?php


namespace App\Http\Controllers\v1;


use App\Http\Controllers\Controller;
use App\Http\Requests\Notification\NotificationRequest;
use App\Http\Resources\Notification\NotificationResource;
use App\Http\Resources\Notification\NotificationResourceCollection;
use App\Mail\CustomMailNotification;
use App\Models\TelegramReceivers\TelegramReceivers;
use App\Models\User\User;
use App\Notifications\User\EmailSimpleNotification;
use App\Notifications\User\InternalSimpleNotification;
use App\Notifications\User\TelegramSimpleNotification;
use App\Repositories\InternalNotification\InternalNotificationRepository;
use App\Services\Notifications\NotificationService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;


class NotificationController extends Controller
{
    private InternalNotificationRepository $repository;

    public function __construct(InternalNotificationRepository $repository)
    {
        $this->repository = $repository;
    }

    public function list(Request  $request): JsonResponse
    {
        $result = new NotificationResourceCollection(
            new NotificationResource($this->repository->list($request->user_id))
        );
        return ok($result);
    }

    public function unread(int $page = 1, int $perPage = 10): JsonResponse
    {
        return ok(
            new NotificationResourceCollection(
                user()->unreadNotifications->forPage($page, $perPage)
            )
        );
    }

    public function read(Request $request): JsonResponse
    {
        foreach (user()->unreadNotifications->whereIN('id', $request->notification_id) as $unreadNotification) {
                $unreadNotification->markAsRead();
        }

        return updated();
    }

    public function send(NotificationRequest $request): void
    {
        foreach ($request->receivers as $channel => $receivers) {
            $methodName = Str::camel("to_{$channel}");
            if (method_exists($this, $methodName)) {
                $this->{$methodName}($request, $receivers);
            }
        }
    }

    public function toTelegram(NotificationRequest $request, $receivers): void
    {
        $receivers = TelegramReceivers::whereIn('alias', $receivers)->get();

        NotificationService::make(TelegramSimpleNotification::class)
            ->setReceivers($receivers)
            ->setAttributes($request->all())
            ->handle();
    }

    public function toMail(NotificationRequest $request,$receivers): void
    {
        $receivers = User::whereIn('id', $receivers)->get();

        NotificationService::make(EmailSimpleNotification::class)
            ->setReceivers($receivers)
            ->setAttributes($request->all())
            ->handle();
    }

    public function toInternal(NotificationRequest $request, $receiverIDS): void
    {
        $receivers = User::whereIn('id', $receiverIDS)->get();

        NotificationService::make(InternalSimpleNotification::class)
            ->setReceivers($receivers)
            ->setAttributes($request->all())
            ->handle();
    }

    public function toCustomMail(NotificationRequest $request, $receivers): void
    {
        $receivers = explode(',', $receivers);
        Mail::to($receivers)->send(new CustomMailNotification($request));
    }

}
