<?php

namespace App\Events;

use App\Domains\Orders\Data\OrderData;
use Illuminate\Foundation\Events\Dispatchable;

class OrderCreatedEvent
{
    use Dispatchable;

    public function __construct(
        public OrderData $orderData
    ){}
}
