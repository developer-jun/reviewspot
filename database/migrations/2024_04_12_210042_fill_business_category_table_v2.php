<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Faker\Factory as Faker;
use Illuminate\Support\Carbon;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $faker = Faker::create();
        $businesses = DB::table('businesses')->where('id', '>', 1)->where('id', '<', 30000)->get('id');
        $data = []; 
        $counter = 0;
        foreach ($businesses as $business) {
            $counter++;
            if($counter % 10 == 0) {
                $data[] = [
                    'business_id' => $business->id,
                    'category_id' => $faker->numberBetween(11, 12),
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ];
            }
        }
        DB::table('business_categories')->insert($data);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
