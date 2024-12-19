<?php

namespace App\Http\Controllers;

use App\Http\Requests\InventoryRequest;
use App\Models\Inventory;

class InventoryController extends Controller
{
    public function index()
    {
        return Inventory::all();
    }

    public function store(InventoryRequest $request)
    {
        return Inventory::create($request->validated());
    }

    public function show(Inventory $inventory)
    {
        return $inventory;
    }

    public function update(InventoryRequest $request, Inventory $inventory)
    {
        $inventory->update($request->validated());

        return $inventory;
    }

    public function destroy(Inventory $inventory)
    {
        $inventory->delete();

        return response()->json();
    }
}
