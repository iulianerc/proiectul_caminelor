<?php


namespace App\Http\Resources\Client;


use App\Models\ClientBankAccount\ClientBankAccount;

class ClientEditResource extends ClientResource
{

    protected function fields(): array
    {
        return array_merge($this->basicFields(), [
            'contacts' => $this->contacts(),
            'client_bank_accounts' => $this->bank_accounts(),
        ]);

    }

    public function bank_accounts(): array
    {
        $accounts = [];
        foreach ($this->bank_accounts as $bank_account) {
            $bank = ClientBankAccount::find($bank_account->id)->bank;
            $accounts[] = [
                'id' => $bank_account->id,
                'bank' => [
                    'id' => $bank->id,
                    'name' => $bank->name,
                ],
                'account' => $bank_account->account
            ];
        }
        return $accounts;
    }

    public function contacts(): array
    {
        $contacts = [];
        foreach ($this->contacts as $contact) {
            $contacts[] = [
                'contact_type' => $contact->type,
                'value' => $contact->value
            ];
        }
        return $contacts;
    }
}
