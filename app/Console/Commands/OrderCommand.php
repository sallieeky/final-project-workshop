<?php

namespace App\Console\Commands;

use App\Domains\Orders\Data\OrderData;
use App\Domains\Orders\Services\OrderService;
use Illuminate\Console\Command;

class OrderCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'api:order-create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new order';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $productId = $this->ask('Enter the product ID');
        $quantity = $this->ask('Enter the quantity');

        $data = new OrderData(
            product_id: $productId,
            quantity: $quantity,
        );

        $order = app(OrderService::class)->store($data);

        $this->info($order);
    }
}
