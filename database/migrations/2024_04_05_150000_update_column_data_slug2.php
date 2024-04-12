<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $businesses = DB::table('businesses')->where('slug', '')->get();

        foreach ($businesses as $business) {

            DB::table('businesses')->where('id', $business->id)->update(['views' => 0, 'slug' => Str::of($business->name)->slug('-'), 'average_rating' => 0.0]);
        
        
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
