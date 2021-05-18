<?php

namespace App\Http\Resources\PurposesOfUse;

use App\Http\Resources\BaseResource;

class PurposesOfUseForRequestResource extends BaseResource
{
    protected static string $lang;

    protected function fields(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->{'description_'.self::$lang},
        ];
    }

    public static function setLang($lang)
    {
        self::$lang = $lang;
    }
}
