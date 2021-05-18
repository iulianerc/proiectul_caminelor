<?php


namespace App\Models\PDF;


use Illuminate\Database\Eloquent\Model;

class Guarantee extends Model
{
    public array $data = [
        'AUTHORISED_ISSUING_PERSON' => 'Юрие Бадыр',
        'SYSTEM_ADDRESS' => 'MD-2004, г. Кишинев, бул. Штефан чел Маре, 151, Республика Молдова',
        'SYSTEM_PHONES' => '+383 22 / 22 88 19; +373 22 / 23 88 60',
        'SYSTEM_FAX' => '+373 22 / 23 88 60',
        'SYSTEM_EMAIL' => 'ata@chamber.md'
    ];
}
