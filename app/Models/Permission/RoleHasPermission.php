<?php

namespace App\Models\Permission;

use Illuminate\Database\Eloquent\Relations\Pivot;
use Yadakhov\InsertOnDuplicateKey;

class RoleHasPermission extends Pivot
{

    protected $casts = [
        'fields' => 'array',
        'params' => 'array',
    ];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->setTable(config('permission.table_names.role_has_permissions'));
    }
}
