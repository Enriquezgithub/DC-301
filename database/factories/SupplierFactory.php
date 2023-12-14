<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Supplier>
 */
class SupplierFactory extends Factory
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
            'company_name' => fake()->word(10),
            'address' => fake()->address(),
            'phone' => fake()->phoneNumber('###########'),
            'contact_person' => fake()->name()
        ];
    }
}