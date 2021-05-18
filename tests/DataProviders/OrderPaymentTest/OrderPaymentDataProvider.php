<?php

namespace Tests\DataProviders\OrderPaymentTest;

use App\Models\Order\Order;
use RuntimeException;

class OrderPaymentDataProvider
{
    public Order $order;

    private array $fakeOrderServicesAttributes = [
        [
            'service_id'   => 1,
            'quantity'     => 1,
            'sum_no_vat'   => 100.,
            'sum_with_vat' => 150.,
            'paid_sum'     => 150.,
        ],
        [
            'service_id'   => 2,
            'quantity'     => 1,
            'sum_no_vat'   => 200.,
            'sum_with_vat' => 250.,
            'paid_sum'     => 200.,
        ],
        [
            'service_id'   => 3,
            'quantity'     => 1,
            'sum_no_vat'   => 100.,
            'sum_with_vat' => 180.,
            'paid_sum'     => 0.,
        ],
        [
            'service_id'   => 4,
            'quantity'     => 1,
            'sum_no_vat'   => 500.,
            'sum_with_vat' => 750.,
            'paid_sum'     => 0.,
        ]
    ];

    private array $fakeOrderPayments = [
        'zero_sum'                       => [
            'sum'               => 0,
            'comments'          => 'Test `zero_sum` comment',
            'payment_method_id' => 2
        ],
        'smaller_than_first_service_sum' => [
            'sum'               => 40,
            'comments'          => 'Test `smaller_than_first_service_sum` comment',
            'payment_method_id' => 2
        ],
        'equal_than_first_service_sum'   => [
            'sum'               => 50,
            'comments'          => 'Test `equal_than_first_service_sum` comment',
            'payment_method_id' => 2
        ],
        'greater_than_first_service_sum' => [
            'sum'               => 100,
            'comments'          => 'Test `greater_than_first_service_sum` comment',
            'payment_method_id' => 2
        ],
        'smaller_than_total_sum'         => [
            'sum'               => 900,
            'comments'          => 'Test `smaller_than_total_sum` comment',
            'payment_method_id' => 2
        ],
        'equal_than_total_sum'           => [
            'sum'               => 980,
            'comments'          => 'Test `equal_than_total_sum` comment',
            'payment_method_id' => 2
        ],
        'greater_than_total_sum'         => [
            'sum'               => 1000000,
            'comments'          => 'Test `greater_than_total_sum` comment',
            'payment_method_id' => 2
        ],
        'usual_payment_sum'         => [
            'sum'               => 480,
            'comments'          => 'Test `usual_payment_sum` comment',
            'payment_method_id' => 2
        ],
    ];

    public function getTestPaymentAttributes(string $caseName): array
    {
        if (!array_key_exists($caseName, $this->fakeOrderPayments)) {
            throw new RuntimeException("Undefined test case [{$caseName}]");
        }

        return $this->fakeOrderPayments[$caseName];
    }

    public function getOrderServicesAttributes(): array
    {
        return $this->fakeOrderServicesAttributes;
    }
}
