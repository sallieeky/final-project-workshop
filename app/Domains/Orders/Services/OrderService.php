<?php

namespace App\Domains\Orders\Services;

use App\Domains\Orders\Data\OrderData;
use App\Events\OrderCreatedEvent;
use App\Models\Order;

final readonly class OrderService
{
    public function __construct(
        private Order $order
    ){}

    public function get()
    {
        return OrderData::collect($this->order->get());
    }

    public function store(OrderData $data): Order
    {
        \DB::beginTransaction();
        try {
            $order = $this->order->create([
                'product_id' => $data->product_id,
                'quantity' => $data->quantity,
            ]);
            $data = OrderData::from($order);
            OrderCreatedEvent::dispatch($data);
            \DB::commit();

            return $order;
        } catch (\Exception $e) {
            \DB::rollBack();
            throw $e;
        }
    }
}
