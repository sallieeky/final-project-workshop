<?php

test('it can create warehouse from request', function () {
    $request = new \App\Http\Requests\WarehouseCreateRequest([
        'name' => 'Warehouse 1',
    ]);

    $data = \App\Domains\Inventories\Data\WarehouseData::fromRequest($request);

    expect($data->name)->toBe('Warehouse 1');
});

test('it can create inventory from request', function () {
    $mockProduct = Mockery::mock('App\Models\Product');
    $mockProduct->shouldReceive('getAttribute')->with('id')->andReturn(1);

    $mockWarehouse = Mockery::mock('App\Models\Warehouse');
    $mockWarehouse->shouldReceive('getAttribute')->with('id')->andReturn(1);

    $request = new \App\Http\Requests\InventoryRequest([
        'product_id' => $mockProduct->id,
        'warehouse_id' => $mockWarehouse->id,
        'stock' => 10,
    ]);

    $data = \App\Domains\Inventories\Data\InventoryData::fromRequest($request);

    expect($data->product_id)->toBe($mockProduct->id)
        ->and($data->warehouse_id)->toBe($mockWarehouse->id)
        ->and($data->stock)->toBe(10);
});
