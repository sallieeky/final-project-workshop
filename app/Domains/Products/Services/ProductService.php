<?php

namespace App\Domains\Products\Services;

use App\Domains\Products\Data\ProductData;
use App\Models\Product;

class ProductService
{
    public function __construct(
        private readonly Product $product
    ){}

    public function index()
    {
        return $this->product->all();
    }

    public function store(ProductData $data)
    {
        return $this->product->create([
            'name' => $data->name,
            'description' => $data->description,
            'price' => $data->price,
        ]);
    }
}
