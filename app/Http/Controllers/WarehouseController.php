<?php

namespace App\Http\Controllers;

use App\Domains\Inventories\Data\WarehouseData;
use App\Domains\Inventories\Services\WarehouseService;
use App\Http\Requests\WarehouseCreateRequest;
use App\Models\Warehouse;

class WarehouseController extends Controller
{
    public function __construct(
        private readonly WarehouseService $warehouseService,
    ){}

    public function store(WarehouseCreateRequest $request): Warehouse
    {
        return $this->warehouseService->store(WarehouseData::fromRequest($request));
    }
}
