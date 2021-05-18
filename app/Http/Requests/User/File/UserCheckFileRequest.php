<?php


namespace App\Http\Requests\User\File;


use App\Http\Requests\BasicRequest;

class UserCheckFileRequest extends BasicRequest
{
    protected array $rules = [
        'job_offer'    => 'required_without_all:dl_selfie,utility_bill|string',
        'dl_selfie'    => 'required_without_all:job_offer,utility_bill|string',
        'utility_bill' => 'required_without_all:job_offer,dl_selfie|string',
    ];
}
