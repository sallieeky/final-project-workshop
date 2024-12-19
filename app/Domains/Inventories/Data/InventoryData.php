<?php

namespace App\Domains\Inventories\Data;

use App\Models\Product;
use Illuminate\Http\Request;
use Spatie\LaravelData\Data;
use Spatie\TypeScriptTransformer\Attributes\TypeScript;

#[TypeScript]
class InventoryData extends Data
{
    public function __construct(
        public int $product_id,
        public int $warehouse_id,
        public int $stock,
    ) {}

    public static function fromRequest(Request $request): self
    {
        return new self(
            product_id: $request->product_id,
            warehouse_id: $request->warehouse_id,
            stock: $request->stock,
        );
    }

}
