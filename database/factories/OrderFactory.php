<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    protected $model = Order::class;

    public function definition()
    {
        return [
            'admin_id' => Admin::factory(), // Assuming you have an AdminFactory
            'user_id' => User::factory(),   // Assuming you have a UserFactory
            'orderDate' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'TotalAmount' => $this->faker->randomFloat(2, 20, 500),
        ];
    }
}
