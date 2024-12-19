<?php

namespace App\Domains\Inventories\Data;

use App\Models\Product;
use Illuminate\Http\Request;
use Spatie\LaravelData\Data;
use Spatie\TypeScriptTransformer\Attributes\TypeScript;

#[TypeScript]
class WarehouseData extends Data
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
