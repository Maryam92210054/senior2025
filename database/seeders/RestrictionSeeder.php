<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class RestrictionSeeder extends Seeder

{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('restrictions')->delete();
        DB::statement('ALTER TABLE restrictions AUTO_INCREMENT = 1;');
        DB::table('restrictions')->insert([
            [
                'name' => 'Vegetarian',
                'description' => 'Excluding all types of meat.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Lactose Free',
                'description' => 'Excluding all types of dairy products',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    
    }
}