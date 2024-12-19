<?php

namespace App\Console\Commands;

use App\Domains\Inventories\Data\InventoryData;
use App\Domains\Inventories\Services\InventoryService;
use App\Domains\Products\Services\ProductService;
use Illuminate\Console\Command;

class InventoryCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'api:inventory-create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new inventory';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $productId = $this->ask('Enter the product ID');
        $warehouseId = $this->ask('Enter the warehouse ID');
        $stock = $this->ask('Enter the stock');

        $data = new InventoryData(
            product_id: $productId,
            warehouse_id: $warehouseId,
            stock: $stock,
        );

        $inventory = app(InventoryService::class)->store($data);

        $this->info($inventory);
    }
}
