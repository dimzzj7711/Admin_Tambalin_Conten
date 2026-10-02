<?php

namespace Database\Factories;

use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
             'number' => 'OR' . fake()->unique()->numberBetween(100000, 999999),
             'customer_id' => \App\Models\Customer::factory(),
             'status' => fake()->randomElement(['new', 'processing']),
             'total_price' => fake()->randomFloat(2, 100, 1000),
             'created_at' => now()->subDays(fake()->numberBetween(1, 700)),
             'updated_at' => now(),
        ];
    }
}
