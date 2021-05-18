<?php

namespace App\Http\Resources\OrderGuarantee;

use App\Http\Resources\BaseResource;
use App\Models\Client\Client;
use App\Models\Order\Order;
use Illuminate\Support\Facades\Storage;
use LaravelMerax\FileServer\App\Models\File;

/**
 * Class OrderGuaranteeResource
 * @package App\Http\Resources\OrderGuarantee
 *
 * @property int $id
 * @property Client $client
 * @property Order $order
 * @property float $sum
 * @property string $type
 * @property string $status
 * @property string $created_at
 * @property string $path
 * @property File $file
 */
class OrderGuaranteeResource extends BaseResource
{
    protected function fields(): array
    {
        return [
            'id'             => $this->id,
            'client'         => $this->client->name,
            'order'          => $this->order->carnet_number,
            'sum'            => $this->sum,
            'type'           => $this->type,
            'status'         => $this->status,
            'created_at'     => $this->created_at,
            'proof_document' => $this->getProofDocument()
        ];
    }

    private function getProofDocument(): ?array
    {
        if ($this->file === null) {
            return null;
        }

        return [
            'name' => $this->file->original_name,
            'url'  => Storage::url($this->path)
        ];
    }
}
