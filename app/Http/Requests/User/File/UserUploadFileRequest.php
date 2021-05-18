<?php


namespace App\Http\Requests\User\File;


use App\Http\Requests\BasicRequest;

class UserUploadFileRequest extends BasicRequest
{
    protected array $rules = [
        'resume'       => 'required_without_all:job_offer,dl_selfie,utility_bill,payment|image',
        'job_offer'    => 'required_without_all:resume,dl_selfie,utility_bill,payment|mimes:jpeg,jpg,bmp,png,gif,pdf',
        'dl_selfie'    => 'required_without_all:resume,job_offer,utility_bill,payment|image',
        'utility_bill' => 'required_without_all:resume,job_offer,dl_selfie,payment|image',
        'payment'      => 'required_without_all:resume,job_offer,dl_selfie,utility_bill|image',
    ];
}
