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

    public function create(WarehouseCreateRequest $request): Warehouse
    {
        $data = WarehouseData::fromRequest($request);
        return $this->warehouseService->create($data);
    }
}
