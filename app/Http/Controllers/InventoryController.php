<?php

namespace App\Http\Controllers;

use App\Http\Requests\InventoryRequest;
use App\Models\Inventory;

class InventoryController extends Controller
{
    public function get()
    {
        return Inventory::all();
    }

    public function store(InventoryRequest $request)
    {
        return Inventory::create($request->validated());
    }
}
