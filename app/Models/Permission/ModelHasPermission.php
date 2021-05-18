<?php

namespace App\Models\Permission;

use Illuminate\Database\Eloquent\Model;
use Yadakhov\InsertOnDuplicateKey;

class ModelHasPermission extends Model
{
    use InsertOnDuplicateKey;
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->setTable(config('permission.table_names.model_has_permissions'));
    }
}
