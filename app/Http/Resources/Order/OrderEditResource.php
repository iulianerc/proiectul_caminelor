<?php

namespace App\Http\Resources\Order;

use App\Http\Resources\BaseResource;
use App\Models\OrderService\OrderService;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Storage;

/**
 * @property mixed countries
 * @property mixed goods
 * @method folder()
 */
class OrderEditResource extends BaseResource
{
    protected function fields(): array
    {
        $fileName = optional($this->file)->saved_name;
        $url = Storage::url($this->folder() . '/' . $fileName);
        $client = $this->client;
        return [
            'order'     => [
                'id'                    => $this->id,
                'number'                => $this->number,
                'carnet_type'           => $this->carnet_type,
                'release_mode'          => $this->release_mode,
                'carnet_number'         => $this->carnet_number,
                'parent_carnet_id'      => $this->parent_carnet_id,
                'parent_carnet_number'  => optional($this->parent)->carnet_number,
                'language'              => $this->language,
                'outputs'               => $this->outputs,
                'valid_from'            => $this->valid_from,
                'valid_to'              => $this->valid_to,
                'source'                => $this->source,
                'status'                => [
                    'id'    => $this->status_id,
                    'alias' => $this->status->alias,
                    'name'  => __("modules/order_statuses.{$this->status->alias}"),
                    'color' => $this->status->color
                ],
                'client'                => [
                    'id'   => $client->id,
                    'idno' => $client->idno,
                    'type' => $client->type,
                    'name' => $client->name,

                    'address' => $client->{'address_' . App::getLocale()},
                ],
                'client_delegate'       => $this->client_delegate,
                'tax_payed'             => $this->tax_payed,
                'guaranty_payed'        => $this->guaranty_payed,
                'required_guaranty_sum' => $this->required_guaranty_sum,
                'is_ata_exposition'     => $this->is_ata_exposition,
                'guaranty_required'     => $this->guaranty_required,
                'data_edit_count'       => $this->data_edit_count,
                'purpose_id'            => $this->purpose_id,
                'purpose_description'   => $this->purpose->{'description_' . App::getLocale()},
                'measure_unit'          => $this->measure_unit,
                'currency_id'           => $this->currency_id,
                'exchange_rate'         => $this->exchange_rate,
                'authorized_person_id'  => $this->authorized_person_id,
                'package_description'   => $this->package_description,
                'transport_category_id' => $this->transport_category_id,
                'transport_description' => $this->transport_description,
                'manager_id'            => $this->manager_id,
                'date_released'         => $this->date_released,
                'confirmation_file'     => $this->when($fileName, fn() => [
                    'name' => $fileName,
                    'url'  => $url
                ])
            ],
            'countries' => $this->getCountries(),
            'goods'     => $this->getGoods(),
            'documents' => $this->getDocuments(),
            'services'  => $this->getServices()
        ];
    }


    public function getServices(): Collection
    {
        return $this->orderServices->transform(fn($orderService) => [
            'service_id'   => $orderService->service_id,
            'quantity'     => $orderService->quantity,
            'sum_no_vat'   => $orderService->sum_no_vat,
            'sum_with_vat' => $orderService->sum_with_vat,
            'order_id'     => $this->id,
            'name'         => $orderService->service->{'name_' . app()->getLocale()},
            'paid_sum'     => $orderService->paid_sum,
            'remained_sum' => $orderService->remained_sum,
            'created_at'   => $orderService->created_at
        ]);
    }

    public function getCountries(): Collection
    {
        return collect($this->countries)->map(fn($country) => [
            'country_id' => $country->country_id,
            'scope'      => $country->scope,
        ]);
    }

    public function getGoods(): Collection
    {
        return collect($this->goods)->map(fn($good) => [
            'id'                  => $good->id,
            'name'                => $good->name,
            'quantity'            => $good->quantity,
            'size'                => $good->size,
            'price_currency'      => $good->price_currency,
            'price'               => $good->price,
            'good_id'             => $good->good_id,
            'origin_country_id'   => $good->origin_country_id,
            'origin_country_name' => $good->when(
                $good->originalCountry !== null,
                static fn() => optional($good->originalCountry)->code . ' - ' . optional($good->originalCountry)->name
            )
        ]);
    }

    public function getDocuments(): Collection
    {
        return collect($this->documents)->map(function ($think) {
            $file = $think->file;
            $url = Storage::url($think->folder() . '/' . optional($file)->saved_name);
            return [
                'id'        => $think->id,
                'number'    => $think->number,
                'file_type' => $think->file_type,
                'date'      => $think->date,
                'file'      => $this->when($file, [
                    'name' => optional($file)->original_name,
                    'url'  => $url,
                ]),
            ];
        });
    }
}
