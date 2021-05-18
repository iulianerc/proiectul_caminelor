<?php

namespace App\Models\ModelLog;

use App\Traits\Mutator\AuthorId;
use App\Traits\Mutator\BasicMutators;
use App\Traits\Permission\ApplyPermissions;
use Illuminate\Database\Eloquent\Model;

class ModelLog extends Model
{
    use ApplyPermissions;
    use BasicMutators;
    use AuthorId;

    protected $fillable = [
        'id',
        'model_type',
        'model_id',
        'value_old',
        'value_new',
        'author_id',
    ];

}
