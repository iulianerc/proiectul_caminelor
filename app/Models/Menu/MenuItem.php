<?php

namespace App\Models\Menu;

use App\Traits\Mutator\AuthorId;
use App\Traits\Mutator\BasicMutators;
use App\Traits\Permission\ApplyPermissions;
use App\Models\User\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use OwenIt\Auditing\Contracts\Auditable;

class MenuItem extends Model implements Auditable
{

    use ApplyPermissions;
    use BasicMutators;
    use AuthorId;
    use \OwenIt\Auditing\Auditable;

    protected $fillable = ['author_id', 'name_ru', 'name_ro', 'name_en', 'icon', 'link'];
    protected $dates = ['created_at', 'updated_at'];
    protected $hidden = ['author'];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function menuOrder(): HasMany
    {
        return $this->hasMany(MenuOrder::class);
    }

    public function scopeQuickFilter(Builder $query, $value): Builder
    {
        return $query->where(static function (Builder $subquery) use ($value) {
            $subquery->orWhere('name_ru', 'LIKE', "%{$value}%")
                ->orWhere('name_ro', 'LIKE', "%{$value}%")
                ->orWhere('name_en', 'LIKE', "%{$value}%");
        });
    }
}
