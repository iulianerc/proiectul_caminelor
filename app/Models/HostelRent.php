<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @method static create(array $attributes)
 * @method static find(int|mixed $param)
 */
class HostelRent extends Model
{
    use HasFactory;

    protected $fillable = [
        'hostel_id',
        'resident_id',
        'room_category_id',
    ];

    public function hostel(): HasOne
    {
        return $this->hasOne(Hostel::class);
    }

    public function room_category(): HasOne
    {
        return $this->hasOne(RoomCategory::class);
    }

    public function resident(): HasOne
    {
        return $this->hasOne(Resident::class);
    }
}
