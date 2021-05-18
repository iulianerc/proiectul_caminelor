<?php


namespace App\Http\Resources\ClientBankAccount;


use App\Http\Resources\BaseResource;

class ClientBankAccountResource extends BaseResource
{

    protected function fields(): array
    {
        return [
            'id' => $this->id,
            'bank' => [
                'id' => $this->bank->id,
                'name' => $this->bank->name
            ],
            'client_id' => $this->client_id,
            'account' => $this->account,
        ];
    }
}
