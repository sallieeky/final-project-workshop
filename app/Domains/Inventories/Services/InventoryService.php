<?php

namespace App\Domains\Inventories\Services;

use App\Domains\Inventories\Data\InventoryData;
use App\Domains\Orders\Data\OrderData;
use App\Models\Inventory;

final readonly class InventoryService
{
    public function __construct(
        private Inventory $inventory
    ){}

    public function get()
    {
        return InventoryData::collect($this->inventory->get());
    }

    public function store(InventoryData $data): Inventory
    {
        return $this->inventory->create([
            'product_id' => $data->product_id,
            'warehouse_id' => $data->warehouse_id,
            'stock' => $data->stock,
        ]);
    }

    public function updatingStock(OrderData $orderData): void
    {
        $inventoryStock = $this->inventory->where('product_id', $orderData->product_id);

        if ($inventoryStock->count() < $orderData->quantity) {
            throw new \UnexpectedValueException('Insufficient stock', 400);
        }

        $inventories = $inventoryStock->get();
        foreach ($inventories as $inventory) {
            $this->partialUpdate($inventory, $quantity);
        }
    }

    private function partialUpdate(Inventory $inventory, int &$quantity): void
    {
        if ($inventory->stock >= $quantity) {
            $inventory->stock -= $quantity;
            $inventory->save();
            $quantity = 0;
        } else {
            $quantity -= $inventory->stock;
            $inventory->stock = 0;
            $inventory->save();
        }
    }
}
