<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class MealRestrictionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('meal_restrictions')->delete();
        DB::statement('ALTER TABLE meal_restrictions AUTO_INCREMENT = 1;');
        DB::table('meal_restrictions')->insert([
            //Low Calorie Breakfast 
            [
                'meal_id' => '1',
                'restriction_id' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'meal_id' => '1',
                'restriction_id' => '2',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'meal_id' => '2',
                'restriction_id' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'meal_id' => '3',
                'restriction_id' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'meal_id' => '3',
                'restriction_id' => '2',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'meal_id' => '4',
                'restriction_id' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'meal_id' => '5',
                'restriction_id' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'meal_id' => '5',
                'restriction_id' => '2',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'meal_id' => '6',
                'restriction_id' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'meal_id' => '6',
                'restriction_id' => '2',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'meal_id' => '7',
                'restriction_id' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'meal_id' => '8',
                'restriction_id' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],       
            [
                'meal_id' => '9',
                'restriction_id' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],     
            [
                'meal_id' => '10',
                'restriction_id' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            //Low Calorie Lunch 
            [
                'meal_id' => '15',
                'restriction_id' => '2',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'meal_id' => '16',
                'restriction_id' => '2',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'meal_id' => '17',
                'restriction_id' => '2',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'meal_id' => '18',
                'restriction_id' => '2',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'meal_id' => '19',
                'restriction_id' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'meal_id' => '19',
                'restriction_id' => '2',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'meal_id' => '20',
                'restriction_id' => '2',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            //low calorie dinner
            [
                'meal_id' => '22',
                'restriction_id' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'meal_id' => '22',
                'restriction_id' => '2',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'meal_id' => '23',
                'restriction_id' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'meal_id' => '24',
                'restriction_id' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'meal_id' => '24',
                'restriction_id' => '2',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'meal_id' => '25',
                'restriction_id' => '2',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'meal_id' => '26',
                'restriction_id' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'meal_id' => '27',
                'restriction_id' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'meal_id' => '28',
                'restriction_id' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            //high protein breakfast
            [
                'meal_id' => '29',
                'restriction_id' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'meal_id' => '30',
                'restriction_id' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'meal_id' => '31',
                'restriction_id' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'meal_id' => '32',
                'restriction_id' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'meal_id' => '32',
                'restriction_id' => '2',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'meal_id' => '33',
                'restriction_id' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'meal_id' => '34',
                'restriction_id' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'meal_id' => '35',
                'restriction_id' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            //high protein lunch
            
        ]);
    }
}
