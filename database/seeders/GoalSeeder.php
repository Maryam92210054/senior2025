<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GoalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Insert data into the goals table
        DB::table('goals')->insert([
            [
                'name' => 'Overall Health',
                'description' => 'Focused on balanced nutrition to maintain overall health and wellness.',
            ],
            [
                'name' => 'Low Calorie',
                'description' => 'Designed for individuals aiming to reduce calorie intake and manage weight.',
            ],
            [
                'name' => 'High Protein',
                'description' => 'Targeted towards individuals looking to build muscle and increase protein intake.',
            ],
        ]);
    }
}
