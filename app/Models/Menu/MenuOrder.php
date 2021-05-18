<?php

namespace App\Models\Menu;

use App\Models\User\User;
use App\Traits\Mutator\AuthorId;
use App\Traits\Mutator\BasicMutators;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use OwenIt\Auditing\Contracts\Auditable;

class MenuOrder extends Model implements Auditable
{
    use BasicMutators;
    use AuthorId;
    use \OwenIt\Auditing\Auditable;

    protected $fillable = [
        'user_id',
        'role_id',
        'menu_item_id',
        'parent_id',
        'order_list',
        'author_id'
    ];
    protected $dates = ['created_at', 'updated_at'];
    protected $table = 'menu_order';

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function holder(): MorphTo
    {
        return $this->morphTo('holder');
    }

    public function menuItem(): BelongsTo
    {
        return $this->belongsTo(MenuItem::class);
    }
}
