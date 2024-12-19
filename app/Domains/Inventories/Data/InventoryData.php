<?php

namespace App\Domains\Inventories\Data;

use App\Models\Product;
use Illuminate\Http\Request;
use Spatie\LaravelData\Data;

class InventoryData extends Data
{
    public function __construct(
        public string $name,
    ) {}

    public static function fromRequest(Request $request): self
    {
        return new self(
            name: $request->name,
        );
    }

}
