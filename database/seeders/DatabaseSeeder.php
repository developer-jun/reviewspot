<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Note;
use App\Models\Business;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        /*User::factory()->create([
            'id' => 1,
            'name' => 'John Doe',
            'email' => 'john@doe.com',
            'password' => bcrypt('letmein'),
        ]);

        Note::factory(100)->create();
        */
        Business::factory(5000)->create(); // refer to BusinessFactory for each field definitions

    }
}
