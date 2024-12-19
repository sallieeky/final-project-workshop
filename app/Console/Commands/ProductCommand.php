<?php

namespace App\Console\Commands;

use App\Domains\Products\Data\OrderData;
use App\Domains\Products\Data\ProductData;
use App\Domains\Products\Services\OrderService;
use App\Domains\Products\Services\ProductService;
use Illuminate\Console\Command;

class ProductCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'api:product-create
                            {name : The name of the product}
                            {description : The description of the product}
                            {price : The price of the product}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new product';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = $this->argument('name');
        $description = $this->argument('description');
        $price = $this->argument('price');

        $data = new ProductData(
            name: $name,
            description: $description,
            price: $price,
        );

        $product = app(ProductService::class)->store($data);

        $this->info($product);
    }
}
