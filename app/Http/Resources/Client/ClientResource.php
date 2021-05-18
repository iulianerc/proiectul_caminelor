<?php


namespace App\Http\Resources\Client;


use App\Http\Resources\BaseResource;
use App\Models\ClientBankAccount\ClientBankAccount;

class ClientResource extends BaseResource
{

    protected function fields(): array
    {
        return $this->basicFields();
    }

    public function basicFields(): array
    {
        $requiredFields = [
            'id' => $this->id,
            'type' => $this->type,
            'idno' => $this->idno,
            'name' => $this->name,
            'address_ro' => $this->address_ro,
            'address_en' => $this->address_en,
            'address_ru' => $this->address_ru,
        ];
        $additionalFields = [
            'juridical' => [
                'administrator_name' => $this->administrator_name,
                'vat_code' => $this->vat_code,
            ],
            'physical' => [
                'identity_card' => $this->identity_card,
                'identity_card_date' => $this->identity_card_date,
                'identity_card_issued' => $this->identity_card_issued,
                'address_home' => $this->address_home
            ]
        ];
        return array_merge($requiredFields, $additionalFields[$this->type]);
    }
}
