<?php

namespace App\Domains\Inventories\Services;

use App\Domains\Inventories\Data\InventoryData;
use App\Models\Inventory;

final readonly class InventoryService
{
    public function __construct(
        private Inventory $inventory
    ){}

    public function get(): InventoryData
    {
        return InventoryData::from($this->inventory->get());
    }

    public function store(InventoryData $data): Inventory
    {
        return $this->inventory->create([
            'product_id' => $data->product_id,
            'warehouse_id' => $data->warehouse_id,
            'stock' => $data->stock,
        ]);
    }
}
