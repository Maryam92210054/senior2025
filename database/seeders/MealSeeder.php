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
        DB::table('meals')->delete();
        DB::statement('ALTER TABLE meals AUTO_INCREMENT = 1;');
        DB::table('meals')->insert([
            [
                'name' => 'Overnight Oats with Chia and Berries',
                'description' => 'A creamy, rolled oats with almond milk, chia seeds, and mixed berries, Sweetened with honey.',
                'health_info' => 'Calories: 250, Protein: 8g, Carbs: 40g, Fat: 7g',
                'meal_image' => 'Overnight Oats with Chia and Berries.jfif', 
                'goal_id' => 2, 
                'meal_type_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Baked Eggs with Spinach, Tomatoes, and Ricotta',
                'description' => 'The dish features gently baked eggs nestled in a flavorful mix of sautéed spinach, cherry tomatoes, and creamy ricotta cheese.',
                'health_info' => 'Calories: 180, Protein: 12g, Fat: 11g, Carbs: 5g',
                'goal_id' => 2, 
                'meal_type_id' => 1,
                'meal_image' => 'Baked Eggs with Spinach, Tomatoes, and Ricotta.jfif',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Quinoa Breakfast Bowl',
                'description' => 'A plant-based protein-rich bowl made with of cooked quinoa, creamy almond milk, a dollop of almond butter, and sliced banana,',
                'health_info' => 'Calories: 300, Protein: 10g, Carbs: 42g, Fat: 9g',
                'goal_id' => 2, 
                'meal_type_id' => 1,
                'meal_image' => 'Quinoa Breakfast Bowl.jfif',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Whole-Grain Pancakes with Almond Butter',
                'description' => 'A healthier twist on classic pancakes, made with whole-grain pancake mix, skimmed milk, almond butter, and maple syrup, served with fresh banana and strawberry .',
                'health_info' => 'Calories: 300, Protein: 8g, Carbs: 45g, Fat: 9g',
                'goal_id' => 2, 
                'meal_type_id' => 1,
                'meal_image' => 'Whole-Grain Pancakes with Almond Butter.jfif',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Granola and Fruits Bowl',
                'description' => 'A nutrient-packed granola bowl, made with Greek yogurt, chia seeds , honey , and topped with banana and blueberries.',
                'health_info' => 'Calories: 35, Protein: 12g, Carbs: 40g, Fat: 15g',
                'goal_id' => 2, 
                'meal_type_id' => 1,
                'meal_image' => 'Granola and Fruits Bowl.jfif',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Poached eggs with broccoli & whole-grain flatbread',
                'description' => 'Protein-packed eggs served with antioxidant-rich broccoli and cherry tomatoes, accompanied by whole-grain flatbread.',
                'health_info' => 'Calories: 283, Protein: 22g, Carbs: 30g, Fat: 17g',
                'goal_id' => 2, 
                'meal_type_id' => 1,
                'meal_image' => 'Poached eggs with broccoli & whole-grain flatbread.jfif',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Cinnamon porridge with baked bananas',
                'description' => 'The porridge is made from oats cooked to creamy perfection with milk and a sprinkle of cinnamon for warmth with ripe backed bananas.',
                'health_info' => 'Calories: 360, Protein: 14g, Carbs: 52g, Fat: 9g',
                'goal_id' => 2, 
                'meal_type_id' => 1,
                'meal_image' => 'Cinnamon porridge with baked bananas.jfif',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Cheesy Spinach and Tomato Sandwich',
                'description' => 'This cheesy breakfast sandwich combines whole-grain bread, melty cheese, fresh spinach, and juicy tomatoes.',
                'health_info' => 'Calories: 250, Protein: 10g, Carbs: 30g, Fat: 9g',
                'goal_id' => 2, 
                'meal_type_id' => 1,
                'meal_image' => 'Cheesy Spinach and Tomato Sandwich.jfif',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Labneh and Vegetable Sandwich',
                'description' => 'This light and nutritious sandwich is made with creamy labneh, fresh crunchy vegetables, all tucked into whole-grain bread.',
                'health_info' => 'Calories: 220, Protein: 8g, Carbs: 25g, Fat: 10g',
                'goal_id' => 2, 
                'meal_type_id' => 1,
                'meal_image' => 'Labneh and Vegetable Sandwich.jfif',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Cottage Cheese with Fruits and Nuts',
                'description' => 'This simple yet nutrient-packed breakfast with protein-rich cottage cheese, fresh fruits , and crunchy nuts',
                'health_info' => 'Calories: 180, Protein: 12g, Carbs: 10g, Fat: 8g',
                'goal_id' => 2, 
                'meal_type_id' => 1,
                'meal_image' => 'Cottage Cheese with Fruits and Nuts.jfif',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Chicken Sweetcorn Wrap',
                'description' => 'This Wrap combines chicken (soaked with low-fat Greek yogurt, olive oil, paprika, and pepper), fresh vegetables, and fiber-rich sweetcorn, all wrapped up in a whole-grain tortilla.',
                'health_info' => 'Calories: 400, Protein: 30g, Carbs: 30g, Fat: 15g',
                'goal_id' => 2,
                'meal_type_id' => 2,
                'meal_image' => 'Chicken Sweetcorn Wrap.jfif',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Low-Calorie Lasagna',
                'description' => 'This healthy lasagna recipe is a lightened-up version of the classic, made with lean ground meat, whole wheat pasta, part-skim cheese, crushed tomatoes, and tomato paste.',
                'health_info' => 'Calories: 450, Protein: 30g, Carbs: 30g, Fat: 12g',
                'goal_id' => 2,
                'meal_type_id' => 2,
                'meal_image' => 'Low-Calorie Lasagna.jfif',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Spicy Beef Taco Bowl',
                'description' => 'This bowl is the perfect combination of lean ground beef, seasoned with chili powder, cumin, and cayenne pepper, served with quinoa, fresh veggies, creamy avocado, Greek yogurt, and salsa.',
                'health_info' => 'Calories: 450, Protein: 35g, Carbs: 45g, Fat: 18g',
                'goal_id' => 2,
                'meal_type_id' => 2,
                'meal_image' => 'Spicy Beef Taco Bowl.jfif',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Chicken Curry with Rice',
                'description' => 'A healthy chicken curry with rice, bursting with bold flavors from turmeric, garlic, and ginger, providing a low-fat, protein-rich lunch.',
                'health_info' => 'Calories: 410, Protein: 34g, Carbs: 42g, Fat: 10g',
                'goal_id' => 2,
                'meal_type_id' => 2,
                'meal_image' => 'Chicken Curry with Rice.jfif',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Tuna Pasta Salad',
                'description' => 'This Healthy Tuna Salad is a light yet filling lunch packed with lean protein from tuna, fresh vegetables, and heart-healthy fats, with a tangy dressing and crunchy texture.',
                'health_info' => 'Calories: 250, Protein: 25g, Carbs: 8g, Fat: 12g',
                'goal_id' => 2,
                'meal_type_id' => 2,
                'meal_image' => 'Tuna Pasta Salad.jfif',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Lemon and Herb Chicken with Wedges',
                'description' => 'This Lemon and Herb Chicken with Potato Wedges is made with boneless chicken breasts, fresh lemon juice, zest, olive oil, and dried oregano served with potato wedges.',
                'health_info' => 'Calories: 360, Protein: 30g, Carbs: 25g, Fat: 12g',
                'goal_id' => 2,
                'meal_type_id' => 2,
                'meal_image' => 'Lemon and Herb Chicken with Wedges.jfif',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Balsamic Beef with Veggie Mash',
                'description' => 'Tender strips of beef glazed in a tangy balsamic reduction paired with a creamy mash made from nutrient-packed vegetables like cauliflower and sweet potato.',
                'health_info' => 'Calories: 320, Protein: 30g, Carbs: 24g, Fat: 9g',
                'goal_id' => 2,
                'meal_type_id' => 2,
                'meal_image' => 'Balsamic Beef with Veggie Mash.jfif',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'One-Pot Chicken & Rice',
                'description' => 'Juicy chicken pieces cooked with seasoned rice and vegetables in a single pot. Packed with lean protein, whole grains, and plenty of nutrients, it’s a balanced meal.',
                'health_info' => 'Calories: 350, Protein: 28g, Carbs: 42g, Fat: 8g',
                'goal_id' => 2,
                'meal_type_id' => 2,
                'meal_image' => 'One-Pot Chicken & Rice.jfif',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Spaghetti with Tomatoes & Walnuts',
                'description' => 'This vegetarian-friendly dish combines cherry tomatoes, toasted walnuts, and a hint of garlic with spaghetti for a healthy, flavorful meal.',
                'health_info' => 'Calories: 380, Protein: 12g, Carbs: 52g, Fat: 14g',
                'goal_id' => 2,
                'meal_type_id' => 2,
                'meal_image' => 'Spaghetti with Tomatoes & Walnuts.jfif',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Steak, Roasted Pepper & Pearl Barley Salad',
                'description' => 'A hearty salad that combines tender steak slices, roasted peppers, and nutty pearl barley tossed with a zesty dressing and fresh greens.',
                'health_info' => 'Calories: 400, Protein: 28g, Carbs: 38g, Fat: 12g',
                'goal_id' => 2,
                'meal_type_id' => 2,
                'meal_image' => 'Steak, Roasted Pepper & Pearl Barley Salad.jfif',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Tuna on Toast with Mashed Avocado',
                'description' => 'Combining creamy avocado with lemon juice, protein-packed tuna mixed with Greek yogurt, Dijon mustard, minced garlic, and crunchy whole-grain toast.',
                'health_info' => 'Calories: 320, Protein: 22g, Fat: 14g, Carbs: 22g',
                'goal_id' => 2,
                'meal_type_id' => 3,
                'meal_image' => 'Tuna on Toast with Mashed Avocado.jfif',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Mediterranean Salad with Hummus Dressing',
                'description' => 'A vibrant and refreshing meal packed with fresh vegetables (spinach, arugula, cucumber, red onion, parsley, cherry tomatoes), protein-rich chickpeas, and a creamy, tangy hummus dressing.',
                'health_info' => 'Calories: 300, Protein: 10g, Fat: 22g, Carbs: 24g',
                'goal_id' => 2,
                'meal_type_id' => 3,
                'meal_image' => 'Mediterranean Salad with Hummus Dressing.jfif',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Spicy Baked Cauliflower Wings',
                'description' => 'Cauliflower florets tossed in a spicy, crispy batter and baked until golden brown, served with a dipping sauce made of Greek yogurt, tahini, and lemon juice.',
                'health_info' => 'Calories: 216, Protein: 5g, Fat: 6g, Carbs: 18g',
                'goal_id' => 2,
                'meal_type_id' => 3,
                'meal_image' => 'Spicy Baked Cauliflower Wings.jfif',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Crispy Halloumi Tacos with Slaw',
                'description' => 'A vibrant, healthy meal that combines the crunchy, savory goodness of halloumi with a refreshing, tangy slaw.',
                'health_info' => 'Calories: 250, Protein: 12g, Fat: 15g, Carbs: 20g',
                'goal_id' => 2,
                'meal_type_id' => 3,
                'meal_image' => 'Crispy Halloumi Tacos with Slaw.jfif',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Vermicelli Noodle & Beef Salad',
                'description' => 'Thin rice noodles paired with tender, lean beef slices, fresh herbs, and a tangy dressing made of rice vinegar, soy sauce, honey, sesame oil, and chili flakes.',
                'health_info' => 'Calories: 300, Protein: 28g, Fat: 15g, Carbs: 30g',
                'goal_id' => 2,
                'meal_type_id' => 3,
                'meal_image' => 'Vermicelli Noodle & Beef Salad.jfif',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Watermelon, Sumac & Feta Salad',
                'description' => 'A refreshing, tangy, and savory salad that combines the sweetness of watermelon with the richness of feta cheese and the citrusy, slightly sour notes of sumac.',
                'health_info' => 'Calories: 150, Protein: 5g, Fat: 10g, Carbs: 14g',
                'goal_id' => 2,
                'meal_type_id' => 3,
                'meal_image' => 'Watermelon, Sumac & Feta Salad.jfif',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Mozzarella with Spicy Tomatoes & Garlicky Bun',
                'description' => 'A simple yet flavorful dish that combines creamy mozzarella with tangy, spicy tomatoes and a buttery, garlicky bun.',
                'health_info' => 'Calories: 300, Protein: 18g, Fat: 22g, Carbs: 35g',
                'goal_id' => 2,
                'meal_type_id' => 3,
                'meal_image' => 'Mozzarella with Spicy Tomatoes & Garlicky Bun.jfif',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Roasted Tomato, Sweetcorn, Thyme & Feta Cornbread',
                'description' => 'Sweetcorn and roasted tomatoes add natural sweetness, while feta cheese provides a creamy, tangy contrast. Fresh thyme brings an aromatic touch.',
                'health_info' => 'Calories: 180, Protein: 6g, Fat: 9g, Carbs: 22g',
                'goal_id' => 2,
                'meal_type_id' => 3,
                'meal_image' => 'Roasted Tomato, Sweetcorn, Thyme & Feta Cornbread.jfif',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Egg Muffin',
                'description' => 'Bite-sized frittatas made with eggs, fresh vegetables, and cheese. Low in carbs and packed with protein.',
                'health_info' => 'Calories: 80 (per muffin), Protein: 6g, Fat: 4g, Carbs: 2g',
                'goal_id' => 3,
                'meal_type_id' => 1,
                'meal_image' => 'Egg Muffin.jfif',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Greek Yogurt Parfait',
                'description' => 'A beautifully layered treat that combines creamy yogurt, juicy berries, and crunchy granola for a perfect balance of flavors and textures.',
                'health_info' => 'Calories: 250, Protein: 15g, Fat: 6g, Carbs: 20g',
                'goal_id' => 3,
                'meal_type_id' => 1,
                'meal_image' => 'Greek Yogurt Parfait.jfif',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Cottage Cheese Fruit Bowl',
                'description' => 'A delightful combination of creamy cottage cheese and the vibrant flavors of fresh fruit. Naturally sweetened with fruits and optional honey, with nuts and seeds for a satisfying crunch.',
                'health_info' => 'Calories: 220, Protein: 15g, Fat: 5g, Carbs: 30g',
                'goal_id' => 3,
                'meal_type_id' => 1,
                'meal_image' => 'Cottage Cheese Fruit Bowl.jfif',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Egg and Black Bean Tacos',
                'description' => 'Nutritious tacos combining the creaminess of scrambled eggs with the hearty texture of black beans. Toppings like avocado and salsa add freshness and flavor.',
                'health_info' => 'Calories: 230 (per taco), Protein: 12g, Fat: 10g, Carbs: 22g',
                'goal_id' => 3,
                'meal_type_id' => 1,
                'meal_image' => 'Egg and Black Bean Tacos.jfif',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Protein Waffles',
                'description' => 'Waffles made with protein-packed ingredients like protein powder, eggs, and oats, customized with fruits, nuts, and Greek yogurt.',
                'health_info' => 'Calories: 150 (per waffle), Protein: 12g, Fat: 5g, Carbs: 16g',
                'goal_id' => 3,
                'meal_type_id' => 1,
                'meal_image' => 'Protein Waffles.jfif',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Spinach, Bean, and Cheese Breakfast Quesadilla',
                'description' => 'A healthy and satisfying morning meal with tender spinach, hearty black beans, and melty cheese in a crispy tortilla.',
                'health_info' => 'Calories: 300, Protein: 15g, Fat: 12g, Carbs: 27g',
                'goal_id' => 3,
                'meal_type_id' => 1,
                'meal_image' => 'Spinach, Bean, and Cheese Breakfast Quesadilla.jfif',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'High-Protein Baked Oatmeal',
                'description' => 'Packed with protein from vanilla protein powder and Greek yogurt, with rolled oats and fresh berries like blueberries and raspberries.',
                'health_info' => 'Calories: 250, Protein: 20g, Fat: 6g, Carbs: 34g',
                'goal_id' => 3,
                'meal_type_id' => 1,
                'meal_image' => 'High-Protein Baked Oatmeal.jfif',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Pesto Chicken Quinoa Bowls',
                'description' => 'The homemade pesto adds a delicious herby richness to the chicken and quinoa, while the fresh vegetables provide crunch and a burst of freshness.',
                'health_info' => 'Calories: 400, Protein: 35g, Carbs: 22g, Fat: 25g',
                'goal_id' => 3, 
                'meal_type_id' => 2,
                'meal_image' => 'Quinoa Breakfast Bowl.jfif',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Roasted Salmon Rice Bowl',
                'description' => 'This is a vibrant and nutrient-rich dish that combines the omega-3s of salmon, the earthy sweetness of beets, and the crunch of roasted Brussels sprouts. Paired with fiber-rich brown rice',
                'health_info' => 'Calories: 450, Protein: 25g, Carbs: 30g, Fat: 35g',
                'goal_id' => 3, 
                'meal_type_id' => 2,
                'meal_image' => 'Roasted Salmon Rice Bowl.jfif',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Spinach & Feta Turkey Meatballs with Quinoa',
                'description' => 'The turkey meatballs are juicy and savory, with a delicious combination of spinach and feta that adds freshness and creaminess.Paired with herbed quinoa.',
                'health_info' => 'Calories: 400, Protein: 35g, Fat: 18g, Carbs: 30g',
                'goal_id' => 3, // Replace with the appropriate goal ID
                'meal_type_id' => 2, // Replace with the appropriate meal type ID
                'meal_image' => 'Spinach & Feta Turkey Meatballs with Herbed Quinoa.jfif',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Shrimp, Avocado & Feta Wrap',
                'description' => 'The Shrimp, Avocado & Feta Wrap is a light yet satisfying meal that combines succulent shrimp, creamy avocado, and tangy feta cheese wrapped in a soft tortilla.',
                'health_info' => 'Calories: 400, Protein: 30g, Fat: 25g, Carbs: 20g',
                'goal_id' => 3, // Replace with the appropriate goal ID
                'meal_type_id' => 2, // Replace with the appropriate meal type ID
                'meal_image' => 'Shrimp, Avocado & Feta Wrap.jfif',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Beef Taco Bowl',
                'description' => 'The Easy Beef Taco Bowl with Salsa Ranch offers a delicious, customizable twist on traditional tacos. With seasoned ground beef, a creamy and tangy salsa ranch sauce, and fresh toppings like avocado, tomatoes, and lettuce.',
                'health_info' => 'Calories: 450, Protein: 30g, Fat: 24g, Carbs: 35g',
                'goal_id' => 3, // Replace with the appropriate goal ID
                'meal_type_id' => 2, // Replace with the appropriate meal type ID
                'meal_image' => 'Beef Taco Bowl.jfif',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Beef and Lentil Stew',
                'description' => 'This Stew is the perfect combination of savory and hearty, offering a rich depth of flavor from the beef and spices, balanced with the earthy goodness of lentils and vegetables.',
                'health_info' => 'Calories: 350, Protein: 30g, Fat: 10g, Carbs: 35g',
                'goal_id' => 3, // Replace with the appropriate goal ID
                'meal_type_id' => 2, // Replace with the appropriate meal type ID
                'meal_image' => 'Pesto Chicken Quinoa Bowls.jfif',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Chicken Dough Pizza',
                'description' => 'This Chicken Dough Pizza offers a unique, low-carb take on a classic favorite. Rich in protein and bursting with flavors from the Italian herbs, cheese, and fresh vegetables.',
                'health_info' => 'Calories: 300, Protein: 35g, Fat: 15g, Carbs: 6g',
                'goal_id' => 3, // Replace with the appropriate goal ID
                'meal_type_id' => 2, // Replace with the appropriate meal type ID
                'meal_image' => 'Chicken Dough Pizza.jfif',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Marry Me Chickpeas',
                'description' => 'A flavorful dish with chickpeas simmered in a creamy tomato-based sauce. Spiced with garlic, paprika, and Italian herbs, served with rice.',
                'health_info' => 'Calories: 250, Protein: 15g, Fat: 8g, Carbs: 25g',
                'goal_id' => 3, // Replace with the appropriate goal ID
                'meal_type_id' => 3,
                'meal_image' => 'Marry Me Chickpeas.jfif',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Creamy Caramelized Cabbage Pasta',
                'description' => 'Pasta tossed with sweet, caramelized cabbage, creamy sauce, and a hint of tangy vinegar for balance.',
                'health_info' => 'Calories: 328, Protein: 15g, Fat: 12g, Carbs: 40g',
                'goal_id' => 3, // Replace with the appropriate goal ID
                'meal_type_id' => 3,
                'meal_image' => 'Creamy Caramelized Cabbage Pasta.jfif',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Chickpea Pasta with Mushrooms & Kale',
                'description' => 'A healthy, plant-based pasta featuring chickpea noodles, earthy mushrooms, and nutrient-packed kale in a light olive oil or garlic sauce.',
                'health_info' => 'Calories: 350, Protein: 15g, Fat: 10g, Carbs: 45g',
                'goal_id' => 3, // Replace with the appropriate goal ID
                'meal_type_id' => 3,
                'meal_image' => 'Chickpea Pasta with Mushrooms & Kale.jfif',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Red Lentil Fritters with Ginger-Yogurt Sauce',
                'description' => 'Crispy red lentil patties flavored with spices, served with a refreshing ginger-infused yogurt dip.',
                'health_info' => 'Calories: 200, Protein: 10g, Fat: 6g, Carbs: 25g',
                'goal_id' => 3, // Replace with the appropriate goal ID
                'meal_type_id' => 3,
                'meal_image' => 'ed Lentil Fritters with Ginger-Yogurt Sauce.jfif',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Sardines on Toast',
                'description' => 'A simple, savory dish with canned sardines served on crispy bread, often topped with lemon juice, herbs, and olive oil.',
                'health_info' => 'Calories: 250, Protein: 15g, Fat: 10g, Carbs: 20g',
                'goal_id' => 3, // Replace with the appropriate goal ID
                'meal_type_id' => 3,
                'meal_image' => 'Sardines on Toast.jfif',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Red Lentil Soup With Lemon and Dill',
                'description' => 'A hearty and tangy soup made with red lentils, fresh lemon juice, and aromatic dill. Perfect for a comforting meal.',
                'health_info' => 'Calories: 200, Protein: 15g, Fat: 5g, Carbs: 25g',
                'goal_id' => 3, // Replace with the appropriate goal ID
                'meal_type_id' => 3,
                'meal_image' => 'Red Lentil Soup With Lemon and Dill.jfif',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Spanish Omelet With Potatoes and Chorizo',
                'description' => 'A classic Spanish dish of eggs, potatoes, and chorizo sausage, cooked into a thick and hearty omelet.',
                'health_info' => 'Calories: 300, Protein: 15g, Fat: 18g, Carbs: 20g',
                'goal_id' => 3, // Replace with the appropriate goal ID
                'meal_type_id' => 3,
                'meal_image' => 'Spanish Omelet With Potatoes and Chorizo.jfif',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            //overall health brakfast
            [
                'name' => 'Avocado Toast With Egg',
                'description' => 'Whole-grain toast topped with creamy avocado slices and a soft-boiled egg.',
                'health_info' => 'Calories: 280, Protein: 10g, Fat: 15g, Carbs: 20g',
                'goal_id' => 1,
                'meal_type_id' => 1,
                'meal_image' => 'Avocado Toast With Egg.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Manakish Zaatar',
                'description' => 'A popular Levantine flatbread topped with a mix of olive oil and zaatar spices, baked to perfection. Served with fresh vegetables.',
                'health_info' => 'Calories: 300, Protein: 7g, Fat: 12g, Carbs: 40g',
                'goal_id' => 1,
                'meal_type_id' => 1,
                'meal_image' => 'Manakish Zaatar.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Açaí Bowl',
                'description' => 'A Brazilian smoothie bowl made with blended açaí berries, topped with granola, bananas, and honey.',
                'health_info' => 'Calories: 250, Protein: 5g, Fat: 6g, Carbs: 45g',
                'goal_id' => 1,
                'meal_type_id' => 1,
                'meal_image' => 'Açaí Bowl.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Banana and Peanut Butter Wrap',
                'description' => 'A whole-grain tortilla filled with peanut butter and sliced bananas, perfect for a quick breakfast.',
                'health_info' => 'Calories: 300, Protein: 9g, Fat: 12g, Carbs: 40g',
                'goal_id' => 1,
                'meal_type_id' => 1,
                'meal_image' => 'Banana and Peanut Butter Wrap.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Croissant with Butter and Jam',
                'description' => 'A classic French breakfast with a flaky croissant served alongside butter and fruit jam.',
                'health_info' => 'Calories: 270, Protein: 5g, Fat: 15g, Carbs: 30g',
                'goal_id' => 1,
                'meal_type_id' => 1,
                'meal_image' => 'Croissant with Butter and Jam.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Bagel with Cream Cheese and Lox',
                'description' => 'A popular American breakfast featuring a bagel topped with cream cheese and smoked salmon.',
                'health_info' => 'Calories: 350, Protein: 15g, Fat: 12g, Carbs: 40g',
                'goal_id' => 1,
                'meal_type_id' => 1,
                'meal_image' => 'Bagel with Cream Cheese and Lox.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Oatmeal with Berries',
                'description' => 'Warm oatmeal topped with fresh berries, nuts, and a drizzle of honey.',
                'health_info' => 'Calories: 250, Protein: 8g, Fat: 5g, Carbs: 45g',
                'goal_id' => 1,
                'meal_type_id' => 1,
                'meal_image' => 'Oatmeal with Berries.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Hard-Boiled Eggs with Veggie Sticks and Hummus',
                'description' => 'Two hard-boiled eggs served with carrot and cucumber sticks and a side of hummus for dipping.',
                'health_info' => 'Calories: 220, Protein: 14g, Fat: 12g, Carbs: 10g',
                'goal_id' => 1,
                'meal_type_id' => 1,
                'meal_image' => 'Hard-Boiled Eggs with Veggie Sticks and Hummus.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Cheese, Ham, and Veggies Baguette',
                'description' => 'A delicious baguette filled with creamy cheese, savory ham, fresh veggies like lettuce, tomatoes, and cucumbers, all drizzled with a bit of olive oil.',
                'health_info' => 'Calories: 400, Protein: 20g, Fat: 18g, Carbs: 45g',
                'goal_id' => 1, 
                'meal_type_id' => 1, 
                'meal_image' => 'Cheese, Ham, and Veggies Baguette.jpg', 
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            //overall lunch
            [
                'name' => 'Grilled Chicken Shawarma Bowl',
                'description' => 'Tender grilled chicken marinated in shawarma spices, served with a side of quinoa, hummus, and mixed greens.',
                'health_info' => 'Calories: 400, Protein: 35g, Fat: 18g, Carbs: 25g',
                'goal_id' => 1, // Goal: Overall Health
                'meal_type_id' => 2, // Meal Type: Lunch
                'meal_image' => 'Grilled Chicken Shawarma Bowl.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                //  Lactose-Free
        
            ],
            [
                'name' => 'Quinoa and Roasted Vegetable Bowl',
                'description' => 'A filling quinoa bowl with roasted vegetables like zucchini, bell peppers, and sweet potatoes, drizzled with a lemon-tahini dressing.',
                'health_info' => 'Calories: 450, Protein: 12g, Fat: 18g, Carbs: 60g',
                'goal_id' => 1,  // Overall health goal
                'meal_type_id' => 2,  // Lunch meal type
                'meal_image' => 'Quinoa and Roasted Vegetable Bowl.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                // Vegetarian 
                // Lactose-Free 
            ],
            [
                'name' => 'Avocado and Tuna Salad',
                'description' => 'A fresh salad with avocado, tuna, mixed greens, and a light lemon vinaigrette dressing.',
                'health_info' => 'Calories: 380, Protein: 25g, Fat: 22g, Carbs: 12g',
                'goal_id' => 1,  // Overall health goal
                'meal_type_id' => 2,  // Lunch meal type
                'meal_image' => 'Avocado and Tuna Salad.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                // Lactose-Free (no dairy in this meal)
            ],
            [
                'name' => 'Grilled Chicken Avocado Burger',
                'description' => 'A grilled chicken breast patty topped with fresh avocado, mixed greens, tomatoes, and a whole grain bun.',
                'health_info' => 'Calories: 400, Protein: 35g, Fat: 20g, Carbs: 30g',
                'goal_id' => 1, // Goal: Overall Health
                'meal_type_id' => 2, // Meal Type: Lunch
                'meal_image' => 'Grilled Chicken Avocado Burger.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                // Lactose-Free (no dairy in this meal)

            ],
            [
                'name' => 'Sweet Potato and Black Bean Tacos',
                'description' => 'Soft corn tortillas filled with roasted sweet potatoes, black beans, avocado, salsa, and a sprinkle of lime.',
                'health_info' => 'Calories: 400, Protein: 14g, Fat: 12g, Carbs: 55g',
                'goal_id' => 1, // Goal: Overall Health
                'meal_type_id' => 2, // Meal Type: Lunch
                'meal_image' => 'Sweet Potato and Black Bean Tacos.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                //vegetarian
                //lactose free
            ],
            [
                'name' => 'Baked Salmon with Quinoa and Steamed Broccoli',
                'description' => 'Oven-baked salmon fillet served with a side of quinoa and steamed broccoli.',
                'health_info' => 'Calories: 500, Protein: 40g, Fat: 20g, Carbs: 45g',
                'goal_id' => 1, // Goal: Overall Health
                'meal_type_id' => 2, 
                'meal_image' => 'Baked Salmon with Quinoa and Steamed Broccoli.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                //lactose free
            ],
            [
                'name' => 'Quinoa & Veggie Burger',
                'description' => 'A quinoa patty loaded with bell peppers, onions, and spinach, served with a side of sweet potato fries.',
                'health_info' => 'Calories: 350, Protein: 12g, Fat: 10g, Carbs: 50g',
                'goal_id' => 1, // Goal: Overall Health
                'meal_type_id' => 2, // Meal Type: Lunch
                'meal_image' => 'Quinoa & Veggie Burger.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                // Vegetarian, Lactose-Free
        
            ],
            [
                'name' => 'Cauliflower Crust Margherita Pizza',
                'description' => 'A healthy cauliflower crust topped with fresh mozzarella, tomatoes, basil, and a light drizzle of olive oil.',
                'health_info' => 'Calories: 250, Protein: 12g, Fat: 15g, Carbs: 20g',
                'goal_id' => 1, // Goal: Overall Health
                'meal_type_id' => 2, // Meal Type: Lunch
                'meal_image' => 'Cauliflower Crust Margherita Pizza.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                // vegetarian
        
            ],
            [
                'name' => 'Stuffed Grape Leaves with Quinoa and Yogurt Dip',
                'description' => 'Healthy stuffed grape leaves filled with quinoa, herbs, and lemon, paired with a side of refreshing yogurt dip.',
                'health_info' => 'Calories: 220, Protein: 7g, Fat: 9g, Carbs: 28g',
                'goal_id' => 1, // Goal: Overall Health
                'meal_type_id' => 2, // Meal Type: Lunch
                'meal_image' => 'Stuffed Grape Leaves with Quinoa and Yogurt Dip.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                // Vegetarian,Gluten-Free, Lactose-Free
            ],
            [
                'name' => 'Baked Falafel with Tahini Sauce',
                'description' => 'Baked falafel made from chickpeas, fresh herbs, and spices, served with a tahini sauce for a healthy alternative to the fried version.',
                'health_info' => 'Calories: 250, Protein: 12g, Fat: 12g, Carbs: 30g',
                'goal_id' => 1, // Goal: Overall Health
                'meal_type_id' => 2, // Meal Type: Lunch
                'meal_image' => 'Baked Falafel with Tahini Sauce.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                // vegetarian, Gluten-Free
            ],
            //dinner overall 
            [
                'name' => 'Eggplant Parmesan',
                'description' => 'A lighter version of the classic eggplant parmesan, baked with a small amount of cheese and topped with marinara sauce and fresh basil.',
                'health_info' => 'Calories: 320, Protein: 12g, Fat: 18g, Carbs: 28g',
                'goal_id' => 1, // Goal: Overall Health
                'meal_type_id' => 3, // Meal Type: Dinner
                'meal_image' => 'Eggplant Parmesan.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                // vegetarian,
            ],
            [
                'name' => 'Cucumber and Hummus Wrap',
                'description' => 'A light and fresh wrap with cucumbers, hummus, and mixed greens wrapped in a whole wheat tortilla.',
                'health_info' => 'Calories: 250, Protein: 8g, Fat: 10g, Carbs: 35g',
                'goal_id' => 1, // Goal: Overall Health
                'meal_type_id' => 3, // Meal Type: Dinner
                'meal_image' => 'Cucumber and Hummus Wrap.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                // Vegetarian, Gluten-Free (if using gluten-free tortilla), Lactose-Free
            ],
            [
                'name' => 'Chickpea Salad with Avocado and Lemon Dressing',
                'description' => 'A simple, nutritious salad made with chickpeas, creamy avocado, fresh greens, and a tangy lemon dressing.',
                'health_info' => 'Calories: 350, Protein: 15g, Fat: 20g, Carbs: 30g',
                'goal_id' => 1, // Goal: Overall Health
                'meal_type_id' => 3, // Meal Type: Dinner
                'meal_image' => 'Chickpea Salad with Avocado and Lemon Dressing.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                // Vegetarian, Lactose-Free, Gluten-Free
            ],
            [
                'name' => 'Toasted Cheese Sandwich with Tomato Soup',
                'description' => 'A comforting toasted cheese sandwich , paired with a bowl of homemade tomato soup.',
                'health_info' => 'Calories: 400, Protein: 20g, Fat: 20g, Carbs: 35g',
                'goal_id' => 1, // Goal: Overall Health
                'meal_type_id' => 3, // Meal Type: Dinner
                'meal_image' => 'Toasted Cheese Sandwich with Tomato Soup.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                // Vegetarian
            ],
            [
                'name' => 'Cheese and Tomato Sandwich',
                'description' => 'A healthy cheese sandwich made with whole grain bread, cheese, tomatoes, and a drizzle of olive oil.',
                'health_info' => 'Calories: 320, Protein: 15g, Fat: 18g, Carbs: 28g',
                'goal_id' => 1, // Goal: Overall Health
                'meal_type_id' => 3, // Meal Type: Dinner
                'meal_image' => 'Cheese and Tomato Sandwich.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                // Vegetarian
            ],
        
            [
                'name' => 'Labneh and Olive Sandwich',
                'description' => 'A wholesome sandwich made with labneh, black olives, tomatoes, and a sprinkle of za’atar, served on whole wheat bread.',
                'health_info' => 'Calories: 350, Protein: 12g, Fat: 20g, Carbs: 35g',
                'goal_id' => 1, // Goal: Overall Health
                'meal_type_id' => 3, // Meal Type: Dinner
                'meal_image' => 'Labneh and Olive Sandwich.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                // Lactose-Free (if using dairy-free labneh)
            ],
            [
                'name' => 'Caesar Salad',
                'description' => 'A plant-based version of Caesar salad with crispy chickpeas, mixed greens, dairy-free dressing, and homemade croutons.',
                'health_info' => 'Calories: 280, Protein: 12g, Fat: 15g, Carbs: 25g',
                'goal_id' => 1, // Goal: Overall Health
                'meal_type_id' => 3, // Meal Type: Dinner
                'meal_image' => 'Caesar Salad.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                // Vegan, Lactose-Free, Gluten-Free (if using gluten-free croutons)
            ],
          
            
        ]);
    }
}
