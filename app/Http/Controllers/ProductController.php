<?php

namespace App\Http\Controllers;

use App\Domains\Products\Data\OrderData;
use App\Domains\Products\Services\OrderService;
use App\Http\Requests\ProductRequest;
use App\Models\Product;

class ProductController extends Controller
{
    public function __construct(
        private readonly OrderService $productService
    ){}

    public function index()
    {
        return $this->productService->get();
    }

    public function store(ProductRequest $request)
    {
        return $this->productService->store(OrderData::fromRequest($request));
    }
}
