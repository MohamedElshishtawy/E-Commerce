<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Products>
 */
class ProductsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "name" => fake()->name(),
            "user_id" => 1,
            "description" => fake()->sentence(),
            "price" => random_int(1,200),
            "count" => random_int(0,100),
            "catigory" => random_int(1,2)
        ];
    }
}
