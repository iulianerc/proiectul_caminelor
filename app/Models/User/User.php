<?php

namespace App\Models\User;

use App\Contracts\Contactable;
use App\Models\Position\Position;
use App\Models\Role\Role;
use App\Models\Status\Status;
use App\Models\User\Profile\DefaultProfile;
use App\Traits\Contact\HasContacts;
use App\Traits\Mutator\AuthorId;
use App\Traits\Mutator\BasicMutators;
use App\Traits\Mutator\Uuid;
use App\Traits\Permission\ApplyPermissions;
use Glorand\Model\Settings\Traits\HasSettingsRedis;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Laravel\Passport\HasApiTokens;
use LaravelMerax\Avatars\App\Models\Avatar;
use LaravelMerax\Avatars\App\Traits\HasAvatar;
use OwenIt\Auditing\Contracts\Auditable;
use phpseclib3\Math\BigInteger;
use Spatie\Permission\Traits\HasRoles;
use Yadahan\AuthenticationLog\AuthenticationLogable;
use Yadakhov\InsertOnDuplicateKey;

/**
 * Class User
 * @package App\Models\User
 *
 * @property  string $name
 * @property  Avatar $avatar
 * @property BigInteger id
 *
 * @method static User create(array $attributes)
 */
class User extends Authenticatable implements Auditable, Contactable
{
    use ApplyPermissions;
    use HasApiTokens;
    use InsertOnDuplicateKey;
    use Notifiable;
    use HasRoles;
    use HasContacts;
    use AuthenticationLogable;
    use BasicMutators;
    use HasAvatar;
    use AuthorId;
    use Uuid;
    use \OwenIt\Auditing\Auditable;
    use HasSettingsRedis;
    use Author;

    protected $fillable = [
        'id',
        'name',
        'email',
        'password',
        'password_expired',
        'is_active',
        'position_id',
        'status_id',
        'author_id',
        'email_verified_at',
        'password_changed_at'
    ];

    protected $hidden = [
        'pivot',
        'password',
        'remember_token',
        'author',
        'roles',
        'avatar',
        'position',
        'permissions',
    ];

    protected $casts = [
        'email_verified_at'   => 'datetime',
        'password_changed_at' => 'datetime',
        'password_expired'    => 'boolean',
        'is_active'           => 'boolean',
    ];

    protected $attributes = [
        'is_active'        => false,
        'password_expired' => false,
    ];

    private $pivotModel;

    public function getRouteKeyName(): string
    {
        return 'uuid';
    }

    public function format(): array
    {
        return [
            'id'   => $this->uuid,
            'name' => $this->name
        ];
    }

    /**
     * The channels the user receives notification broadcasts on.
     *
     * @return string
     */
    public function receivesBroadcastNotificationsOn()
    {
        return 'App.user.' . $this->uuid;
    }

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->pivotModel = config('permission.models.model_has_permission');
    }

    /**
     * Find the user instance for the given username.
     *
     * @param string $username
     *
     * @return
     */
    public function findForPassport($username)
    {
        return $this->whereEmail($username)
            ->where('is_active', 1)
            ->first();
    }

    public function getEmailVerifiedAtAttribute($value): string
    {
        return \carbon($value, config('app.timezone'))->timezone(userTimezone())->format('d.m.Y H:i:s');
    }

    public function setEmailVerifiedAtAttribute($value): void
    {
        $this->attributes['email_verified_at'] = \carbon($value, userTimezone())->timezone(config('app.timezone'));
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(self::class);
    }

    public function position(): BelongsTo
    {
        return $this->belongsTo(Position::class);
    }

    public function scopeHasPositions(Builder $query, array $positions): Builder
    {
        return $query->whereHas('position', static function ($query) use ($positions) {
            $query->whereIn('positions.alias', $positions);
        });
    }

    public function syncRole(?int $roleId = null): self
    {
        if ($roleId) {
            /** @var Role $role */
            $role = Role::findById($roleId, 'api');
            $roleName = $role->name;
        } else {
            $roleName = $this->position->roles->first()->name;
        }

        $this->syncRoles($roleName);

        return $this;
    }


    public function scopeHasProjects(Builder $query, array $projects): Builder
    {
        return $query->whereHas('projects', static function ($query) use ($projects) {
            $query->whereIn('projects.id', $projects);
        });
    }

    public function getAvatarLinkAttribute()
    {
        $fileName = $this->avatar->file->saved_name ?? null;
        if (!$fileName) {
            return '';
        }

        return url(Storage::url("{$this->avatar->folder()}/{$fileName}"));
    }

    public function scopeQuickFilter(Builder $query, $value): Builder
    {
        return $query->where(static function (Builder $subquery) use ($value) {
            $subquery->orWhere('name', 'LIKE', "%{$value}%")
                ->orWhere('email', 'LIKE', "%{$value}%");
        });
    }

    public function scopeRolesFilter(Builder $query, $value): Builder
    {
        $roles = config('permission.table_names.roles');
        $modelHasRoles = config('permission.table_names.model_has_roles');
        return $query->whereExists(static function ($query) use ($roles, $modelHasRoles, $value) {
            $query->select(DB::raw(1))
                ->from($roles)
                ->join($modelHasRoles, "{$modelHasRoles}.role_id", "{$roles}.id")
                ->where("{$modelHasRoles}.model_type", User::class)
                ->whereIn("{$roles}.id", is_array($value) ? $value : [$value])
                ->whereRaw("{$modelHasRoles}.model_id = users.id");
        });
    }

    public function setPasswordAttribute($value): void
    {
        $this->attributes['password'] = Hash::make($value);
    }

    public function getPositionNameAttribute($value)
    {
        return $this->position->name;
    }

    //TODO исправить сид связанный с пользователями
    public function role(): ?Role
    {
        return $this->roles->first();
    }

    public function getRoleNameAttribute($value)
    {
        return $this->role()->name ?? '';
    }

    public function getProjectNameAttribute($value)
    {
        return $this->project->name ?? '';
    }

    public function profile(): HasOne
    {
        return $this->hasOne(DefaultProfile::class);
    }

    public function parents(): BelongsToMany
    {
        return $this->belongsToMany(
            self::class,
            'user_relations',
            'user_id',
            'parent_id'
        )->with('position');
    }

    public function parentsByPosition(string $position): Collection
    {
        return $this->parents()
            ->get()
            ->filter(fn($user) => $user->position->alias === $position);
    }

    public function children(): belongsToMany
    {
        return $this->belongsToMany(
            self::class,
            'user_relations',
            'parent_id',
            'user_id'
        )->with('position');
    }

    public function childrenByPosition(string $position): Collection
    {
        return $this->children()
            ->get()
            ->filter(fn($user) => $user->position->alias === $position);
    }

    public function userFile(): HasMany
    {
        return $this->hasMany(UserFile::class);
    }

    public function status(): BelongsTo
    {
        return $this->belongsTo(Status::class);
    }

    public function getStatusNameAttribute($value): ?string
    {
        if ($this->status === null) {
            return null;
        }

        return $this->status->name;
    }

    public function rooms(): BelongsToMany
    {
        return $this->belongsToMany(Room::class, 'chat_user_room');
    }

    public function isAn(string $position): bool
    {
        return $this->position->alias === $position;
    }

    public function directorLegalEntities()
    {
        return $this->hasMany(LegalEntity::class, 'director_id');
    }

    public function accountantLegalEntities()
    {
        return $this->hasMany(LegalEntity::class, 'accountant_id');
    }

    public function mainRegisters()
    {
        return $this->hasMany(MainRegister::class, 'author_id');
    }
}
