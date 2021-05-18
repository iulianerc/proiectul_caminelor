<?php


namespace App\Http\Resources\Client;


use App\Http\Resources\BaseResource;

class ClientInfoForRequestResource extends BaseResource
{
    protected static string $lang;
    protected function fields(): array
    {
        return [
            'type' => $this->type,
            'idno' => $this->idno,
            'name' => $this->name,
            'address' => $this->{'address_'.self::$lang},
        ];
    }
    public static function setLang($lang) {
        self::$lang = $lang;
    }
}
