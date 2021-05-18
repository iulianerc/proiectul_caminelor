<?php


namespace App\Traits\Mutator;


use Illuminate\Support\Str;

trait Uuid
{
    public static function bootUuid(): void
    {
        self::creating(fn ($model) => $model->uuid = (string)Str::orderedUuid());
    }
}
