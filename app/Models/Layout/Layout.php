<?php


namespace App\Models\Layout;


use App\Models\Project\Project;
use App\Models\User\User;
use App\Traits\Mutator\AuthorId;
use App\Traits\Mutator\BasicMutators;
use App\Traits\Permission\ApplyPermissions;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use OwenIt\Auditing\Contracts\Auditable;

class Layout extends Model implements Auditable
{
    use ApplyPermissions;
    use BasicMutators;
    use AuthorId;
    use \OwenIt\Auditing\Auditable;

    protected $fillable = [
        'name',
        'path',
        'is_active',
        'author_id'
    ];

    protected $dates = ['created_at', 'updated_at'];

    public function author(): ?BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function projects():HasMany
    {
        return $this->hasMany(Project::class);
    }

}

