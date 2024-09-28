<?php

namespace Database\Seeders;

use App\Models\OrderItem;
use App\Models\Orders;
use Illuminate\Database\Seeder;
use DB;

class OrderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dishes = [
            ['dish_id' => 1, 'price' => 50.00, 'quantity' => 1],
            ['dish_id' => 2, 'price' => 40.00, 'quantity' => 2],
            ['dish_id' => 3, 'price' => 60.00, 'quantity' => 1],
        ];

        for ($i = 1; $i <= 5; $i++) {
            $orderId = Orders::insertGetId([
                'user_id' => 18,
                'total_amount' => array_sum(array_column($dishes, 'price')),
                'payment_mode' => 'COD',
                'payment_status' => 'pending',
                'extra_instructions' => 'Leave at the door ' . $i,
                'order_status' => '0',
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            foreach ($dishes as $dish) {
                OrderItem::insert([
                    'order_id' => $orderId,
                    'dish_id' => $dish['dish_id'],
                    'quantity' => $dish['quantity'],
                    'price' => $dish['price'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
