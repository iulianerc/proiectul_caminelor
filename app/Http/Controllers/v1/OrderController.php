<?php

namespace App\Http\Controllers\v1;

use App\Actions\EnumLangAction;
use App\Actions\NotifyOrderClientAction;
use App\Actions\NotifyOrderSpecialistAction;
use App\Actions\OrderReleaseAction;
use App\Exceptions\OrderPaymentService\PaymentSumException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Order\OrderChangeManagerRequest;
use App\Http\Requests\Order\OrderConfirmPaymentRequest;
use App\Http\Requests\Order\OrderRequest;
use App\Http\Requests\Order\OrderSaveConfirmationFileRequest;
use App\Http\Requests\OrderPayment\OrderPaymentRequest;
use App\Http\Resources\Order\OrderAuditsResources;
use App\Http\Resources\Order\OrderEditResource;
use App\Http\Resources\Order\OrderResource;
use App\Http\Resources\Order\OrderResourceCollection;
use App\Http\Resources\Order\PaymentMethodsResource;
use App\Http\Resources\OrderGuarantee\OrderGuaranteeResource;
use App\Http\Resources\OrderPayment\OrderPaymentListResource;
use App\Models\Order\Order;
use App\Models\OrderPayment\OrderPayment;
use App\Models\PaymentMethod\PaymentMethod;
use App\Repositories\Order\OrderRepository;
use App\Services\OrderPayment\OrderPaymentService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Merax\Helpers\Helper;
use Throwable;

class OrderController extends Controller
{
    protected OrderRepository $repository;

    public function __construct(OrderRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(): JsonResponse
    {
        return ok(new OrderResourceCollection(
            $this->repository->get(),
            OrderResource::class,
            'id'
        ));
    }

    public function store(OrderRequest $request): JsonResponse
    {
        try {
            $order = $this->repository->create($request->all());

            return created($order);
        } catch (Throwable $throwable) {
            return failed($throwable->getMessage());
        }
    }

    public function getReleaseMods(EnumLangAction $langAction)
    {
        return ok($langAction->handle(__('modules/orders.release_mode')));
    }

    public function edit(Order $order): JsonResponse
    {
        return ok(new OrderEditResource($order));
    }

    public function update(OrderRequest $request, Order $order): JsonResponse
    {
        try {
            Helper::checkConcurrentRequests($order);
            $order = $this->repository->update($request->all(), $order);

            return updated($order);
        } catch (Throwable $throwable) {
            return failed($throwable->getMessage());
        }
    }

    public function changeManager(OrderChangeManagerRequest $request): JsonResponse
    {
        try {
            $order = $this->repository->changeManager($request);

            return updated($order);
        } catch (Throwable $throwable) {
            return failed($throwable->getMessage());
        }
    }

    public function destroy(Request $request): JsonResponse
    {
        try {
            $this->repository->delete($request->id);

            return destroyed();
        } catch (Throwable $throwable) {
            failed_dependency(__('validation.status_codes.failed_dependency'));
        }
    }

    public function confirmPayment(OrderConfirmPaymentRequest $request, Order $order): JsonResponse
    {
        Helper::checkConcurrentRequests($order);

        $fieldToConfirm = $request->only(['tax_payed', 'guaranty_payed']);
        $order->update($fieldToConfirm);
        $order = $this->repository->paidStatusForTaxAndGarance($order);

        return updated($order);
    }

    public function addConfirmationFile(OrderSaveConfirmationFileRequest $request, Order $order): JsonResponse
    {
        try {
            $order->updateFile([
                'uploaded_file' => $request->confirmationFile,
                'file_name'     => $request->fileName
            ]);
        } catch (\RuntimeException $exception) {
            return failed(['message' => $exception->getMessage()]);
        }

        return updated();
    }

    public function addPayment(OrderPaymentRequest $request, OrderPaymentService $paymentService, OrderReleaseAction $releaseAction): JsonResponse
    {
        try {
            DB::beginTransaction();
            $attributes = $request->except('proof_document');
            $payment = OrderPayment::create($attributes);
            $paymentService->applyPayment($payment);
            if ($request->hasFile('proof_document')) {
                $payment->upload($request->file('proof_document'));
            }

            DB::commit();
        } catch (PaymentSumException $exception) {
            return response()->json(['message' => $exception->getMessage()]);
        } catch (Throwable $exception) {
            DB::rollBack();

            return failed($exception->getMessage());
        }

        $releaseAction->handle($payment->order);
        NotifyOrderSpecialistAction::make($payment->order)->taxPaidByMPAY($payment->payment_method->alias);
        NotifyOrderClientAction::make($payment->order)->orderReleased();

        return created(new OrderPaymentListResource($payment));
    }

    public function getLogs(Order $order)
    {
        return ok(OrderAuditsResources::collection($order->audits));
    }

    public function getPayments(Order $order): JsonResponse
    {
        return ok(OrderPaymentListResource::collection($order->payments));
    }

    public function getGuarantees(Order $order): JsonResponse
    {
        return ok(OrderGuaranteeResource::collection($order->guarantees));
    }
}
