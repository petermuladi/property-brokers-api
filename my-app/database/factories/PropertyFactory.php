<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Property>
 */
class PropertyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id' => 1,
            'broker_id' => 2,
            'address' => fake()->address(),
            'listing_type' => fake()->randomElement(['Open-Listing', 'Sell-Listing', 'Excslusive-Listing']),
            'city' => fake()->city(),
            'zip_code' => fake()->postcode(),
            'description' => fake()->text(),
            'build_year' => fake()->year(),
        ];
    }
}