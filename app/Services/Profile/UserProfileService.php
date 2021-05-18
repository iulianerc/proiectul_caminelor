<?php


namespace App\Services\Profile;


use App\Models\User\Profile\Profile;
use App\Models\User\User;
use App\Services\Permission\PermissionService;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class UserProfileService
{
    protected ?User $user;

    protected $profile;
    protected Collection $data;

    public function __invoke(?User $user)
    {
        $this->data = collect([]);

        $this->user = $user->id ? $user : user();
        $this->checkPermission();

        try {
            $this->profile = $this->user->profile;
            //todo exception for all this methods
            $this->user()->position()->contacts()->profile()->address();

//            $alias = $this->data->get('position')['alias'];
//            if (method_exists(self::class, $alias)) {
//                $this->{$alias}();
//            }

        } catch (\Exception $exception) {

        }

        return ['profile' => $this->data->all()];
    }

    private function user(): self
    {
        $this->data->put('avatar', $this->user->getAvatarLinkAttribute());
        $this->data->put('email', $this->user->email);
        $this->data->put('status',
            $this->user->status->only(['id', 'name', 'color', 'alias'])
        );

        return $this;
    }

    private function profile(): self
    {
        if (!$this->profile) {
            throw new \Exception('Profile does not exists');
        }

        $this->data = $this->data->merge(collect($this->profile->only([
            'first_name',
            'middle_name',
            'last_name',
            'nick_name',
            'biography',
            'birth_date'
        ])));

        return $this;
    }

    private function position(): self
    {
        $this->data->put('position', $this->user->position->only(['alias', 'name']));

        return $this;
    }

    private function contacts(): self
    {
        $this->data->put('contacts', Profile::getContacts($this->user));

        return $this;
    }

    private function address(): self
    {
        $this->data->put('address',
            collect($this->profile->only(['street', 'house', 'apartment', 'zip', 'city']))
        );
        if ($this->profile->location) {
            $this->data->get('address')
                ->put('country', $this->profile->location->country->only(['id', 'name', 'meridiem_time']));
            $this->data->get('address')
                ->put('state', $this->profile->location->only(['id', 'name']));
        }

        return $this;
    }

    private function checkPermission(): void
    {
        $accessLevel = PermissionService::getAccessLevel(Route::currentRouteName());

        $ruleName = 'rule' . Str::ucfirst($accessLevel);

        if (!$this->{Str::camel($ruleName)}()) {
            throw new AccessDeniedHttpException('Access Denied for route ' . Route::currentRouteName(), null, 403);
        }
    }

    private function ruleAll(): bool
    {
        return true;
    }

    private function ruleProject(): bool
    {
        return $this->user->project_id === user()->project_id;
    }

    private function ruleOwn(): bool
    {
        return $this->user->id === user()->id;
    }

}
