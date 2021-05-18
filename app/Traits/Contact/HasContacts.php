<?php


namespace App\Traits\Contact;


use App\Models\Contact\Contact;
use Illuminate\Database\Eloquent\Relations\MorphMany;

trait HasContacts
{
    public function contacts(): MorphMany
    {
        return $this->morphMany(Contact::class, 'contactable');
    }

    public function setContacts(array $contacts): self
    {
        $this->formatContacts($contacts)
            ->contacts()
            ->createMany($contacts);

        return $this;
    }

    public function clearContacts(): self
    {
        $this->contacts()->delete();

        return $this;
    }

    public function deleteContacts(string $type): self
    {
        $this->contacts()->where('type', $type)->delete();

        return $this;
    }

    private function formatContacts(array &$contacts): self
    {
        $unformattedContacts = $contacts;
        $contacts = [];
        foreach ($unformattedContacts as $key => $value) {
            if (empty($value)) {
                continue;
            }
            if (is_array($value)) {
                foreach ($value as $item) {
                    if (empty($item)) {
                        continue;
                    }
                    $contacts[] = [
                        'type'      => $key,
                        'value'     => $item,
                    ];
                }
                continue;
            }
            $contacts[] = [
                'type'      => $key,
                'value'     => $value,
            ];
        }

        return $this;
    }
}
