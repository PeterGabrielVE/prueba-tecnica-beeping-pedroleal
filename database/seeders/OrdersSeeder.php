<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\OrderLine;
use App\Models\Product;

class OrdersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
            ['id' => 1,'name' => 'Product 1', 'cost' => 100],
            ['id' => 2,'name' => 'Product 2', 'cost' => 200],
            ['id' => 3,'name' => 'Product 3', 'cost' => 300],
            ['id' => 4,'name' => 'Product 4', 'cost' => 400],
            ['id' => 5,'name' => 'Product 5', 'cost' => 500],
            ['id' => 6,'name' => 'Product 6', 'cost' => 600],
            ['id' => 7,'name' => 'Product 7', 'cost' => 700],
            ['id' => 8,'name' => 'Product 8', 'cost' => 800],
            ['id' => 9,'name' => 'Product 9', 'cost' => 900],
            ['id' => 10,'name' => 'Product 10', 'cost' => 1000],
        ];

        for ($i = 1; $i <= 20; $i++) {
            $order = [
                'order_ref' => 'ORD-' . $i,
                'customer_name' => 'Customer ' . $i,
            ];

            $lines = [];
            for ($j = 1; $j <= rand(2, 5); $j++) {
                $lines[] = [
                    'qty' => rand(1, 10),
                    'product_id' => rand(1, 10),
                ];
            }

            $this->createOrder($order, $lines, $products);
        }
    }

    protected function createOrder($order, $lines, $products)
    {
        $order = Order::create($order);

        foreach ($lines as $line) {
            $product = $products[$line['product_id'] - 1];

            OrderLine::create([
                'order_id' => $order->id,
                'qty' => $line['qty'],
                'product_id' => $product['id'],
            ]);
        }

        $existProduct = Product::all();
        if(count($existProduct) == 0){
            foreach($products as $product){
                Product::create($product);
            }
        }
        
        
    }
}
