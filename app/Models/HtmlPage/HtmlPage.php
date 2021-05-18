<?php


namespace App\Models\HtmlPage;


use App\Models\User\User;
use App\Traits\Mutator\AuthorId;
use App\Traits\Mutator\BasicMutators;
use App\Traits\Permission\ApplyPermissions;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use OwenIt\Auditing\Contracts\Auditable;

class HtmlPage extends Model implements Auditable
{
    use ApplyPermissions;
    use BasicMutators;
    use AuthorId;
    use \OwenIt\Auditing\Auditable;

    protected $fillable = [
        'name',
        'alias',
        'content',
        'content',
        'publish_date',
        'author_id'
    ];

    protected $dates = ['created_at', 'updated_at'];

    protected $hidden = ['author'];

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function scopeQuickFilter(Builder $query, $value): Builder
    {
        return $query
            ->where('name', 'LIKE', "%{$value}%")
            ->orWhere('alias', 'LIKE', "%{$value}%")
            ->orWhere('content', 'LIKE', "%{$value}%")
        ;
    }

}
