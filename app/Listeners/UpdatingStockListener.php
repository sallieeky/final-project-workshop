<?php

namespace App\Listeners;

use App\Domains\Inventories\Services\InventoryService;
use App\Events\OrderCreatedEvent;

class UpdatingStockListener
{
    public function __construct(
        private readonly InventoryService $inventoryService
    ){}

    public function handle(OrderCreatedEvent $event): void
    {
        $this->inventoryService->updatingStock($event->orderData);
    }
}
