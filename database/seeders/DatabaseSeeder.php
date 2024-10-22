<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Order;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\Product::factory(10)->create();
        // \App\Models\Admin::factory()->count(5)->create();


        // \App\Models\Admin::create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        //     'password' => bcrypt('password'),
        // ]);

        // $order = \App\Models\Order::create([
        //     'admin_id' => 1, // Replace with actual admin ID
        //     'user_id' => 1,  // Replace with actual user ID
        //     'payment_id' => 1,
        //     'orderDate' => now(),
        //     'TotalAmount' => 100.00, // Replace with actual amount
        //     'order_status' => 'pending',
        // ]);

        // $orderProduct = \App\Models\OrdersProduct::create([
        //     'product_id' => 1, // Replace with actual product ID
        //     'order_id' => $order->order_id, // Reference the order created above
        //     'payment_id' => 1, // Replace with actual payment ID if available
        //     'quantity' => 2, // Replace with actual quantity
        //     'price' => 50.00, // Replace with actual price
        // ]);
    }
}
