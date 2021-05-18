<?php

namespace App\Models\User\Profile;


use App\Models\Location\Location;
use App\Models\User\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use OwenIt\Auditing\Contracts\Auditable;

abstract class Profile extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;

    protected $primaryKey = 'user_id';

    public function user(): MorphOne
    {
        return $this->morphOne(User::class, 'profile', null, 'id', 'user_id');
    }

    public static function getContacts(User $user): array
    {
        $contacts = (array)__('structures/profile/contacts');
        $userContacts = $user->contacts()->get();
        $userContacts
            ->whereIn('type', ['email', 'phone', 'telegram', 'jabber', 'skype'])
            ->groupBy('type')
            ->map(static function ($contactType) use (&$contacts) {
                $contactType->map(static function ($contact) use (&$contacts) {
                    $contacts[$contact->type]['items'][] = $contact->value;
                });
            })
            ->all();

        $userContacts
            ->whereIn('type', ['facebook', 'linkedin', 'vk'])
            ->map(static function ($contact) use (&$contacts) {
                $contacts['social']['items'][$contact->type]['url'] = $contact->value;
            })
            ->all();

        return $contacts;
    }

    public function location(): hasOne
    {
        return $this->hasOne(Location::class, 'id', 'state_id');
    }
}
