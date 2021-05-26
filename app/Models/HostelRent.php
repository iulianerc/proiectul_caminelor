<?php

namespace App\Models;

use App\Traits\Mutator\BasicMutators;
use App\Traits\Permission\ApplyPermissions;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @method static create(array $attributes)
 * @method static find(int|mixed $param)
 */
class HostelRent extends Model
{
    use HasFactory;
    use BasicMutators;

    protected $fillable = [
        'hostel_id',
        'resident_id',
        'room_category_id',
    ];

    public function hostel(): BelongsTo
    {
        return $this->belongsTo(Hostel::class);
    }

    public function roomCategory(): BelongsTo
    {
        return $this->belongsTo(RoomCategory::class);
    }

    public function resident(): BelongsTo
    {
        return $this->belongsTo(Resident::class);
    }
}
