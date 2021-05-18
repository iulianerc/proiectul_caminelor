<?php

namespace App\Repositories\User;

use App\Filters\MultipleExact;
use App\Models\Position\Position;
use App\Models\User\User;
use App\Repositories\Repository;
use App\Sorts\Custom\Phones;
use App\Sorts\Custom\PositionName;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use LaravelMerax\Avatars\App\Models\Avatar;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\AllowedSort;
use Spatie\QueryBuilder\QueryBuilder;

/**
 * Class UserRepository
 * @package App\Repositories\User
 */
class UserRepository extends Repository
{
    protected function modelName (): string
    {
        return User::class;
    }

    /**
     * @return LengthAwarePaginator
     * @noinspection PhpUndefinedMethodInspection
     */
    public function get (): LengthAwarePaginator
    {
        $this->model
            ->setActions(config('permissions.users.modules.users.actions'))
            ->handleRowActions(['edit', 'delete', 'toggle_state', 'profile'])
            ->setAppends(['_actions']);

        return QueryBuilder::for(
            $this->model
                ->applyPermissions()
                ->with('author', 'roles', 'avatar', 'position', 'status', 'contacts')
                ->select(["{$this->model->getTable()}.*"])
        )
            ->allowedFilters([
                AllowedFilter::exact('id'),
                AllowedFilter::partial('name'),
                AllowedFilter::partial('email'),
                AllowedFilter::partial('phones','contacts.value'),
                AllowedFilter::custom('position_name', new MultipleExact(), 'position_id'),
            ])
            ->defaultSort('id')
            ->allowedSorts([
                ...[
                    'id',
                    'name',
                    'email',
                ],
                AllowedSort::custom('phones', new Phones(
                        $this->model->getTable(),
                        $this->model->getMorphClass()
                    )
                ),
                AllowedSort::custom('position_name', new PositionName($this->model->getTable()))
            ])
            ->jsonPaginate();
    }

    public function store (array $attributes): User
    {
        $userAttributes = Arr::only($attributes, $this->getFillable());
        $user = User::create($userAttributes);
        $this->setAvatar($user, $attributes['avatar']);
        $user->setContacts([
            'phone' => $attributes['phones'],
            'email' => $attributes['email']
        ]);

        return $user;
    }

    public function updateDependencies (User $user, array $attributes)
    {
        $user->clearContacts()->setContacts([
            'phone' => $attributes['phones'],
            'email' => $attributes['email']
        ]);
        $this->setAvatar($user, $attributes['avatar']);
    }

    public function setAvatar (User $user, ?UploadedFile $uploadedAvatar): void
    {
        if ($uploadedAvatar === null) {
            return;
        }
        $avatar = $user->avatar()->first();
        if ($avatar) {
            $avatar->store($uploadedAvatar);
            return;
        }
        $newAvatar = Avatar::create(['user_id' => $user->id]);
        tap($newAvatar)->upload($uploadedAvatar);
    }

    public function specialistsList (): Collection
    {
        $specialistPosition = Position::where('alias', 'specialist')->firstOrFail();

        return $this
            ->model
            ->where('position_id', $specialistPosition->id)
            ->get();
    }
}
