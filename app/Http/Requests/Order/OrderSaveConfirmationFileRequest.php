<?php

namespace App\Http\Requests\Order;

use App\Http\Requests\BasicRequest;
use Illuminate\Http\UploadedFile;

/**
 * Class OrderSaveConfirmationFileRequest
 * @package App\Http\Requests
 *
 * @property UploadedFile|null $confirmationFile
 * @property string|null $fileName
 */
class OrderSaveConfirmationFileRequest extends BasicRequest
{
    protected array $rules = [
        'confirmationFile' => ['file', 'max:10000'],
        'fileName'         => ['string'],
    ];
}
