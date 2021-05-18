<?php

namespace App\Traits\Mutator;


trait BasicMutators
{

    public function getCreatedAtAttribute($value): string
    {
        return \carbon($value, config('app.timezone'))->timezone(userTimezone())->format('d.m.Y H:i:s');
    }

    public function setCreatedAtAttribute($value): void
    {
        $this->attributes['created_at'] = \carbon($value, userTimezone())->timezone(config('app.timezone'));
    }

    public function getUpdatedAtAttribute($value): string
    {
        return \carbon($value, config('app.timezone'))->timezone(userTimezone())->format('d.m.Y H:i:s');
    }

    public function setUpdatedAtAttribute($value): void
    {
        $this->attributes['updated_at'] = \carbon($value, userTimezone())->timezone(config('app.timezone'));
    }
}
