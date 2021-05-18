<?php

namespace Tests\Unit\OrderPayment;

use App\Exceptions\OrderPaymentService\PaymentSumException;
use App\Models\Order\Order;
use App\Models\OrderPayment\OrderPayment;
use App\Services\OrderPayment\OrderPaymentService;
use Tests\DataProviders\OrderPaymentTest\OrderPaymentDataProvider;
use Tests\TestCase;
use Throwable;

class AddOrderPaymentActionTest extends TestCase
{
    private Order $order;
    private OrderPaymentDataProvider $provider;

    protected function setUp(): void
    {
        parent::setUp();
        $this->provider = new OrderPaymentDataProvider();
    }

    /**
     * When payment sum is zero there is no sense to handle some actions.
     * Request should be aborted with 422 response code
     * OR
     * Request should be accepted and return instant response with code 200
     * @throws PaymentSumException
     */
    public function test_payment_with_zero_sum(): void
    {
        /**
         * @var OrderPayment $payment
         */
        $this->createOrderWithServices();
        $initialPaidSum = $this->order->services()->sum('paid_sum');

        $paymentAttributes = $this->provider->getTestPaymentAttributes('zero_sum');
        $payment = $this->order->payments()->create($paymentAttributes);
        (new OrderPaymentService())->applyPayment($payment);
        $actualPaidSum = $this->order->services()->sum('paid_sum');

        self::assertSame($initialPaidSum, $actualPaidSum);
        $this->deleteOrderAndRelatedModels();
    }

    /**
     * Payment with smaller sum than first unpaid order service should be applied only for this service
     * Paid sum field should be incremented by payment's sum
     * @throws PaymentSumException
     */
    public function test_payment_with_smaller_sum_than_first_order_service_sum(): void
    {
        /**
         * @var OrderPayment $payment
         */
        $this->createOrderWithServices();
        $initialPaidSum = $this->order->services()->sum('paid_sum');

        $paymentAttributes = $this->provider->getTestPaymentAttributes('smaller_than_first_service_sum');
        $payment = $this->order->payments()->create($paymentAttributes);
        (new OrderPaymentService())->applyPayment($payment);
        $actualPaidSum = $this->order->services()->sum('paid_sum');

        self::assertSame((float)$actualPaidSum, (float)($initialPaidSum + $payment->sum));
        $this->deleteOrderAndRelatedModels();
    }

    /**
     * Payment with equal sum than first unpaid order service should cover whole service sum
     * @throws PaymentSumException
     */
    public function test_payment_with_equal_sum_than_first_order_service_sum(): void
    {
        /**
         * @var OrderPayment $payment
         */
        $this->createOrderWithServices();
        $initialPaidSum = $this->order->services()->sum('paid_sum');

        $paymentAttributes = $this->provider->getTestPaymentAttributes('equal_than_first_service_sum');
        $payment = $this->order->payments()->create($paymentAttributes);
        (new OrderPaymentService())->applyPayment($payment);
        $actualPaidSum = $this->order->services()->sum('paid_sum');

        self::assertSame((float)$actualPaidSum, (float)($initialPaidSum + $payment->sum));
        $this->deleteOrderAndRelatedModels();
    }

    /**
     * Payment with greater sum than first unpaid order service should be applied for `n` services from start
     * @throws PaymentSumException
     */
    public function test_payment_with_greater_sum_than_first_order_service_sum(): void
    {
        /**
         * @var OrderPayment $payment
         */
        $this->createOrderWithServices();
        $initialPaidSum = $this->order->services()->sum('paid_sum');

        $paymentAttributes = $this->provider->getTestPaymentAttributes('greater_than_first_service_sum');
        $payment = $this->order->payments()->create($paymentAttributes);
        (new OrderPaymentService())->applyPayment($payment);
        $actualPaidSum = $this->order->services()->sum('paid_sum');

        self::assertSame((float)$actualPaidSum, (float)($initialPaidSum + $payment->sum));
        $this->deleteOrderAndRelatedModels();
    }

    /**
     * Payment with smaller sum than total unpaid order service should cover a part of services
     * @throws PaymentSumException
     */
    public function test_payment_with_smaller_sum_than_total_order_services_sum(): void
    {
        /**
         * @var OrderPayment $payment
         */
        $this->createOrderWithServices();
        $initialPaidSum = $this->order->services()->sum('paid_sum');

        $paymentAttributes = $this->provider->getTestPaymentAttributes('smaller_than_total_sum');
        $payment = $this->order->payments()->create($paymentAttributes);
        (new OrderPaymentService())->applyPayment($payment);
        $actualPaidSum = $this->order->services()->sum('paid_sum');

        self::assertSame((float)$actualPaidSum, (float)($initialPaidSum + $payment->sum));
        $this->deleteOrderAndRelatedModels();
    }

    /**
     * Payment with equal payment sum than total unpaid order service should cover total services sum
     * @throws PaymentSumException
     */
    public function test_payment_with_equal_sum_than_total_order_services_sum(): void
    {
        /**
         * @var OrderPayment $payment
         */
        $this->createOrderWithServices();
        $initialPaidSum = $this->order->services()->sum('paid_sum');

        $paymentAttributes = $this->provider->getTestPaymentAttributes('equal_than_total_sum');
        $payment = $this->order->payments()->create($paymentAttributes);
        (new OrderPaymentService())->applyPayment($payment);
        $actualPaidSum = $this->order->services()->sum('paid_sum');

        self::assertSame((float)$actualPaidSum, (float)($initialPaidSum + $payment->sum));
        $this->deleteOrderAndRelatedModels();
    }

    /**
     * When payment sum is greater than total order's services sum request should be aborted with 422 response code
     */
    public function test_payment_with_greater_sum_than_total_order_services_sum(): void
    {
        /**
         * @var OrderPayment $payment
         */
        $this->createOrderWithServices();
        $paymentAttributes = $this->provider->getTestPaymentAttributes('greater_than_total_sum');
        $payment = $this->order->payments()->create($paymentAttributes);

        try {
            (new OrderPaymentService())->applyPayment($payment);
            $exceptionThrown = false;
        } catch (PaymentSumException $exception) {
            $exceptionThrown = true;
        } catch (Throwable $throwable) {
            $exceptionThrown = false;
        }

        self::assertTrue($exceptionThrown);
        $this->deleteOrderAndRelatedModels();
    }

    /**
     * Verify if payment sum was distributed correct for given services
     * @throws PaymentSumException
     */
    public function test_payment_applying_for_each_service(): void
    {
        /**
         * @var OrderPayment $payment
         */
        $this->createOrderWithServices();
        $paymentAttributes = $this->provider->getTestPaymentAttributes('usual_payment_sum');
        $payment = $this->order->payments()->create($paymentAttributes);
        (new OrderPaymentService())->applyPayment($payment);

        $actualPaidSums = $this->order
            ->services()
            ->get('paid_sum')
            ->pluck('paid_sum')
            ->toArray();

        self::assertSame([150., 250., 180., 250.], $actualPaidSums);
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
