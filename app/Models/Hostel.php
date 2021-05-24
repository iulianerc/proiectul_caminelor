<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $attributes)
 * @method static find(int|mixed $param)
 */
class Hostel extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];
}
