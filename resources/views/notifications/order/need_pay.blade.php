<p> {{ __('notifications/order/need_pay.message.title', [
    'order_name' => $order->number,
    'order_price' => $order->total_services_paid
    ]) }}
</p>
