<?php

namespace App\Http\Resources\User\Document;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserDocumentResource extends JsonResource
{

    public $preserveKeys = true;

    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'type'   => $this->file->mime_type,
            'status' => $this->status,
            'url'    => route('v1.files.show', $this->file->uuid),
        ];
    }
}
