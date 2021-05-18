<?php


namespace App\Http\Requests\User\Profile;

use App\Http\Requests\BasicRequest;

class FileRequest extends BasicRequest
{

    protected const USER_FILES = 'utility_bill,dl_selfie,job_offer,resume,payment';

    protected array $rules = [
        'files' => 'nullable|array|in:' . self::USER_FILES,
    ];

}
