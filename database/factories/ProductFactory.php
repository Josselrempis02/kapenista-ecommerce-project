<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'img' => $this->faker->imageUrl(), // Generates a fake image URL
            'name' => $this->faker->word(), // Generates a fake product name
            'price' => $this->faker->randomFloat(2, 1, 1000), // Generates a fake price between 1 and 1000
            'description' => $this->faker->paragraph(5),
            'category' => $this->faker->word(),
            'stock' => $this->faker->numberBetween(1, 100), // Generates a fake category name
        ];
    }
}
