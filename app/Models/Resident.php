<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $attributes)
 * @method static find(int|mixed $param)
 */
class Resident extends Model
{
    use HasFactory;

    protected $fillable = [
        'idnp',
        'name',
        'phones',
        'email',
    ];
}
