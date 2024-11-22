<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon; // Import Carbon for timestamp

class MealSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('meals')->insert([
            [
                'name' => 'Overnight Oats with Chia and Berries',
                'description' => 'A creamy, rolled oats with almond milk, chia seeds, and mixed berries, Sweetened with honey.',
                'health_info' => 'Calories: 250, Protein: 8g, Carbs: 40g, Fat: 7g',
                'image' => '', // Use an appropriate image filename here
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Baked Eggs with Spinach, Tomatoes, and Ricotta',
                'description' => 'The dish features gently baked eggs nestled in a flavorful mix of sautéed spinach, cherry tomatoes, and creamy ricotta cheese.',
                'health_info' => 'Calories: 180, Protein: 12g, Fat: 11g, Carbs: 5g',
                'image' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Quinoa Breakfast Bowl',
                'description' => 'A plant-based protein-rich bowl made with of cooked quinoa, creamy almond milk, a dollop of almond butter, and sliced banana,',
                'health_info' => 'Calories: 300, Protein: 10g, Carbs: 42g, Fat: 9g',
                'image' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Whole-Grain Pancakes with Almond Butter',
                'description' => 'A healthier twist on classic pancakes, made with whole-grain pancake mix, skimmed milk, almond butter, and maple syrup,
                served with fresh banana and strawberry .',
                'health_info' => 'Calories: 300, Protein: 8g, Carbs: 45g, Fat: 9g',
                'image' => 'smoothie_image.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Granola and Fruits Bowl',
                'description' => 'A nutrient-packed granola bowl, made with Greek yogurt, chia seeds , honey , and topped with banana and blueberries.',
                'health_info' => 'Calories: 35, Protein: 12g, Carbs: 40g, Fat: 15g',
                'image' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Poached eggs with broccoli & whole-grain flatbread',
                'description' => 'Protein-packed eggs served with antioxidant-rich broccoli and cherry tomatoes, accompanied by whole-grain flatbread.',
                'health_info' => 'Calories: 283, Protein: 22g, Carbs: 30g, Fat: 17g',
                'image' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Cinnamon porridge with baked bananas',
                'description' => 'The porridge is made from oats cooked to creamy perfection with milk and a sprinkle of cinnamon for warmth with ripe backed bananas.',
                'health_info' => 'Calories: 360, Protein: 14g, Carbs: 52g, Fat: 9g',
                'image' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Cheesy Spinach and Tomato Sandwich',
                'description' => 'This cheesy breakfast sandwich combines whole-grain bread, melty cheese, fresh spinach, and juicy tomatoes.',
                'health_info' => 'Calories: 250, Protein: 10g, Carbs: 30g, Fat: 9g',
                'image' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Labneh and Vegetable Sandwich',
                'description' => 'This light and nutritious sandwich is made with creamy labneh, fresh crunchy vegetables, all tucked into whole-grain bread.',
                'health_info' => 'Calories: 220, Protein: 8g, Carbs: 25g, Fat: 10g',
                'image' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Cottage Cheese with Fruits and Nuts',
                'description' => 'This simple yet nutrient-packed breakfast with protein-rich cottage cheese, fresh fruits , and crunchy nuts',
                'health_info' => 'Calories: 180, Protein: 12g, Carbs: 10g, Fat: 8g',
                'image' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            
        ]);
    }
}
