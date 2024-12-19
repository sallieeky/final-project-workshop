<?php

namespace App\Domains\Inventories\Services;

use App\Domains\Inventories\Data\WarehouseData;
use App\Models\Warehouse;

final readonly class WarehouseService
{
    public function __construct(
        private Warehouse $warehouse
    ){}

    public function get()
    {
        return WarehouseData::collect($this->warehouse->get());
    }

    public function store(WarehouseData $data): Warehouse
    {
        return $this->warehouse->create([
            'name' => $data->name,
        ]);
    }
}
