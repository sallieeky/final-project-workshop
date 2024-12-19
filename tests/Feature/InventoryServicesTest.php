<?php

use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('it can print', function () {
    $a = app(\App\Domains\Inventories\Services\InventoryService::class)->updatingStock(1, 1);

    // expect error UnexpectedValueException
    expect($a)->toThrow(\UnexpectedValueException::class);
});
