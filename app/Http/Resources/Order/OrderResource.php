<?php

namespace App\Http\Resources\Order;

use App\Http\Resources\BaseResource;

class OrderResource extends BaseResource
{
    protected function fields(): array
    {
        return [
            'id'            => $this->id,
            'number'        => $this->number,
            'carnet_number' => $this->carnet_number,
            'source'        => $this->source,
            'status'        => $this->when($this->status !== null, [
                'change_date' => $this->lastStatusLog(),
                'alias'       => optional($this->status)->alias,
                'name'        => $this->getNameStatusLng(),
                'color'       => optional($this->status)->color
            ]),
            'client'        => $this->when($this->client !== null, [
                'type' => __('modules/clients.types.' . optional($this->client)->type),
                'name' => optional($this->client)->name,
                'idno' => optional($this->client)->idno
            ]),
            'manager_id'    => $this->manager_id,
            'payed'         => [
                'guaranty_payed' => $this->guaranty_payed,
                'tax_payed'      => $this->tax_payed,
            ],
            'created_at'    => $this->dateFormat($this->created_at),
            'date_released' => $this->dateFormat($this->date_released),
        ];
    }

    private function lastStatusLog()
    {
        return optional($this->statusLogs->last())->created_at;
    }

    private function dateFormat($theDate)
    {
        if (!$theDate) {
            return null;
        }

        return Carbon($theDate)->isoFormat('DD.MM.YYYY');
    }

    private function getNameStatusLng()
    {
        if (!$this->status) {
            return null;
        }

        return __("modules/order_statuses.{$this->status->alias}");
    }
}
