<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Property>
 */
class PropertyDescriptionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [

            'property_id' => 1,
            'price' => fake()->randomFloat(2, 1000, 1000000),
            'bedrooms' => fake()->numberBetween(1, 10),
            'bathrooms' => fake()->numberBetween(1, 10),
            'sqft' => fake()->randomFloat(2, 1000, 10000),
            'price_sqft' => fake()->randomFloat(2, 100, 1000),
            'property_type' => fake()->randomElement(['Single-home', 'Town-Home', 'Multi-Home', 'Bungalow-Home']),
            'status' => fake()->randomElement(['Sold', 'Sale', 'Hold']),
        ];
    }
}