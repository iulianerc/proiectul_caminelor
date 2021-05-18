<?php

namespace App\Http\Resources\PurposesOfUse;

use App\Http\Resources\BaseResource;

class PurposesOfUseListLangResource extends BaseResource
{
    protected static string $lang;

    protected function fields(): array
    {
        return [
            'value' => $this->id,
            'text' => $this->name,
            'description' => $this->{'description_'.self::$lang},
        ];
    }

    public static function setLang($lang)
    {
        self::$lang = $lang;
    }
}
