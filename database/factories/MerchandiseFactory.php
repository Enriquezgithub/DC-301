<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Merchandise>
 */
class MerchandiseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'brand' => fake()->word(10),
            'description' => fake()->word(30),
            'retail_price' => fake()->numberBetween(1,200),
            'whole_sale_price' => fake()->numberBetween(50,200),
            'whole_sale_qty' => fake()->numberBetween(1,100),
            'qty_stock' => fake()->numberBetween(1,100)
        ];
    }
}
