<?php


namespace App\Models\Status;



use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Status extends Model
{

    public function scopeDone(Builder $query): Builder
    {
        return $query->where('alias', 'done');
    }

    public function scopeActive(Builder $query, $type = 'user'): Builder
    {
        return $query->where([
            ['alias', 'active'],
            ['type', $type],
        ]);
    }

    public static function internal(string $alias)
    {
        return self::whereType('internal')->whereAlias($alias)->first();
    }
}
