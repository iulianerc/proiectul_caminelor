<?php

namespace App\Models\User\Profile;

use App\Traits\Mutator\AuthorId;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use OwenIt\Auditing\Contracts\Auditable;
use Yadakhov\InsertOnDuplicateKey;

class DefaultProfile extends Profile
{

    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'middle_name',
        'nick_name',
        'birth_date',
        'biography',
        'state_id',
        'city',
        'street',
        'apartment',
        'house',
        'zip',
        'work_from',
        'work_to',
        'zip',
    ];

}
