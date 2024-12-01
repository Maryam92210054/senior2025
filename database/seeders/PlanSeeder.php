<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('plans')->insert([
            [
                'description' => 'An Overall Health plan featuring 3 meals per day (Breakfast+Lunch+Dinner)',
                'price' => 12.50, // Price per day
                'goal_id' => 1, // Example goal ID (replace with actual IDs)
                'plan_type_id' => 1, // Example type ID (replace with actual IDs)
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'description' => 'An Overall Health plan featuring 2 meals per day (Breakfast+Lunch)',
                'price' => 9.00, // Price per day
                'goal_id' => 1, // Example goal ID (replace with actual IDs)
                'plan_type_id' => 2, // Example type ID (replace with actual IDs)
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'description' => 'An Overall Health plan featuring 2 main meals per day (Lunch+Dinner)',
                'price' => 10.00, // Price per day
                'goal_id' => 1, // Example goal ID (replace with actual IDs)
                'plan_type_id' => 3, // Example type ID (replace with actual IDs)
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'description' => 'A Low Calorie plan featuring 3 meals per day (Breakfast+Lunch+Dinner)',
                'price' => 14.00, // Price per day
                'goal_id' => 2, // Example goal ID (replace with actual IDs)
                'plan_type_id' => 1, // Example type ID (replace with actual IDs)
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'description' => 'An Low Calorie plan featuring 2 meals per day (Breakfast+Lunch)',
                'price' => 11.00, // Price per day
                'goal_id' => 2, // Example goal ID (replace with actual IDs)
                'plan_type_id' => 2, // Example type ID (replace with actual IDs)
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'description' => 'A Low Calorie plan featuring 2 main meals per day (Lunch+Dinner)',
                'price' => 12.00, // Price per day
                'goal_id' => 2, // Example goal ID (replace with actual IDs)
                'plan_type_id' => 3, // Example type ID (replace with actual IDs)
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'description' => 'A High Protein plan featuring 3 meals per day (Breakfast+Lunch+Dinner)',
                'price' => 16.00, // Price per day
                'goal_id' => 3, // Example goal ID (replace with actual IDs)
                'plan_type_id' => 1, // Example type ID (replace with actual IDs)
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'description' => 'An High Protein  plan featuring 2 meals per day (Breakfast+Lunch)',
                'price' => 13.50, // Price per day
                'goal_id' => 3, // Example goal ID (replace with actual IDs)
                'plan_type_id' => 2, // Example type ID (replace with actual IDs)
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'description' => 'A High Protein plan featuring 2 main meals per day (Lunch+Dinner)',
                'price' => 14.50, // Price per day
                'goal_id' => 3, // Example goal ID (replace with actual IDs)
                'plan_type_id' => 3, // Example type ID (replace with actual IDs)
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
           
           
        ]);
    }
}
