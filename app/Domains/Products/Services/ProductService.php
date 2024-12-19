<?php

namespace App\Domains\Products\Services;

use App\Domains\Products\Data\ProductData;
use App\Models\Product;

final readonly class ProductService
{
    public function __construct(
        private Product $product
    ){}

    public function index(): ProductData
    {
        return ProductData::from($this->product->get());
    }

    public function store(ProductData $data): Product
    {
        return $this->product->create([
            'name' => $data->name,
            'description' => $data->description,
            'price' => $data->price,
        ]);
    }
}
