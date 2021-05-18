<?php

namespace App\Models\Position;

use App\Models\Role\Role;
use App\Models\User\User;
use App\Traits\Mutator\AuthorId;
use App\Traits\Mutator\BasicMutators;
use App\Traits\Permission\ApplyPermissions;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use OwenIt\Auditing\Contracts\Auditable;

class Position extends Model implements Auditable
{
    use ApplyPermissions;
    use BasicMutators;
    use AuthorId;
    use \OwenIt\Auditing\Auditable;

    protected $fillable = ['name', 'alias', 'author_id'];

    protected $dates = ['created_at', 'updated_at'];
    protected $hidden = ['author'];

    public static function findByAlias(string $alias): self
    {
        return self::whereAlias($alias)->first();
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function scopeQuickFilter(Builder $query, $value): Builder
    {
        return $query->where('name', 'LIKE', "%{$value}%");
    }

    public function scopeIs(Builder $query, $value): Builder
    {
        return $query->whereAlias($value);
    }

    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }

    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class);
    }
}
