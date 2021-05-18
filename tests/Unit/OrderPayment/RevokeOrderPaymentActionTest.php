<?php

namespace Tests\Unit\OrderPayment;

use App\Exceptions\OrderPaymentService\PaymentSumException;
use App\Models\Order\Order;
use App\Models\OrderPayment\OrderPayment;
use App\Services\OrderPayment\OrderPaymentService;
use Tests\DataProviders\OrderPaymentTest\OrderPaymentDataProvider;
use Tests\TestCase;


class RevokeOrderPaymentActionTest extends TestCase
{
    private Order $order;
    private OrderPaymentDataProvider $provider;

    protected function setUp(): void
    {
        parent::setUp();
        $this->provider = new OrderPaymentDataProvider();
    }

    /**
     * Verify if payment sum was distributed correct for given services
     * @throws PaymentSumException
     */
    public function test_payment_revoking_for_each_service(): void
    {
        /**
         * @var OrderPayment $payment
         */
        $this->createOrderWithServices();
        $paymentAttributes = $this->provider->getTestPaymentAttributes('usual_payment_sum');
        $payment = $this->order->payments()->create($paymentAttributes);
        (new OrderPaymentService())->applyPayment($payment);
        (new OrderPaymentService())->revokePayment($payment);

        $initialPaidSums = collect($this->provider->getOrderServicesAttributes())
            ->pluck('paid_sum')
            ->toArray();

        $actualPaidSums = $this->order
            ->services()
            ->get('paid_sum')
            ->pluck('paid_sum')
            ->toArray();

        self::assertSame($initialPaidSums, $actualPaidSums);
        $this->deleteOrderAndRelatedModels();
    }

    private function createOrderWithServices(): void
    {
        $this->order = Order::factory()->make();
        $this->order->save();
        $this->order->services()->createMany($this->provider->getOrderServicesAttributes());
    }

    private function deleteOrderAndRelatedModels(): void
    {
        $this->order->services()->delete();
        $this->order->payments()->delete();
        $this->order->delete();
    }
}
