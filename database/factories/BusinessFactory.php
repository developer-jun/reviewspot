<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Business>
 */
class BusinessFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'=> fake()->company(),
            'phone' => fake()->phoneNumber(),
            'address' => fake()->streetAddress(),
            'address2' => fake()->buildingNumber(),
            'city' => fake()->city(),  
            'state' => fake()->stateAbbr(),
            'zip_code' => fake()->postcode(), 
            'summary' => fake()->realText(150), 
            'description' => fake()->realText(250),
            'business_type' => fake()->numberBetween(1, 3),
            'category_id' => fake()->numberBetween(1, 12)
        ];
        // `name`,  `phone`,  `address`,  `address2`,  `city`,  `state`,  `zip_code`, LEFT(`summary`, 256), LEFT(`description`, 256),  `business_type`
    }
}
