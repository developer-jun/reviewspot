<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ["name" => "Restaurants", "description" => fake()->realText(250) ],
            ["name" => "Contractors", "description" => fake()->realText(250) ],
            ["name" => "Electricians", "description" => fake()->realText(250) ],
            ["name" => "Home Cleaners", "description" => fake()->realText(250) ],
            ["name" => "HVAC", "description" => fake()->realText(250) ],
            ["name" => "Landscaping", "description" => fake()->realText(250) ],
            ["name" => "Locksmiths", "description" => fake()->realText(250) ],
            ["name" => "Movers", "description" => fake()->realText(250) ],
            ["name" => "Plumbers", "description" => fake()->realText(250) ],
            ["name" => "Auto Repair", "description" => fake()->realText(250) ],
            ["name" => "Auto Detailing", "description" => fake()->realText(250) ],
            ["name" => "Towing", "description" => fake()->realText(250) ],
        ];    

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
