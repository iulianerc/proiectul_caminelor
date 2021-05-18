<?php

namespace App\Http\Requests\Order;

use App\Http\Requests\BasicRequest;

class OrderRequest extends BasicRequest
{
    protected array $rules = [
        'order'                       => 'required',
        'order.carnet_type'           => 'required|string|in:original,copy,replacement',
        'order.release_mode'          => 'required|string|in:normal,urgent',
        'order.carnet_number'         => 'nullable|string|size:10',
        'order.parent_carnet_id'      => 'required_unless:order.carnet_type,original|integer|exists:orders,id',
        'order.language'              => 'required|string|in:ro,en,ru',
        'order.outputs'               => 'required|integer|min:1|max:255',
        'order.valid_from'            => 'required|date',
        'order.valid_to'              => 'required|date',
        'order.source'                => 'required|string|in:operator,client',
        'order.status_id'             => 'nullable|integer|exists:order_statuses,id',
        'order.client_id'             => 'required|integer|exists:clients,id',
        'order.client_delegate'       => 'required|string|min:3|max:50',
        'order.tax_payed'             => 'nullable|in:true,false',
        'order.guaranty_payed'        => 'nullable|in:true,false',
        'order.guaranty_required'     => 'nullable|in:true,false',
        'order.is_ata_exposition'     => 'nullable|in:true,false',
        'order.required_guaranty_sum' => 'required|numeric',
        'order.purpose_id'            => 'required|integer|exists:purposes_of_uses,id',
        'order.purpose_description'   => 'required|string|min:5|max:255',
        'order.measure_unit'          => 'required|string|in:kg,g',
        'order.currency_id'           => 'required|integer|exists:currencies,id',
        'order.exchange_rate'         => 'required|numeric|',
        'order.authorized_person_id'  => 'required|integer|exists:authorized_persons,id',
        'order.package_description'   => 'string',
        'order.transport_category_id' => 'required|integer|exists:transports,id',
        'order.transport_description' => 'nullable|string',
        'order.manager_id'            => 'required|integer|exists:users,id',
        'countries'                   => 'required',
        'countries.*.country_id'      => 'required|integer|exists:countries,id',
        'countries.*.scope'           => 'required|string|in:destination,transit',
        'goods'                       => 'required',
        'goods.*.name'                => 'required|string|min:2',
        'goods.*.quantity'            => 'required|numeric',
        'goods.*.size'                => 'required|numeric',
        'goods.*.price_currency'      => 'required|numeric',
        'goods.*.price'               => 'required|numeric',
        'goods.*.good_id'             => 'nullable|integer|exists:goods,id',
        'goods.*.origin_country_id'   => 'required|integer|exists:countries,id',
        'documents'                   => 'required|array',
        'documents.*.number'          => 'string|min:5|max:20',
        'documents.*.date'            => 'date',
        'documents.*.file_type'       => 'required|string',
        'services'                    => 'required|array',
        'services.*.service_id'       => 'required|exists:services,id',
        'services.*.sum_no_vat'       => 'required|numeric',
        'services.*.sum_with_vat'     => 'required|integer',
        'services.*.quantity'         => 'required|integer',
    ];
}
