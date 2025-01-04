-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 05, 2025 at 12:30 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `maryam_yazan_senior`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `goals`
--

CREATE TABLE `goals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `goals`
--

INSERT INTO `goals` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Overall Health', 'Focused on balanced nutrition to maintain overall health and wellness.', NULL, NULL),
(2, 'Low Calorie', 'Designed for individuals aiming to reduce calorie intake and manage weight.', NULL, NULL),
(3, 'High Protein', 'Targeted towards individuals looking to build muscle and increase protein intake.', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `meals`
--

CREATE TABLE `meals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `health_info` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meal_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `goal_id` bigint(20) UNSIGNED NOT NULL,
  `meal_type_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `availability` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `meals`
--

INSERT INTO `meals` (`id`, `name`, `description`, `health_info`, `meal_image`, `goal_id`, `meal_type_id`, `created_at`, `updated_at`, `availability`) VALUES
(1, 'Overnight Oats with Chia and Berries', 'A creamy, rolled oats with almond milk, chia seeds, and mixed berries, Sweetened with honey.', 'Calories: 250, Protein: 8g, Carbs: 40g, Fat: 7g', 'Overnight Oats with Chia and Berries.jfif', 2, 1, '2024-12-22 09:05:56', '2024-12-28 16:23:54', 1),
(2, 'Baked Eggs with Spinach, Tomatoes, and Ricotta', 'The dish features gently baked eggs nestled in a flavorful mix of sautéed spinach, cherry tomatoes, and creamy ricotta cheese.', 'Calories: 180, Protein: 12g, Fat: 11g, Carbs: 5g', 'Baked Eggs with Spinach, Tomatoes, and Ricotta.jfif', 2, 1, '2024-12-22 09:05:56', '2024-12-26 06:02:37', 1),
(3, 'Quinoa Breakfast Bowl', 'A plant-based protein-rich bowl made with of cooked quinoa, creamy almond milk, a dollop of almond butter, and sliced banana,', 'Calories: 300, Protein: 10g, Carbs: 42g, Fat: 9g', 'Quinoa Breakfast Bowl.jfif', 2, 1, '2024-12-22 09:05:56', '2024-12-22 09:05:56', 1),
(4, 'Whole-Grain Pancakes with Almond Butter', 'A healthier twist on classic pancakes, made with whole-grain pancake mix, skimmed milk, almond butter, and maple syrup, served with fresh banana and strawberry .', 'Calories: 300, Protein: 8g, Carbs: 45g, Fat: 9g', 'Whole-Grain Pancakes with Almond Butter.jfif', 2, 1, '2024-12-22 09:05:56', '2024-12-22 09:05:56', 1),
(5, 'Granola and Fruits Bowl', 'A nutrient-packed granola bowl, made with Greek yogurt, chia seeds , honey , and topped with banana and blueberries.', 'Calories: 35, Protein: 12g, Carbs: 40g, Fat: 15g', 'Granola and Fruits Bowl.jfif', 2, 1, '2024-12-22 09:05:56', '2024-12-22 09:05:56', 1),
(6, 'Poached eggs with broccoli & whole-grain flatbread', 'Protein-packed eggs served with antioxidant-rich broccoli and cherry tomatoes, accompanied by whole-grain flatbread.', 'Calories: 283, Protein: 22g, Carbs: 30g, Fat: 17g', 'Poached eggs with broccoli & whole-grain flatbread.jfif', 2, 1, '2024-12-22 09:05:56', '2024-12-22 09:05:56', 1),
(7, 'Cinnamon porridge with baked bananas', 'The porridge is made from oats cooked to creamy perfection with milk and a sprinkle of cinnamon for warmth with ripe backed bananas.', 'Calories: 360, Protein: 14g, Carbs: 52g, Fat: 9g', 'Cinnamon porridge with baked bananas.jfif', 2, 1, '2024-12-22 09:05:56', '2024-12-22 09:05:56', 1),
(8, 'Cheesy Spinach and Tomato Sandwich', 'This cheesy breakfast sandwich combines whole-grain bread, melty cheese, fresh spinach, and juicy tomatoes.', 'Calories: 250, Protein: 10g, Carbs: 30g, Fat: 9g', 'Cheesy Spinach and Tomato Sandwich.jfif', 2, 1, '2024-12-22 09:05:56', '2024-12-22 09:05:56', 1),
(9, 'Labneh and Vegetable Sandwich', 'This light and nutritious sandwich is made with creamy labneh, fresh crunchy vegetables, all tucked into whole-grain bread.', 'Calories: 220, Protein: 8g, Carbs: 25g, Fat: 10g', 'Labneh and Vegetable Sandwich.jfif', 2, 1, '2024-12-22 09:05:56', '2024-12-22 09:05:56', 1),
(10, 'Cottage Cheese with Fruits and Nuts', 'This simple yet nutrient-packed breakfast with protein-rich cottage cheese, fresh fruits , and crunchy nuts', 'Calories: 180, Protein: 12g, Carbs: 10g, Fat: 8g', 'Cottage Cheese with Fruits and Nuts.jfif', 2, 1, '2024-12-22 09:05:56', '2024-12-22 09:05:56', 1),
(11, 'Chicken Sweetcorn Wrap', 'This Wrap combines chicken (soaked with low-fat Greek yogurt, olive oil, paprika, and pepper), fresh vegetables, and fiber-rich sweetcorn, all wrapped up in a whole-grain tortilla.', 'Calories: 400, Protein: 30g, Carbs: 30g, Fat: 15g', 'Chicken Sweetcorn Wrap.jfif', 2, 2, '2024-12-22 09:05:56', '2024-12-22 09:05:56', 1),
(12, 'Low-Calorie Lasagna', 'This healthy lasagna recipe is a lightened-up version of the classic, made with lean ground meat, whole wheat pasta, part-skim cheese, crushed tomatoes, and tomato paste.', 'Calories: 450, Protein: 30g, Carbs: 30g, Fat: 12g', 'Low-Calorie Lasagna.jfif', 2, 2, '2024-12-22 09:05:56', '2024-12-22 09:05:56', 1),
(13, 'Spicy Beef Taco Bowl', 'This bowl is the perfect combination of lean ground beef, seasoned with chili powder, cumin, and cayenne pepper, served with quinoa, fresh veggies, creamy avocado, Greek yogurt, and salsa.', 'Calories: 450, Protein: 35g, Carbs: 45g, Fat: 18g', 'Spicy Beef Taco Bowl.jfif', 2, 2, '2024-12-22 09:05:56', '2024-12-22 09:05:56', 1),
(14, 'Chicken Curry with Rice', 'A healthy chicken curry with rice, bursting with bold flavors from turmeric, garlic, and ginger, providing a low-fat, protein-rich lunch.', 'Calories: 410, Protein: 34g, Carbs: 42g, Fat: 10g', 'Chicken Curry with Rice.jfif', 2, 2, '2024-12-22 09:05:56', '2024-12-22 09:05:56', 1),
(15, 'Tuna Pasta Salad', 'This Healthy Tuna Salad is a light yet filling lunch packed with lean protein from tuna, fresh vegetables, and heart-healthy fats, with a tangy dressing and crunchy texture.', 'Calories: 250, Protein: 25g, Carbs: 8g, Fat: 12g', 'Tuna Pasta Salad.jfif', 2, 2, '2024-12-22 09:05:56', '2024-12-22 09:05:56', 1),
(16, 'Lemon and Herb Chicken with Wedges', 'This Lemon and Herb Chicken with Potato Wedges is made with boneless chicken breasts, fresh lemon juice, zest, olive oil, and dried oregano served with potato wedges.', 'Calories: 360, Protein: 30g, Carbs: 25g, Fat: 12g', 'Lemon and Herb Chicken with Wedges.jfif', 2, 2, '2024-12-22 09:05:56', '2024-12-22 09:05:56', 1),
(17, 'Balsamic Beef with Veggie Mash', 'Tender strips of beef glazed in a tangy balsamic reduction paired with a creamy mash made from nutrient-packed vegetables like cauliflower and sweet potato.', 'Calories: 320, Protein: 30g, Carbs: 24g, Fat: 9g', 'Balsamic Beef with Veggie Mash.jfif', 2, 2, '2024-12-22 09:05:56', '2024-12-22 09:05:56', 1),
(18, 'One-Pot Chicken & Rice', 'Juicy chicken pieces cooked with seasoned rice and vegetables in a single pot. Packed with lean protein, whole grains, and plenty of nutrients, it’s a balanced meal.', 'Calories: 350, Protein: 28g, Carbs: 42g, Fat: 8g', 'One-Pot Chicken & Rice.jfif', 2, 2, '2024-12-22 09:05:56', '2024-12-22 09:05:56', 1),
(19, 'Spaghetti with Tomatoes & Walnuts', 'This vegetarian-friendly dish combines cherry tomatoes, toasted walnuts, and a hint of garlic with spaghetti for a healthy, flavorful meal.', 'Calories: 380, Protein: 12g, Carbs: 52g, Fat: 14g', 'Spaghetti with Tomatoes & Walnuts.jfif', 2, 2, '2024-12-22 09:05:56', '2024-12-22 09:05:56', 1),
(20, 'Steak, Roasted Pepper & Pearl Barley Salad', 'A hearty salad that combines tender steak slices, roasted peppers, and nutty pearl barley tossed with a zesty dressing and fresh greens.', 'Calories: 400, Protein: 28g, Carbs: 38g, Fat: 12g', 'Steak, Roasted Pepper & Pearl Barley Salad.jfif', 2, 2, '2024-12-22 09:05:56', '2024-12-22 09:05:56', 1),
(21, 'Tuna on Toast with Mashed Avocado', 'Combining creamy avocado with lemon juice, protein-packed tuna mixed with Greek yogurt, Dijon mustard, minced garlic, and crunchy whole-grain toast.', 'Calories: 320, Protein: 22g, Fat: 14g, Carbs: 22g', 'Tuna on Toast with Mashed Avocado.jfif', 2, 3, '2024-12-22 09:05:56', '2024-12-22 09:05:56', 1),
(22, 'Mediterranean Salad with Hummus Dressing', 'A vibrant and refreshing meal packed with fresh vegetables (spinach, arugula, cucumber, red onion, parsley, cherry tomatoes), protein-rich chickpeas, and a creamy, tangy hummus dressing.', 'Calories: 300, Protein: 10g, Fat: 22g, Carbs: 24g', 'Mediterranean Salad with Hummus Dressing.jfif', 2, 3, '2024-12-22 09:05:56', '2024-12-22 09:05:56', 1),
(23, 'Spicy Baked Cauliflower Wings', 'Cauliflower florets tossed in a spicy, crispy batter and baked until golden brown, served with a dipping sauce made of Greek yogurt, tahini, and lemon juice.', 'Calories: 216, Protein: 5g, Fat: 6g, Carbs: 18g', 'Spicy Baked Cauliflower Wings.jfif', 2, 3, '2024-12-22 09:05:56', '2024-12-22 09:05:56', 1),
(24, 'Crispy Halloumi Tacos with Slaw', 'A vibrant, healthy meal that combines the crunchy, savory goodness of halloumi with a refreshing, tangy slaw.', 'Calories: 250, Protein: 12g, Fat: 15g, Carbs: 20g', 'Crispy Halloumi Tacos with Slaw.jfif', 2, 3, '2024-12-22 09:05:56', '2024-12-22 09:05:56', 1),
(25, 'Vermicelli Noodle & Beef Salad', 'Thin rice noodles paired with tender, lean beef slices, fresh herbs, and a tangy dressing made of rice vinegar, soy sauce, honey, sesame oil, and chili flakes.', 'Calories: 300, Protein: 28g, Fat: 15g, Carbs: 30g', 'Vermicelli Noodle & Beef Salad.jfif', 2, 3, '2024-12-22 09:05:56', '2024-12-22 09:05:56', 1),
(26, 'Watermelon, Sumac & Feta Salad', 'A refreshing, tangy, and savory salad that combines the sweetness of watermelon with the richness of feta cheese and the citrusy, slightly sour notes of sumac.', 'Calories: 150, Protein: 5g, Fat: 10g, Carbs: 14g', 'Watermelon, Sumac & Feta Salad.jfif', 2, 3, '2024-12-22 09:05:56', '2024-12-22 09:05:56', 1),
(27, 'Mozzarella with Spicy Tomatoes & Garlicky Bun', 'A simple yet flavorful dish that combines creamy mozzarella with tangy, spicy tomatoes and a buttery, garlicky bun.', 'Calories: 300, Protein: 18g, Fat: 22g, Carbs: 35g', 'Mozzarella with Spicy Tomatoes & Garlicky Bun.jfif', 2, 3, '2024-12-22 09:05:56', '2024-12-22 09:05:56', 1),
(28, 'Roasted Tomato, Sweetcorn, Thyme & Feta Cornbread', 'Sweetcorn and roasted tomatoes add natural sweetness, while feta cheese provides a creamy, tangy contrast. Fresh thyme brings an aromatic touch.', 'Calories: 180, Protein: 6g, Fat: 9g, Carbs: 22g', 'Roasted Tomato, Sweetcorn, Thyme & Feta Cornbread.jfif', 2, 3, '2024-12-22 09:05:56', '2024-12-22 09:05:56', 1),
(29, 'Egg Muffin', 'Bite-sized frittatas made with eggs, fresh vegetables, and cheese. Low in carbs and packed with protein.', 'Calories: 80 (per muffin), Protein: 6g, Fat: 4g, Carbs: 2g', 'Egg Muffin.jfif', 3, 1, '2024-12-22 09:05:56', '2024-12-22 09:05:56', 1),
(30, 'Greek Yogurt Parfait', 'A beautifully layered treat that combines creamy yogurt, juicy berries, and crunchy granola for a perfect balance of flavors and textures.', 'Calories: 250, Protein: 15g, Fat: 6g, Carbs: 20g', 'Greek Yogurt Parfait.jfif', 3, 1, '2024-12-22 09:05:56', '2024-12-22 09:05:56', 1),
(31, 'Cottage Cheese Fruit Bowl', 'A delightful combination of creamy cottage cheese and the vibrant flavors of fresh fruit. Naturally sweetened with fruits and optional honey, with nuts and seeds for a satisfying crunch.', 'Calories: 220, Protein: 15g, Fat: 5g, Carbs: 30g', 'Cottage Cheese Fruit Bowl.jfif', 3, 1, '2024-12-22 09:05:56', '2024-12-25 16:08:15', 1),
(32, 'Egg and Black Bean Tacos', 'Nutritious tacos combining the creaminess of scrambled eggs with the hearty texture of black beans. Toppings like avocado and salsa add freshness and flavor.', 'Calories: 230 (per taco), Protein: 12g, Fat: 10g, Carbs: 22g', 'Egg and Black Bean Tacos.jfif', 3, 1, '2024-12-22 09:05:56', '2024-12-22 09:05:56', 1),
(33, 'Protein Waffles', 'Waffles made with protein-packed ingredients like protein powder, eggs, and oats, customized with fruits, nuts, and Greek yogurt.', 'Calories: 150 (per waffle), Protein: 12g, Fat: 5g, Carbs: 16g', 'Protein Waffles.jfif', 3, 1, '2024-12-22 09:05:56', '2024-12-22 09:05:56', 1),
(34, 'Spinach, Bean, and Cheese Breakfast Quesadilla', 'A healthy and satisfying morning meal with tender spinach, hearty black beans, and melty cheese in a crispy tortilla.', 'Calories: 300, Protein: 15g, Fat: 12g, Carbs: 27g', 'Spinach, Bean, and Cheese Breakfast Quesadilla.jfif', 3, 1, '2024-12-22 09:05:56', '2024-12-25 16:10:11', 1),
(35, 'High-Protein Baked Oatmeal', 'Packed with protein from vanilla protein powder and Greek yogurt, with rolled oats and fresh berries like blueberries and raspberries.', 'Calories: 250, Protein: 20g, Fat: 6g, Carbs: 34g', 'High-Protein Baked Oatmeal.jfif', 3, 1, '2024-12-22 09:05:56', '2024-12-22 09:05:56', 1),
(36, 'Pesto Chicken Quinoa Bowls', 'The homemade pesto adds a delicious herby richness to the chicken and quinoa, while the fresh vegetables provide crunch and a burst of freshness.', 'Calories: 400, Protein: 35g, Carbs: 22g, Fat: 25g', 'Pesto Chicken Quinoa Bowls.jfif', 3, 2, '2024-12-22 09:05:56', '2025-01-04 19:48:32', 1),
(37, 'Roasted Salmon Rice Bowl', 'This is a vibrant and nutrient-rich dish that combines the omega-3s of salmon, the earthy sweetness of beets, and the crunch of roasted Brussels sprouts. Paired with fiber-rich brown rice', 'Calories: 450, Protein: 25g, Carbs: 30g, Fat: 35g', 'Roasted Salmon Rice Bowl.jfif', 3, 2, '2024-12-22 09:05:56', '2024-12-22 09:05:56', 1),
(38, 'Spinach & Feta Turkey Meatballs with Quinoa', 'The turkey meatballs are juicy and savory, with a delicious combination of spinach and feta that adds freshness and creaminess.Paired with herbed quinoa.', 'Calories: 400, Protein: 35g, Fat: 18g, Carbs: 30g', 'Spinach & Feta Turkey Meatballs with Herbed Quinoa.jfif', 3, 2, '2024-12-22 09:05:56', '2024-12-22 09:05:56', 1),
(39, 'Shrimp, Avocado & Feta Wrap', 'The Shrimp, Avocado & Feta Wrap is a light yet satisfying meal that combines succulent shrimp, creamy avocado, and tangy feta cheese wrapped in a soft tortilla.', 'Calories: 400, Protein: 30g, Fat: 25g, Carbs: 20g', 'Shrimp, Avocado & Feta Wrap.jfif', 3, 2, '2024-12-22 09:05:56', '2024-12-22 09:05:56', 1),
(40, 'Beef Taco Bowl', 'The Easy Beef Taco Bowl with Salsa Ranch offers a delicious, customizable twist on traditional tacos. With seasoned ground beef, a creamy and tangy salsa ranch sauce, and fresh toppings like avocado, tomatoes, and lettuce.', 'Calories: 450, Protein: 30g, Fat: 24g, Carbs: 35g', 'Beef Taco Bowl.jfif', 3, 2, '2024-12-22 09:05:56', '2024-12-22 09:05:56', 1),
(41, 'Beef and Lentil Stew', 'This Stew is the perfect combination of savory and hearty, offering a rich depth of flavor from the beef and spices, balanced with the earthy goodness of lentils and vegetables.', 'Calories: 350, Protein: 30g, Fat: 10g, Carbs: 35g', 'Pesto Chicken Quinoa Bowls.jfif', 3, 2, '2024-12-22 09:05:56', '2024-12-22 09:05:56', 1),
(42, 'Chicken Dough Pizza', 'This Chicken Dough Pizza offers a unique, low-carb take on a classic favorite. Rich in protein and bursting with flavors from the Italian herbs, cheese, and fresh vegetables.', 'Calories: 300, Protein: 35g, Fat: 15g, Carbs: 6g', 'Chicken Dough Pizza.jfif', 3, 2, '2024-12-22 09:05:56', '2024-12-22 09:05:56', 1),
(43, 'Marry Me Chickpeas', 'A flavorful dish with chickpeas simmered in a creamy tomato-based sauce. Spiced with garlic, paprika, and Italian herbs, served with rice.', 'Calories: 250, Protein: 15g, Fat: 8g, Carbs: 25g', 'Marry Me Chickpeas.jfif', 3, 3, '2024-12-22 09:05:56', '2024-12-22 09:05:56', 1),
(44, 'Creamy Caramelized Cabbage Pasta', 'Pasta tossed with sweet, caramelized cabbage, creamy sauce, and a hint of tangy vinegar for balance.', 'Calories: 328, Protein: 15g, Fat: 12g, Carbs: 40g', 'Creamy Caramelized Cabbage Pasta.jfif', 3, 3, '2024-12-22 09:05:56', '2024-12-22 09:05:56', 1),
(45, 'Chickpea Pasta with Mushrooms & Kale', 'A healthy, plant-based pasta featuring chickpea noodles, earthy mushrooms, and nutrient-packed kale in a light olive oil or garlic sauce.', 'Calories: 350, Protein: 15g, Fat: 10g, Carbs: 45g', 'Chickpea Pasta with Mushrooms & Kale.jfif', 3, 3, '2024-12-22 09:05:56', '2024-12-22 09:05:56', 1),
(46, 'Red Lentil Fritters with Ginger-Yogurt Sauce', 'Crispy red lentil patties flavored with spices, served with a refreshing ginger-infused yogurt dip.', 'Calories: 200, Protein: 10g, Fat: 6g, Carbs: 25g', 'ed Lentil Fritters with Ginger-Yogurt Sauce.jfif', 3, 3, '2024-12-22 09:05:56', '2024-12-22 09:05:56', 1),
(47, 'Sardines on Toast', 'A simple, savory dish with canned sardines served on crispy bread, often topped with lemon juice, herbs, and olive oil.', 'Calories: 250, Protein: 15g, Fat: 10g, Carbs: 20g', 'Sardines on Toast.jfif', 3, 3, '2024-12-22 09:05:56', '2024-12-22 09:05:56', 1),
(48, 'Red Lentil Soup With Lemon and Dill', 'A hearty and tangy soup made with red lentils, fresh lemon juice, and aromatic dill. Perfect for a comforting meal.', 'Calories: 200, Protein: 15g, Fat: 5g, Carbs: 25g', 'Red Lentil Soup With Lemon and Dill.jfif', 3, 3, '2024-12-22 09:05:56', '2024-12-22 09:05:56', 1),
(49, 'Spanish Omelet With Potatoes and Chorizo', 'A classic Spanish dish of eggs, potatoes, and chorizo sausage, cooked into a thick and hearty omelet.', 'Calories: 300, Protein: 15g, Fat: 18g, Carbs: 20g', 'Spanish Omelet With Potatoes and Chorizo.jfif', 3, 3, '2024-12-22 09:05:56', '2024-12-22 09:05:56', 1),
(50, 'Avocado Toast With Egg', 'Whole-grain toast topped with creamy avocado slices and a soft-boiled egg.', 'Calories: 280, Protein: 10g, Fat: 15g, Carbs: 20g', 'Avocado Toast With Egg.jpg', 1, 1, '2024-12-22 09:05:56', '2024-12-22 09:05:56', 1),
(51, 'Manakish Zaatar', 'A popular Levantine flatbread topped with a mix of olive oil and zaatar spices, baked to perfection. Served with fresh vegetables.', 'Calories: 300, Protein: 7g, Fat: 12g, Carbs: 40g', 'Manakish Zaatar.jpg', 1, 1, '2024-12-22 09:05:56', '2024-12-22 09:05:56', 1),
(52, 'Açaí Bowl', 'A Brazilian smoothie bowl made with blended açaí berries, topped with granola, bananas, and honey.', 'Calories: 250, Protein: 5g, Fat: 6g, Carbs: 45g', 'Açaí Bowl.jpg', 1, 1, '2024-12-22 09:05:56', '2024-12-22 09:05:56', 1),
(53, 'Banana and Peanut Butter Wrap', 'A whole-grain tortilla filled with peanut butter and sliced bananas, perfect for a quick breakfast.', 'Calories: 300, Protein: 9g, Fat: 12g, Carbs: 40g', 'Banana and Peanut Butter Wrap.jpg', 1, 1, '2024-12-22 09:05:56', '2024-12-22 09:05:56', 1),
(54, 'Croissant with Butter and Jam', 'A classic French breakfast with a flaky croissant served alongside butter and fruit jam.', 'Calories: 270, Protein: 5g, Fat: 15g, Carbs: 30g', 'Croissant with Butter and Jam.jpg', 1, 1, '2024-12-22 09:05:56', '2024-12-22 09:05:56', 1),
(55, 'Bagel with Cream Cheese and Lox', 'A popular American breakfast featuring a bagel topped with cream cheese and smoked salmon.', 'Calories: 350, Protein: 15g, Fat: 12g, Carbs: 40g', 'Bagel with Cream Cheese and Lox.jpg', 1, 1, '2024-12-22 09:05:56', '2024-12-22 09:05:56', 1),
(56, 'Oatmeal with Berries', 'Warm oatmeal topped with fresh berries, nuts, and a drizzle of honey.', 'Calories: 250, Protein: 8g, Fat: 5g, Carbs: 45g', 'Oatmeal with Berries.jpg', 1, 1, '2024-12-22 09:05:56', '2024-12-22 09:05:56', 1),
(57, 'Hard-Boiled Eggs with Veggie Sticks and Hummus', 'Two hard-boiled eggs served with carrot and cucumber sticks and a side of hummus for dipping.', 'Calories: 220, Protein: 14g, Fat: 12g, Carbs: 10g', 'Hard-Boiled Eggs with Veggie Sticks and Hummus.jpg', 1, 1, '2024-12-22 09:05:56', '2024-12-22 09:05:56', 1),
(58, 'Cheese, Ham, and Veggies Baguette', 'A delicious baguette filled with creamy cheese, savory ham, fresh veggies like lettuce, tomatoes, and cucumbers, all drizzled with a bit of olive oil.', 'Calories: 400, Protein: 20g, Fat: 18g, Carbs: 45g', 'Cheese, Ham, and Veggies Baguette.jpg', 1, 1, '2024-12-22 09:05:56', '2024-12-22 09:05:56', 1),
(59, 'Grilled Chicken Shawarma Bowl', 'Tender grilled chicken marinated in shawarma spices, served with a side of quinoa, hummus, and mixed greens.', 'Calories: 400, Protein: 35g, Fat: 18g, Carbs: 25g', 'Grilled Chicken Shawarma Bowl.jpg', 1, 2, '2024-12-22 09:05:56', '2024-12-22 09:05:56', 1),
(60, 'Quinoa and Roasted Vegetable Bowl', 'A filling quinoa bowl with roasted vegetables like zucchini, bell peppers, and sweet potatoes, drizzled with a lemon-tahini dressing.', 'Calories: 450, Protein: 12g, Fat: 18g, Carbs: 60g', 'Quinoa and Roasted Vegetable Bowl.jpg', 1, 2, '2024-12-22 09:05:56', '2024-12-22 09:05:56', 1),
(61, 'Avocado and Tuna Salad', 'A fresh salad with avocado, tuna, mixed greens, and a light lemon vinaigrette dressing.', 'Calories: 380, Protein: 25g, Fat: 22g, Carbs: 12g', 'Avocado and Tuna Salad.jpg', 1, 2, '2024-12-22 09:05:56', '2024-12-22 09:05:56', 1),
(62, 'Grilled Chicken Avocado Burger', 'A grilled chicken breast patty topped with fresh avocado, mixed greens, tomatoes, and a whole grain bun.', 'Calories: 400, Protein: 35g, Fat: 20g, Carbs: 30g', 'Grilled Chicken Avocado Burger.jpg', 1, 2, '2024-12-22 09:05:56', '2024-12-22 09:05:56', 1),
(63, 'Sweet Potato and Black Bean Tacos', 'Soft corn tortillas filled with roasted sweet potatoes, black beans, avocado, salsa, and a sprinkle of lime.', 'Calories: 400, Protein: 14g, Fat: 12g, Carbs: 55g', 'Sweet Potato and Black Bean Tacos.jpg', 1, 2, '2024-12-22 09:05:56', '2024-12-22 09:05:56', 1),
(64, 'Baked Salmon with Quinoa and Steamed Broccoli', 'Oven-baked salmon fillet served with a side of quinoa and steamed broccoli.', 'Calories: 500, Protein: 40g, Fat: 20g, Carbs: 45g', 'Baked Salmon with Quinoa and Steamed Broccoli.jpg', 1, 2, '2024-12-22 09:05:56', '2024-12-22 09:05:56', 1),
(65, 'Quinoa & Veggie Burger', 'A quinoa patty loaded with bell peppers, onions, and spinach, served with a side of sweet potato fries.', 'Calories: 350, Protein: 12g, Fat: 10g, Carbs: 50g', 'Quinoa & Veggie Burger.jpg', 1, 2, '2024-12-22 09:05:56', '2024-12-22 09:05:56', 1),
(66, 'Cauliflower Crust Margherita Pizza', 'A healthy cauliflower crust topped with fresh mozzarella, tomatoes, basil, and a light drizzle of olive oil.', 'Calories: 250, Protein: 12g, Fat: 15g, Carbs: 20g', 'Cauliflower Crust Margherita Pizza.jpg', 1, 2, '2024-12-22 09:05:56', '2024-12-22 09:05:56', 1),
(67, 'Stuffed Grape Leaves with Quinoa and Yogurt Dip', 'Healthy stuffed grape leaves filled with quinoa, herbs, and lemon, paired with a side of refreshing yogurt dip.', 'Calories: 220, Protein: 7g, Fat: 9g, Carbs: 28g', 'Stuffed Grape Leaves with Quinoa and Yogurt Dip.jpg', 1, 2, '2024-12-22 09:05:56', '2024-12-22 09:05:56', 1),
(68, 'Baked Falafel with Tahini Sauce', 'Baked falafel made from chickpeas, fresh herbs, and spices, served with a tahini sauce for a healthy alternative to the fried version.', 'Calories: 250, Protein: 12g, Fat: 12g, Carbs: 30g', 'Baked Falafel with Tahini Sauce.jpg', 1, 2, '2024-12-22 09:05:56', '2024-12-22 09:05:56', 1),
(69, 'Eggplant Parmesan', 'A lighter version of the classic eggplant parmesan, baked with a small amount of cheese and topped with marinara sauce and fresh basil.', 'Calories: 320, Protein: 12g, Fat: 18g, Carbs: 28g', 'Eggplant Parmesan.jpg', 1, 3, '2024-12-22 09:05:56', '2024-12-22 09:05:56', 1),
(70, 'Cucumber and Hummus Wrap', 'A light and fresh wrap with cucumbers, hummus, and mixed greens wrapped in a whole wheat tortilla.', 'Calories: 250, Protein: 8g, Fat: 10g, Carbs: 35g', 'Cucumber and Hummus Wrap.jpg', 1, 3, '2024-12-22 09:05:56', '2024-12-22 09:05:56', 1),
(71, 'Chickpea Salad with Avocado and Lemon Dressing', 'A simple, nutritious salad made with chickpeas, creamy avocado, fresh greens, and a tangy lemon dressing.', 'Calories: 350, Protein: 15g, Fat: 20g, Carbs: 30g', 'Chickpea Salad with Avocado and Lemon Dressing.jpg', 1, 3, '2024-12-22 09:05:56', '2024-12-22 09:05:56', 1),
(72, 'Toasted Cheese Sandwich with Tomato Soup', 'A comforting toasted cheese sandwich , paired with a bowl of homemade tomato soup.', 'Calories: 400, Protein: 20g, Fat: 20g, Carbs: 35g', 'Toasted Cheese Sandwich with Tomato Soup.jpg', 1, 3, '2024-12-22 09:05:56', '2024-12-22 09:05:56', 1),
(73, 'Cheese and Tomato Sandwich', 'A healthy cheese sandwich made with whole grain bread, cheese, tomatoes, and a drizzle of olive oil.', 'Calories: 320, Protein: 15g, Fat: 18g, Carbs: 28g', 'Cheese and Tomato Sandwich.jpg', 1, 3, '2024-12-22 09:05:56', '2024-12-22 09:05:56', 1),
(74, 'Labneh and Olive Sandwich', 'A wholesome sandwich made with labneh, black olives, tomatoes, and a sprinkle of za’atar, served on whole wheat bread.', 'Calories: 350, Protein: 12g, Fat: 20g, Carbs: 35g', 'Labneh and Olive Sandwich.jpg', 1, 3, '2024-12-22 09:05:56', '2024-12-22 09:05:56', 1),
(75, 'Caesar Salad', 'A plant-based version of Caesar salad with crispy chickpeas, mixed greens, dairy-free dressing, and homemade croutons.', 'Calories: 280, Protein: 12g, Fat: 15g, Carbs: 25g', 'Caesar Salad.jpg', 1, 3, '2024-12-22 09:05:56', '2024-12-22 09:05:56', 1),
(76, 'High-Protein Vegetarian Burger', 'This hearty vegetarian burger combines quinoa, chickpeas, and lentils to create a protein-packed, fiber-rich patty that can be customized with tomato slices and special sauce.', 'Calories: 350,  Protein: 15g,  Carbs: 45g,  Fat: 8g', 'Brick Lane burger _ Jamie Oliver vegetarian recipes.jfif', 3, 2, '2024-12-26 10:35:51', '2024-12-26 10:35:51', 1),
(77, 'White Bean & Avocado Sandwich', 'This creamy, flavorful sandwich combines mashed white beans, ripe avocado, and fresh herbs for a nutritious and satisfying meal.', 'Calories: 350, Protein: 12g, Carbs: 40g, Fat: 15g', 'Smoky Avocado and White Bean Wrap.jfif', 3, 2, '2024-12-26 10:37:59', '2024-12-26 10:37:59', 1),
(78, 'Black Bean-Cauliflower \"Rice\" Bowl', 'This healthy and satisfying bowl features black beans, cauliflower rice, and fresh toppings ( fresh salsa, avocado, corn kernels ) for a nutrient-dense, plant-based meal .', 'Calories: 350, Protein: 12g, Carbs: 35g, Fat: 18g', 'Taco Bowl recipe – quick, gluten-free, and so full….jfif', 3, 2, '2024-12-26 10:39:40', '2024-12-26 10:39:40', 1),
(79, 'Baked Falafel Sandwiches', 'These baked falafel sandwiches are a healthier twist on the classic dish, served in pita bread with fresh veggies (lettuce , sliced cucumber ,chopped tomato ) and a tangy tahini sauce .', 'Calories: 400, Protein: 12g, Carbs: 45g, Fat: 16g', 'Vegan Falafel Baked Sandwich Wrap with Lemon Tahini Dressing.jfif', 3, 2, '2024-12-26 10:41:08', '2024-12-26 10:41:08', 1),
(80, 'Black Bean-Queso Wraps', 'These Black Bean-Queso Wraps combines hearty black beans, creamy queso sauce, and fresh vegetables all\r\nwrapped in a soft tortilla.', 'Calories: 370, Protein: 17g, Carbs: 50g, Fat: 15g', '8 Easy Veggie Wraps to Try Today - The Vegan Joy.jfif', 3, 2, '2024-12-26 10:42:32', '2024-12-26 10:42:32', 1),
(81, 'Egg in a Hole', 'This dish combines sunny-side-up eggs cooked inside bell pepper rings with a zesty avocado salsa for a colorful,\r\nprotein-packed, and low-carb meal.', 'Calories: 250, Protein: 12g, Carbs: 10g, Fat: 18g', 'Red Pepper Egg-in-a-Hole.jfif', 3, 2, '2024-12-26 10:46:02', '2024-12-29 09:44:49', 1),
(82, 'Veggie Spaghetti Puttanesca', 'This Veggie Spaghetti Puttanesca is a plant-based twist on the classic Italian dish, packed with briny olives, capers, and a spicy tomato sauce .', 'Calories: 350, Protein: 10g, Carbs: 55g, Fat: 10g', 'One Pot Puttanesca Pasta - SO VEGAN.jfif', 2, 2, '2024-12-26 10:52:28', '2024-12-26 10:52:28', 1),
(83, 'Oven-Roasted Sweet Potato & Zucchini Tortilla', 'This Oven-Roasted Sweet Potato & Zucchini Tortilla is a Spanish-inspired dish with a healthy twist. Sweet potatoes add a touch of natural sweetness, while zucchini keeps it light and fresh.', 'Calories: 200, Protein: 8g, Carbs: 18g, Fat: 10g', 'Paleo Lightened Up Spanish Tortilla.jfif', 2, 2, '2024-12-26 10:54:05', '2024-12-26 10:54:19', 1),
(84, 'Pulled BBQ Aubergine & Black Bean Burgers', 'These Pulled BBQ Aubergine & Black Bean Burgers are smoky, savory, and packed with plant based goodness. The shredded aubergine (eggplant) mimics the texture of pulled meat, while black beans provide protein and a hearty base.', 'Calories: 350, Protein: 12g, Carbs: 50g, Fat: 10g', 'Antipasti-Burger mit Frischkäse-Knoblauch-Creme und Sesam-Aubergine.jfif', 2, 2, '2024-12-26 10:56:32', '2024-12-26 10:56:32', 1),
(85, 'Spinach Filo Spiral Pie', 'This Spinach Filo Spiral Pie is a flaky, golden pastry filled with a savory spinach and ch\r\nmixture. Inspired by Mediterranean flavors', 'Calories: 250, Protein: 8g, Carbs: 20g, Fat: 15g', 'Spanakopita (Greek Spinach Pie).jfif', 2, 2, '2024-12-26 10:57:43', '2024-12-26 11:01:25', 1),
(86, 'Creamy Curried Carrot & Butter Bean Soup', 'This Creamy Curried Carrot & Butter Bean Soup is a velvety, warming dish with a perfect blend of sweetness from the carrots and richness from the butter beans. The gentle heat of curry spices makes it a comforting and nutritious .', 'Calories: 200, Protein: 6g, Carbs: 28g, Fat: 8g', 'Carrot Ginger Soup.jfif', 2, 2, '2024-12-26 10:59:02', '2024-12-26 10:59:59', 1),
(87, 'Spinach & Egg Scramble with Raspberries', 'A Spinach & Egg Scramble with Raspberries is a light, wholesome breakfast that balances savory and sweet\r\nflavors. Fluffy scrambled eggs are cooked with fresh, vibrant spinach, providing a protein-packed and rich nutrient base.  This lactose-free dish is simple, satisfying, and perfect for a healthy start to your day.', 'calories: 210, protein: 13g, carbs: 10g, fat: 12g', 'Scrambled Eggs with Cheese and Sautéed Spinach.jfif', 3, 1, '2024-12-29 08:04:38', '2024-12-29 08:04:38', 1),
(88, 'Freezer Breakfast Burritos', 'These make-ahead burritos are packed with plant-based protein and vibrant flavors. They feature scrambled tofu or black beans as the protein base, mixed with sautéed vegetables like bell peppers, onions, and spinach, and seasoned with smoky spices. Wrapped in a whole-grain tortilla. These burritos are high in protein, lactose-free, and perfect for a hearty, satisfying breakfast.', 'calories: 300, protein: 14g, carbs: 35g, fat: 10g', '5-Minute Breakfast Burritos_ The Perfect On-The-Go Morning Meal for Busy Food Lovers!.jfif', 3, 1, '2024-12-29 08:09:06', '2024-12-29 08:09:06', 1),
(89, 'Banana Chia seed pudding with almond milk', 'Chia seeds are soaked in almond milk, absorbing the liquid and creating a thick, pudding-like texture with a natural sweetener (maple syrup), topped with fresh bananas. This dish is high in fiber, omega-3 fatty acids, and protein, making it a great lactose-free choice for a balanced and filling meal.', 'calories: 200, protein: 10g, carbs: 16g, fat: 10g', 'Banana Chia Pudding Delight.jfif', 3, 1, '2024-12-29 08:13:54', '2024-12-29 08:13:54', 1),
(90, 'Protein smoothie bowl', 'This refreshing and satisfying smoothie bowl combines a lactose-free protein base with nutrient-packed  toppings. It features a thick smoothie made with coconut milk, plant-based protein powder, and fruit, topped with crunchy granola, seeds, and berries.', 'calories: 350, protein: 20g, carbs: 35g, fat:15g', 'Raspberry Smoothie Bowl - Elle & Pear.jfif', 3, 1, '2024-12-29 08:17:26', '2024-12-29 08:18:17', 1),
(91, 'Protein pancakes', 'These fluffy protein pancakes are a delicious and satisfying breakfast option that\'s completely lactose-free. They’re made with plant-based protein powder, whole grains, and soy milk, providing a great source of protein, fiber, and healthy carbs. with fresh strawberries, hazelnut butter, for a wholesome, filling meal.', 'calories: 300 ( per 3 pancakes), protein: 13g, carbs: 10g , fat: 14g', 'Vanilla Protein Pancakes _ Breakfast Protein Pancakes.jfif', 3, 1, '2024-12-29 08:21:16', '2024-12-29 08:21:16', 1),
(92, 'Grilled turkey and avocado wrap', 'This grilled turkey and avocado wrap is a delicious, protein-packed meal that’s both satisfying and lactose-free. Lean grilled turkey is paired with creamy avocado, crunchy veggies, and a light, flavorful dressing, all wrapped in a whole-grain tortilla.', 'calories: 350, protein: 30g, carbs: 25g, fat: 20g', 'Turkey Avocado Wraps Ready in Minutes.jfif', 3, 1, '2024-12-29 08:23:20', '2024-12-29 08:23:20', 1),
(93, 'Peanut butter and chia oatmeal', 'This classic French toast recipe is made completely lactose-free by using non-dairy milk and a dairy-free egg\r\nmixture. It’s crispy on the outside and soft on the inside, perfect for a sweet or savory breakfast. Top with mixed\r\nberries and maple syrup, for an indulgent yet lactose-free treat!', 'calories : 280, protein : 8g, carbs : 35g, fat: 12g', 'Strawberry Protein Oats - Peanut Butter and Jilly.jfif', 3, 1, '2024-12-29 08:25:38', '2024-12-29 08:29:12', 1),
(94, 'Vegetable Omelette', 'A vegetable omelette is a nutritious breakfast, packed with plant-based protein and colorful vegetables like spinach, bell peppers, mushrooms, and onions. This lactose-free dish is a healthy, satisfying way to boost your vegetable intake while keeping it dairy-free.', 'calories :150, protein :15g , carbs :5g , fat :8g', 'Veggie Omelette or Frittata.jfif', 2, 1, '2024-12-29 08:27:39', '2024-12-29 08:31:30', 1),
(95, 'French toast', 'This classic French toast recipe is made completely lactose-free by using non-dairy milk and a dairy-free egg\r\nmixture. It’s crispy on the outside and soft on the inside, perfect for a sweet or savory breakfast. Top with mixed\r\nberries and maple syrup, for an indulgent yet lactose-free treat!', 'calories : 280, protein : 8g, carbs : 35g, fat: 12g', 'Brioche French Toast.jfif', 2, 1, '2024-12-29 08:30:33', '2024-12-29 08:30:33', 1),
(96, 'Mediterranean Mashed Potatoes', 'A creamy and flavorful twist on classic mashed potatoes, made with olive oil instead of dairy, and infused with\r\ngarlic, lemon, and herbs like parsley or oregano. Served alongside steamed vegetables, it’s a simple, hearty, and\r\nlactose-free dinner.', 'calories : 200, protein: 4g, carbs: 30g, fat: 8g', 'Pistou Mash from Provence-Alpes-Côte d\'Azur, France.jfif', 2, 3, '2024-12-29 08:34:19', '2024-12-29 08:34:19', 1),
(97, 'Three Bean Salad', 'A light, protein-packed salad combining kidney beans, chickpeas, and green beans, tossed in a tangy olive oil\r\nand vinegar dressing. This refreshing, fiber-rich dish is perfect for a low-calorie lactose-free meal.', 'calories : 150, protein: 7g, carbs:20g, fat: 5g', 'Three-Bean Salad (Easy Recipe).jfif', 2, 3, '2024-12-29 08:36:14', '2024-12-29 08:36:14', 1),
(98, 'Skillet Curry Chickpea Potpie', 'A warm, comforting dish with a spicy chickpea curry base made from coconut milk and curry spices, topped with\r\na flaky dairy-free crust. It’s a plant-based dinner full of protein, fiber, and flavor.', 'calories : 250 , protein: 9g, carbs: 30g, fat: 10g', 'Skillet Curry Chickpea Potpie Packs 10 Grams of Fiber — EatingWell.jfif', 2, 3, '2024-12-29 08:37:55', '2024-12-29 08:37:55', 1),
(99, 'Peanut-Ginger Tofu Scramble', 'A savory scramble featuring crumbled tofu, stir-fried with a rich peanut-ginger sauce and mixed vegetables. This\r\ndish is high in plant-based protein and bursting with bold, spicy flavors.', 'calories : 220, protein: 15g, carbs: 10g, fat: 12', 'Tofu Scramble Breakfast Bowl.jfif', 2, 3, '2024-12-29 08:39:16', '2024-12-29 08:39:16', 1),
(100, 'Grilled Chicken with Steamed Vegetables', 'A classic and wholesome low-calorie dinner with lean grilled chicken breast seasoned with herbs and spices,\r\nserved with nutrient-packed steamed vegetables like broccoli, carrots, and zucchini, lightly drizzled with olive oil\r\nfor flavor.', 'calories : 300, protein: 35g, carbs: 10g, fat: 10g', 'Grilled Lemon Herb Chicken with Quinoa & Vegetables.jfif', 2, 3, '2024-12-29 08:40:20', '2024-12-29 08:40:20', 1),
(101, 'Plant-Based Lentil Oat Burgers', 'Hearty and flavorful burgers made with lentils, oats, and spices, offering a protein-packed, fiber-rich alternative\r\nto traditional meat patties. Perfect for serving with whole-grain bun', 'calories :200, protein: 10g, carbs: 30g, fat: 4g', 'Lentil-Chickpea Veggie Burgers with Avocado Green Harissa.jfif', 1, 3, '2024-12-29 08:42:14', '2024-12-29 08:42:14', 1),
(102, 'Egg Salad Sandwich', 'A creamy egg salad made with lactose-free mayo, Dijon mustard, and fresh herbs, served on whole-grain bread.\r\nA simple, high-protein, and satisfying lactose-free dinner option.', 'calories: 300, protein: 18g, carbs: 32g, fat: 12g', 'The Best Egg Sandwich Recipe by Oh Sweet Basil.jfif', 1, 3, '2024-12-29 08:43:31', '2024-12-29 08:43:31', 1),
(103, 'Garlic Chili Pasta with Roasted Cauliflower', 'A bold and spicy pasta dish tossed with roasted cauliflower, garlic, and red chili flakes in a light olive oil sauce. A\r\ndelicious lactose-free option that’s packed with flavor and nutrients.', 'calories: 300, protein: 10g, carbs: 45g, fat: 8g', 'Vegan Crispy Roasted Cauliflower with Creamy Garlic Parmesan Pasta.jfif', 1, 3, '2024-12-29 08:45:08', '2024-12-29 08:45:08', 1),
(104, 'Dairy Free Alfredo Sauce pasta', 'A creamy pasta made with a rich, dairy-free Alfredo sauce from cashews, almond milk, garlic, and nutritional\r\nyeast, served over or whole-grain pasta.', 'calories: 350, protein: 12g, carbs: 40g, fat: 15g', 'Easiest Dairy-Free Fettuccine Alfredo In 20 Minutes! • Tasty Thrifty Timely.jfif', 1, 3, '2024-12-29 08:46:33', '2024-12-29 08:46:33', 1),
(105, 'Nutty Trail Mix', 'Almonds, walnuts, pumpkin seeds, dried cranberries.', 'Calories: 180 kcal | Protein: 6g | Carbs: 14g | Fat: 12g', 'Cocoa Nibs Trail Mix….jfif', 1, 4, '2024-12-29 11:10:29', '2024-12-29 11:10:29', 1),
(106, 'Hummus and Veggies', 'Hummus, carrot sticks, cucumber slices.', 'Calories: 150 kcal | Protein: 4g | Carbs: 10g | Fat: 9g', 'df1a8396-bf07-4d9c-94de-4ae54534018d.jfif', 1, 4, '2024-12-29 11:11:59', '2024-12-29 11:11:59', 1),
(107, 'Avocado Rice Cakes', 'Rice cakes, avocado slices, sprinkle of salt and pepper.', 'Calories: 200 kcal | Protein: 3g | Carbs: 22g | Fat: 12g', 'Healthy and Quick Snack Idea- Tuna rice cakes with smashed avocado.jfif', 1, 4, '2024-12-29 11:13:12', '2024-12-29 11:13:12', 1),
(108, 'Roasted Chickpeas', 'Chickpeas, olive oil, spices (paprika, cumin)', 'Calories: 120 kcal | Protein: 5g | Carbs: 18g | Fat: 3g', 'How to Make Roasted Chickpeas.jfif', 1, 4, '2024-12-29 11:14:02', '2024-12-29 11:14:02', 1),
(109, 'Fruit Salad with Chia Seeds', 'Mixed fruits (berries, apple, orange), chia seeds', 'Calories: 140 kcal | Protein: 3g | Carbs: 30g | Fat: 3g', 'Winter Fruit Salad.jfif', 1, 4, '2024-12-29 11:14:48', '2024-12-29 11:14:48', 1),
(110, 'Banana Oat Energy Balls', 'Mashed banana, rolled oats, almond butter.', 'Calories: 180 kcal | Protein: 4g | Carbs: 26g | Fat: 6g', 'Energiebällchen (Energy Balls Rezept) - Elavegan.jfif', 1, 4, '2024-12-29 11:15:48', '2024-12-29 11:15:48', 1),
(111, 'Kale Chips', 'Kale leaves, olive oil, nutritional yeast, salt.', 'Calories: 110 kcal | Protein: 5g | Carbs: 8g | Fat: 7g', 'Crispy Baked Kale Chips.jfif', 1, 4, '2024-12-29 11:16:40', '2024-12-29 11:16:40', 1),
(112, 'Calories: 150 kcal | Protein: 2g | Carbs: 25g | Fat: 5g', 'Medjool dates, almond butter, shredded coconut.', 'Calories: 150 kcal | Protein: 2g | Carbs: 25g | Fat: 5g', 'Stuffed dates with peanut butter - Lazy Cat Kitchen.jfif', 1, 1, '2024-12-29 11:17:30', '2024-12-29 11:17:30', 1),
(113, 'Stuffed Dates', 'Medjool dates, almond butter, shredded coconut', 'Calories: 150 kcal | Protein: 2g | Carbs: 25g | Fat: 5g', 'Stuffed dates with peanut butter - Lazy Cat Kitchen.jfif', 1, 4, '2024-12-29 11:18:57', '2024-12-29 11:18:57', 1),
(114, 'Sweet Potato Chips', 'Thinly sliced sweet potatoes, olive oil, salt.', '160 kcal | Protein: 2g | Carbs: 28g | Fat: 5g', 'Homemade Sweet Potato Chips.jfif', 1, 4, '2024-12-29 11:20:18', '2024-12-29 11:29:04', 1),
(115, 'Chia Protein Pudding with Almond Butter Swirl', 'Chia seeds, almond milk, almond butter, vanilla extract, and stevia', 'Calories: 120 | Fat: 7g | Carbs: 10g | Protein: 7g', 'High-Protein, Banana Chia Seed Pudding With Almond Milk.jfif', 3, 4, '2025-01-03 09:23:28', '2025-01-03 09:23:28', 1),
(116, 'Peanut Butter Protein Bites', 'Oats, peanut butter, plant-based protein powder, chia seeds, and a touch of maple syrup', 'Calories: 100 | Fat: 5g | Carbs: 9g | Protein: 6g', 'Peanut Butter Oatmeal Balls - Elavegan.jfif', 3, 4, '2025-01-03 09:24:41', '2025-01-03 09:24:41', 1),
(117, 'Coconut Matcha Protein Bars', 'Coconut flakes, matcha powder, almond flour, and pea protein', 'Calories: 150 | Fat: 6g | Carbs: 10g | Protein: 10g', 'White Chocolate Matcha Protein Bars - Colorful Superfoodie.jfif', 3, 4, '2025-01-03 09:26:44', '2025-01-03 09:26:44', 1),
(118, 'Apple Slices with Almond Yogurt Dip', 'Ingredients: Sliced apple, almond-based yogurt, cinnamon.', 'Calories: 120 | Fat: 3g | Carbs: 18g | Protein: 5g', 'Tasty Greek Yogurt Apple Dip.jfif', 3, 4, '2025-01-03 09:27:59', '2025-01-03 09:27:59', 1),
(119, 'Banana Protein Muffins', 'Mashed bananas, oat flour, flax eggs, pea protein powder, and cinnamon.', 'Calories: 100 | Fat: 2g | Carbs: 16g | Protein: 6g', 'Greek Yogurt Banana Muffins (Soft & Fluffy)-___.jfif', 3, 4, '2025-01-03 09:41:33', '2025-01-03 09:41:33', 1),
(120, 'Sweet Potato Protein Bites', 'Mashed sweet potato, almond flour, pea protein, and cinnamon.', 'Calories: 110 | Fat: 2g | Carbs: 16g | Protein: 6g', 'Air fryer Sweet Potato and Carrot Bites - The best finger food for babies_.jfif', 3, 4, '2025-01-03 09:43:06', '2025-01-03 09:43:06', 1),
(121, 'Coconut Date Protein Truffles', 'Dates, coconut flour, pea protein powder, and shredded coconut.', 'Calories: 140 | Fat: 4g | Carbs: 16g | Protein: 6g', 'Salted Caramel Coconut Cashew Energy Bites _ Ambitious Kitchen.jfif', 3, 4, '2025-01-03 09:44:20', '2025-01-03 09:44:20', 1),
(122, 'Vanilla Protein Granola Clusters', 'Ingredients: Rolled oats, plant-based protein powder, vanilla extract, and almond milk.', 'Calories: 130 | Fat: 4g | Carbs: 15g | Protein: 7g', 'Granola Clusters Recipe.jfif', 3, 4, '2025-01-03 09:45:46', '2025-01-03 09:45:46', 1),
(123, 'Pumpkin Spice Energy Bars', 'Ingredients: Pumpkin puree, oat flour, chia seeds, and a pinch of cinnamon.', 'Calories: 130 | Fat: 3g | Carbs: 24g | Protein: 3g', 'Delicious Pumpkin Spice Energy Balls.jfif', 2, 4, '2025-01-03 09:49:22', '2025-01-03 09:49:22', 1),
(124, 'Dark Chocolate Chia Pudding', 'Ingredients: Chia seeds, unsweetened almond milk, cocoa powder, and stevia.', 'Calories: 120 | Fat: 5g | Carbs: 15g | Protein: 4g', 'Chocolate Chia Pudding.jfif', 2, 4, '2025-01-03 09:50:12', '2025-01-03 09:50:12', 1),
(125, 'Spiced Pear Compote with Almond Crunch', 'Ingredients: Poached pears with cinnamon, nutmeg, and a sprinkle of crushed almonds.', 'Calories: 110 | Fat: 3g | Carbs: 20g | Protein: 2g', 'Cozy Rustic Pear Crumble with Walnut Streusel.jfif', 2, 4, '2025-01-03 09:51:49', '2025-01-03 09:51:49', 1),
(126, 'Low-Calorie Carrot Cake Bites', 'Ingredients: Grated carrots, oats, cinnamon, stevia, and chopped dates rolled into balls.', 'Calories: 110 | Fat: 2g | Carbs: 20g | Protein: 2g', 'Carrot Cake Energy Balls.jfif', 2, 4, '2025-01-03 09:54:44', '2025-01-03 09:54:44', 1),
(127, 'Coconut Milk Panna Cotta', 'Ingredients: Light coconut milk, agar-agar, vanilla, and stevia, chilled into cups and topped with fresh strawberries', 'Calories: 90 | Fat: 3g | Carbs: 12g | Protein: 1g', 'Easy Buttermilk Vanilla Panna Cotta Recipe ____.jfif', 2, 4, '2025-01-03 09:56:05', '2025-01-03 09:56:05', 1),
(128, 'Low-Calorie Coconut Macaroons', 'Ingredients: Shredded coconut, almond flour, and stevia baked into bite-sized treats.', 'Calories: 100 | Fat: 3g | Carbs: 15g | Protein: 2g', 'Coconut Macaroons_ A Sweet and Simple Christmas Treat.jfif', 2, 4, '2025-01-03 09:57:23', '2025-01-03 09:57:23', 1),
(129, 'Cucumber Avocado Bites', 'Ingredients: Cucumber rounds topped with mashed avocado and a sprinkle of lemon juice.', 'Calories: 90 | Fat: 4g | Carbs: 8g | Protein: 1g', 'Greek Avocado Stuffed Cucumber Cups - Cookin\' Canuck.jfif', 2, 4, '2025-01-03 09:58:40', '2025-01-03 09:58:40', 1),
(130, 'Mini Baklava Bites (Low-Sugar)', 'Ingredients: Filo pastry cups filled with crushed pistachios and sweetened with stevia-syrup.', 'Calories: 95 | Fat: 3g | Carbs: 14g | Protein: 2g', 'Healthier Vegan Baklava Cups.jfif', 2, 4, '2025-01-03 10:00:02', '2025-01-03 10:00:02', 1);

-- --------------------------------------------------------

--
-- Table structure for table `meals_of_days`
--

CREATE TABLE `meals_of_days` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_day_id` bigint(20) UNSIGNED NOT NULL,
  `meal_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `meal_restrictions`
--

CREATE TABLE `meal_restrictions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `meal_id` bigint(20) UNSIGNED NOT NULL,
  `restriction_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `meal_restrictions`
--

INSERT INTO `meal_restrictions` (`id`, `meal_id`, `restriction_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2024-12-23 13:32:03', '2024-12-23 13:32:03'),
(2, 1, 2, '2024-12-23 13:32:03', '2024-12-23 13:32:03'),
(3, 2, 1, '2024-12-23 13:32:03', '2024-12-23 13:32:03'),
(4, 3, 1, '2024-12-23 13:32:03', '2024-12-23 13:32:03'),
(5, 3, 2, '2024-12-23 13:32:03', '2024-12-23 13:32:03'),
(6, 4, 1, '2024-12-23 13:32:03', '2024-12-23 13:32:03'),
(7, 5, 1, '2024-12-23 13:32:03', '2024-12-23 13:32:03'),
(9, 6, 1, '2024-12-23 13:32:03', '2024-12-23 13:32:03'),
(10, 6, 2, '2024-12-23 13:32:03', '2024-12-23 13:32:03'),
(11, 7, 1, '2024-12-23 13:32:03', '2024-12-23 13:32:03'),
(12, 8, 1, '2024-12-23 13:32:03', '2024-12-23 13:32:03'),
(13, 9, 1, '2024-12-23 13:32:03', '2024-12-23 13:32:03'),
(14, 10, 1, '2024-12-23 13:32:03', '2024-12-23 13:32:03'),
(15, 15, 2, '2024-12-23 13:32:03', '2024-12-23 13:32:03'),
(16, 16, 2, '2024-12-23 13:32:03', '2024-12-23 13:32:03'),
(17, 17, 2, '2024-12-23 13:32:03', '2024-12-23 13:32:03'),
(18, 18, 2, '2024-12-23 13:32:03', '2024-12-23 13:32:03'),
(19, 19, 1, '2024-12-23 13:32:03', '2024-12-23 13:32:03'),
(20, 19, 2, '2024-12-23 13:32:03', '2024-12-23 13:32:03'),
(21, 20, 2, '2024-12-23 13:32:03', '2024-12-23 13:32:03'),
(22, 22, 1, '2024-12-23 13:32:03', '2024-12-23 13:32:03'),
(23, 22, 2, '2024-12-23 13:32:03', '2024-12-23 13:32:03'),
(24, 23, 1, '2024-12-23 13:32:03', '2024-12-23 13:32:03'),
(25, 24, 1, '2024-12-23 13:32:03', '2024-12-23 13:32:03'),
(26, 24, 2, '2024-12-23 13:32:03', '2024-12-23 13:32:03'),
(27, 25, 2, '2024-12-23 13:32:03', '2024-12-23 13:32:03'),
(28, 26, 1, '2024-12-23 13:32:03', '2024-12-23 13:32:03'),
(29, 27, 1, '2024-12-23 13:32:03', '2024-12-23 13:32:03'),
(30, 28, 1, '2024-12-23 13:32:03', '2024-12-23 13:32:03'),
(31, 29, 1, '2024-12-23 13:32:03', '2024-12-23 13:32:03'),
(32, 30, 1, '2024-12-23 13:32:03', '2024-12-23 13:32:03'),
(33, 31, 1, '2024-12-23 13:32:03', '2024-12-23 13:32:03'),
(34, 32, 1, '2024-12-23 13:32:03', '2024-12-23 13:32:03'),
(35, 32, 2, '2024-12-23 13:32:03', '2024-12-23 13:32:03'),
(36, 33, 1, '2024-12-23 13:32:03', '2024-12-23 13:32:03'),
(37, 34, 1, '2024-12-23 13:32:03', '2024-12-23 13:32:03'),
(38, 35, 1, '2024-12-23 13:32:03', '2024-12-23 13:32:03'),
(39, 37, 2, NULL, NULL),
(40, 36, 2, NULL, NULL),
(41, 41, 2, NULL, NULL),
(42, 40, 2, NULL, NULL),
(43, 43, 1, NULL, NULL),
(44, 43, 2, NULL, NULL),
(45, 44, 1, NULL, NULL),
(46, 44, 2, NULL, NULL),
(47, 45, 1, NULL, NULL),
(48, 45, 2, NULL, NULL),
(49, 46, 1, NULL, NULL),
(50, 47, 2, NULL, NULL),
(51, 48, 1, NULL, NULL),
(52, 48, 2, NULL, NULL),
(53, 49, 1, NULL, NULL),
(54, 49, 2, NULL, NULL),
(55, 50, 1, NULL, NULL),
(56, 50, 2, NULL, NULL),
(57, 51, 1, NULL, NULL),
(58, 51, 2, NULL, NULL),
(59, 52, 1, NULL, NULL),
(60, 52, 2, NULL, NULL),
(61, 53, 1, NULL, NULL),
(62, 53, 2, NULL, NULL),
(63, 54, 1, NULL, NULL),
(64, 54, 2, NULL, NULL),
(65, 56, 1, NULL, NULL),
(66, 57, 1, NULL, NULL),
(67, 57, 2, NULL, NULL),
(68, 59, 2, NULL, NULL),
(69, 60, 1, NULL, NULL),
(70, 60, 2, NULL, NULL),
(71, 61, 2, NULL, NULL),
(72, 62, 2, NULL, NULL),
(73, 63, 1, NULL, NULL),
(74, 63, 2, NULL, NULL),
(75, 64, 2, NULL, NULL),
(76, 65, 1, NULL, NULL),
(77, 65, 2, NULL, NULL),
(78, 66, 1, NULL, NULL),
(79, 67, 1, NULL, NULL),
(80, 68, 1, NULL, NULL),
(81, 68, 2, NULL, NULL),
(82, 69, 1, NULL, NULL),
(83, 70, 1, NULL, NULL),
(84, 70, 2, NULL, NULL),
(85, 71, 1, NULL, NULL),
(86, 71, 2, NULL, NULL),
(87, 72, 1, NULL, NULL),
(88, 73, 1, NULL, NULL),
(89, 74, 1, NULL, NULL),
(90, 75, 1, NULL, NULL),
(91, 75, 2, NULL, NULL),
(92, 76, 1, NULL, NULL),
(93, 76, 2, NULL, NULL),
(94, 77, 1, NULL, NULL),
(95, 77, 2, NULL, NULL),
(96, 78, 1, NULL, NULL),
(97, 78, 2, NULL, NULL),
(98, 79, 1, NULL, NULL),
(99, 79, 2, NULL, NULL),
(100, 80, 1, NULL, NULL),
(101, 80, 2, NULL, NULL),
(102, 81, 1, NULL, NULL),
(103, 81, 2, NULL, NULL),
(104, 82, 1, NULL, NULL),
(105, 82, 2, NULL, NULL),
(106, 83, 1, NULL, NULL),
(107, 83, 2, NULL, NULL),
(108, 84, 1, NULL, NULL),
(109, 84, 2, NULL, NULL),
(110, 85, 1, NULL, NULL),
(111, 86, 1, NULL, NULL),
(112, 86, 2, NULL, NULL),
(113, 87, 1, NULL, NULL),
(114, 87, 2, NULL, NULL),
(115, 87, 3, NULL, NULL),
(116, 88, 1, NULL, NULL),
(117, 88, 2, NULL, NULL),
(118, 89, 1, NULL, NULL),
(119, 89, 2, NULL, NULL),
(120, 89, 3, NULL, NULL),
(121, 90, 1, NULL, NULL),
(122, 90, 2, NULL, NULL),
(123, 90, 3, NULL, NULL),
(124, 91, 1, NULL, NULL),
(125, 91, 2, NULL, NULL),
(126, 92, 2, NULL, NULL),
(127, 93, 1, NULL, NULL),
(128, 93, 2, NULL, NULL),
(129, 93, 3, NULL, NULL),
(130, 94, 1, NULL, NULL),
(131, 94, 2, NULL, NULL),
(132, 94, 3, NULL, NULL),
(133, 95, 1, NULL, NULL),
(134, 95, 2, NULL, NULL),
(135, 96, 1, NULL, NULL),
(136, 96, 2, NULL, NULL),
(137, 96, 3, NULL, NULL),
(138, 97, 1, NULL, NULL),
(139, 97, 2, NULL, NULL),
(140, 97, 3, NULL, NULL),
(141, 98, 1, NULL, NULL),
(142, 98, 2, NULL, NULL),
(143, 99, 1, NULL, NULL),
(144, 99, 2, NULL, NULL),
(145, 99, 3, NULL, NULL),
(146, 100, 2, NULL, NULL),
(147, 100, 3, NULL, NULL),
(148, 101, 1, NULL, NULL),
(149, 101, 2, NULL, NULL),
(150, 102, 1, NULL, NULL),
(151, 102, 2, NULL, NULL),
(152, 103, 1, NULL, NULL),
(153, 103, 2, NULL, NULL),
(154, 104, 1, NULL, NULL),
(155, 104, 2, NULL, NULL),
(156, 105, 1, NULL, NULL),
(157, 105, 2, NULL, NULL),
(158, 105, 3, NULL, NULL),
(159, 106, 1, NULL, NULL),
(160, 106, 2, NULL, NULL),
(161, 106, 3, NULL, NULL),
(162, 107, 1, NULL, NULL),
(163, 107, 2, NULL, NULL),
(164, 107, 3, NULL, NULL),
(165, 108, 1, NULL, NULL),
(166, 108, 2, NULL, NULL),
(167, 108, 3, NULL, NULL),
(168, 109, 1, NULL, NULL),
(169, 109, 2, NULL, NULL),
(170, 109, 3, NULL, NULL),
(171, 110, 1, NULL, NULL),
(172, 110, 2, NULL, NULL),
(173, 110, 3, NULL, NULL),
(174, 111, 1, NULL, NULL),
(175, 111, 2, NULL, NULL),
(176, 111, 3, NULL, NULL),
(177, 112, 1, NULL, NULL),
(178, 112, 2, NULL, NULL),
(179, 112, 3, NULL, NULL),
(180, 113, 1, NULL, NULL),
(181, 113, 2, NULL, NULL),
(182, 113, 3, NULL, NULL),
(183, 114, 1, NULL, NULL),
(184, 114, 2, NULL, NULL),
(185, 114, 3, NULL, NULL),
(186, 115, 1, NULL, NULL),
(187, 115, 2, NULL, NULL),
(188, 115, 3, NULL, NULL),
(189, 116, 1, NULL, NULL),
(190, 116, 2, NULL, NULL),
(191, 116, 3, NULL, NULL),
(192, 117, 1, NULL, NULL),
(193, 117, 2, NULL, NULL),
(194, 117, 3, NULL, NULL),
(195, 118, 1, NULL, NULL),
(196, 118, 2, NULL, NULL),
(197, 118, 3, NULL, NULL),
(198, 119, 1, NULL, NULL),
(199, 119, 2, NULL, NULL),
(200, 119, 3, NULL, NULL),
(201, 120, 1, NULL, NULL),
(202, 120, 2, NULL, NULL),
(203, 120, 3, NULL, NULL),
(204, 121, 1, NULL, NULL),
(205, 121, 2, NULL, NULL),
(206, 121, 3, NULL, NULL),
(207, 122, 1, NULL, NULL),
(208, 122, 2, NULL, NULL),
(209, 122, 3, NULL, NULL),
(210, 123, 1, NULL, NULL),
(211, 123, 2, NULL, NULL),
(212, 123, 3, NULL, NULL),
(213, 124, 1, NULL, NULL),
(214, 124, 2, NULL, NULL),
(215, 124, 3, NULL, NULL),
(216, 125, 1, NULL, NULL),
(217, 125, 2, NULL, NULL),
(218, 125, 3, NULL, NULL),
(219, 126, 1, NULL, NULL),
(220, 126, 2, NULL, NULL),
(221, 126, 3, NULL, NULL),
(222, 127, 1, NULL, NULL),
(223, 127, 2, NULL, NULL),
(224, 127, 3, NULL, NULL),
(225, 128, 1, NULL, NULL),
(226, 128, 2, NULL, NULL),
(227, 128, 3, NULL, NULL),
(228, 129, 1, NULL, NULL),
(229, 129, 2, NULL, NULL),
(230, 129, 3, NULL, NULL),
(231, 130, 1, NULL, NULL),
(232, 130, 2, NULL, NULL),
(233, 130, 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `meal_types`
--

CREATE TABLE `meal_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `meal_types`
--

INSERT INTO `meal_types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Breakfast', '2024-11-22 13:35:56', '2024-11-22 13:35:56'),
(2, 'Lunch', '2024-11-22 13:35:56', '2024-11-22 13:35:56'),
(3, 'Dinner', '2024-11-22 13:35:56', '2024-11-22 13:35:56'),
(4, 'Snack', '2024-11-22 13:35:56', '2024-11-22 13:35:56');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(4, '2024_11_20_100903_create_goals_table', 1),
(5, '2024_11_20_194320_create_plan_types_table', 1),
(6, '2024_11_20_205601_create-payments_table', 1),
(7, '2024_11_21_153403_create_roles_table', 1),
(8, '2024_11_22_150338_create_restrictions_table', 1),
(9, '2024_11_22_150620_create_meal_types_table', 1),
(10, '2024_11_22_150854_create_meals_table', 1),
(11, '2024_11_22_150913_create_users_table', 1),
(12, '2024_11_22_151319_create_meal_restrictions_table', 1),
(13, '2024_11_22_151340_create_plans_table', 1),
(14, '2024_11_22_151757_create_plan_type_meals_table', 1),
(15, '2024_11_22_152054_create_orders_table', 1),
(16, '2024_11_22_152118_create_order_days_table', 1),
(17, '2024_11_22_152251_create_meals_of_days_table', 1),
(18, '2024_12_01_141112_update_plan_type_meals_table', 2),
(19, '2024_12_01_153418_remove_days_per_week_from_plans_table', 3),
(20, '2024_12_11_201059_create_order_day_meals_table', 4),
(21, '2024_12_22_082731_add_availability_to_meals_table', 5),
(22, '2024_12_23_140807_add_availability_to_plans_table', 6),
(23, '2024_12_24_085254_add_address_details_to_users_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `delivery_time` time DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `plan_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `payment_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `refund_processed` enum('not_applicable','pending','completed') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'not_applicable'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `delivery_time`, `status`, `plan_id`, `user_id`, `payment_id`, `created_at`, `updated_at`, `refund_processed`) VALUES
(37, '16:34:00', 'pending', 2, 10, NULL, '2024-12-22 12:32:41', '2024-12-22 12:32:41', 'not_applicable'),
(38, '16:59:00', 'cancelled', 1, 10, 4, '2024-12-22 12:55:37', '2025-01-04 21:18:17', 'not_applicable'),
(39, '20:37:00', 'placed', 3, 10, 5, '2024-12-22 13:37:44', '2025-01-04 21:18:25', 'not_applicable'),
(40, '18:54:00', 'placed', 1, 10, 6, '2024-12-22 14:51:26', '2025-01-04 21:18:42', 'not_applicable'),
(41, '15:00:00', 'pending', 1, 10, 7, '2024-12-23 11:57:39', '2024-12-23 12:00:05', 'not_applicable'),
(42, '19:28:00', 'pending', 4, 10, 8, '2024-12-23 14:28:21', '2024-12-23 14:28:46', 'not_applicable'),
(52, '09:00:00', 'placed', 1, 10, NULL, '2024-12-25 16:04:50', '2024-12-25 16:05:07', 'not_applicable'),
(53, '08:00:00', 'placed', 4, 10, NULL, '2024-12-26 06:08:45', '2024-12-26 06:08:58', 'not_applicable'),
(54, '08:00:00', 'placed', 5, 10, NULL, '2024-12-26 06:37:00', '2024-12-26 06:37:08', 'not_applicable'),
(55, '07:00:00', 'placed', 5, 10, NULL, '2024-12-26 06:38:07', '2024-12-26 06:38:29', 'not_applicable'),
(56, '11:00:00', 'placed', 4, 10, NULL, '2024-12-26 09:04:07', '2024-12-26 09:04:12', 'not_applicable'),
(57, '07:00:00', 'placed', 5, 10, NULL, '2024-12-26 13:10:36', '2024-12-26 13:10:45', 'not_applicable'),
(58, '08:00:00', 'pending', 4, 10, NULL, '2024-12-27 08:06:48', '2024-12-27 08:06:48', 'not_applicable'),
(59, '07:00:00', 'pending', 4, 10, NULL, '2024-12-27 08:53:03', '2024-12-27 08:53:03', 'not_applicable'),
(60, '07:00:00', 'pending', 4, 10, NULL, '2024-12-27 08:53:17', '2024-12-27 08:53:17', 'not_applicable'),
(61, '07:00:00', 'pending', 4, 10, NULL, '2024-12-27 08:54:56', '2024-12-27 08:54:56', 'not_applicable'),
(62, '07:00:00', 'pending', 4, 10, NULL, '2024-12-27 08:55:14', '2024-12-27 08:55:14', 'not_applicable'),
(63, '07:00:00', 'pending', 4, 10, NULL, '2024-12-27 08:55:35', '2024-12-27 08:55:35', 'not_applicable'),
(64, '07:00:00', 'pending', 4, 10, NULL, '2024-12-27 08:57:18', '2024-12-27 08:57:18', 'not_applicable'),
(65, '07:00:00', 'pending', 4, 10, NULL, '2024-12-27 08:59:22', '2024-12-27 08:59:22', 'not_applicable'),
(66, '07:00:00', 'pending', 4, 10, NULL, '2024-12-27 09:00:18', '2024-12-27 09:00:18', 'not_applicable'),
(67, '07:00:00', 'pending', 6, 10, NULL, '2024-12-27 09:01:09', '2024-12-27 09:01:09', 'not_applicable'),
(68, '07:00:00', 'pending', 6, 10, NULL, '2024-12-27 09:28:58', '2024-12-27 09:28:58', 'not_applicable'),
(69, '07:00:00', 'pending', 6, 10, NULL, '2024-12-27 09:31:46', '2024-12-27 09:31:46', 'not_applicable'),
(70, '07:00:00', 'pending', 6, 10, NULL, '2024-12-27 09:32:23', '2024-12-27 09:32:23', 'not_applicable'),
(71, '07:00:00', 'placed', 6, 10, NULL, '2024-12-27 09:34:41', '2025-01-04 21:18:10', 'not_applicable'),
(72, '07:00:00', 'pending', 6, 10, NULL, '2024-12-27 09:36:12', '2024-12-27 09:36:12', 'not_applicable'),
(73, '07:00:00', 'placed', 6, 10, NULL, '2024-12-27 09:37:48', '2024-12-27 09:37:57', 'not_applicable'),
(74, '07:00:00', 'pending', 6, 10, NULL, '2024-12-27 09:39:29', '2024-12-27 09:39:29', 'not_applicable'),
(75, '07:00:00', 'placed', 6, 10, NULL, '2024-12-27 09:39:38', '2024-12-27 09:39:52', 'not_applicable'),
(76, '10:00:00', 'placed', 5, 10, NULL, '2024-12-27 09:41:17', '2024-12-27 09:41:24', 'not_applicable'),
(77, '07:00:00', 'placed', 2, 10, NULL, '2024-12-27 17:52:53', '2024-12-27 17:52:57', 'not_applicable'),
(78, '09:00:00', 'placed', 3, 10, NULL, '2024-12-27 18:12:46', '2024-12-27 18:12:51', 'not_applicable'),
(79, '07:00:00', 'pending', 2, 10, NULL, '2024-12-28 11:53:36', '2024-12-28 11:53:36', 'not_applicable'),
(80, '07:00:00', 'placed', 1, 10, NULL, '2024-12-28 11:55:20', '2024-12-28 11:55:30', 'not_applicable'),
(81, '07:00:00', 'placed', 3, 10, 27, '2024-12-28 15:32:08', '2024-12-28 15:58:09', 'not_applicable'),
(82, '07:00:00', 'placed', 3, 10, 30, '2024-12-28 15:59:35', '2024-12-28 16:02:19', 'not_applicable'),
(83, '09:00:00', 'placed', 1, 10, 31, '2024-12-28 16:21:59', '2024-12-28 16:22:33', 'not_applicable'),
(84, '07:00:00', 'placed', 2, 10, 32, '2024-12-30 12:52:08', '2024-12-30 12:52:14', 'not_applicable'),
(85, '07:00:00', 'placed', 2, 10, 33, '2024-12-30 12:59:31', '2024-12-30 12:59:36', 'not_applicable'),
(86, '07:00:00', 'placed', 2, 10, 34, '2024-12-30 19:08:17', '2024-12-30 19:08:24', 'not_applicable'),
(87, '07:00:00', 'cancelled', 1, 10, 35, '2024-12-30 19:13:54', '2025-01-03 19:15:25', 'not_applicable'),
(88, '07:00:00', 'placed', 2, 10, 36, '2024-12-30 19:17:51', '2024-12-30 19:17:54', 'not_applicable'),
(89, '07:00:00', 'placed', 2, 10, 37, '2024-12-30 19:40:00', '2024-12-30 19:40:07', 'not_applicable'),
(90, '07:00:00', 'placed', 2, 10, 38, '2025-01-02 06:06:00', '2025-01-02 06:06:41', 'not_applicable'),
(91, '08:00:00', 'placed', 2, 10, 39, '2025-01-03 10:59:02', '2025-01-03 10:59:14', 'not_applicable'),
(92, '09:00:00', 'cancelled', 2, 10, 40, '2025-01-03 18:37:29', '2025-01-03 20:36:54', 'pending'),
(93, '10:00:00', 'cancelled', 1, 32, 41, '2025-01-03 19:21:29', '2025-01-04 19:46:06', 'pending'),
(94, '07:00:00', 'cancelled', 2, 10, 42, '2025-01-04 19:15:56', '2025-01-04 19:42:16', 'pending'),
(95, '09:00:00', 'cancelled', 7, 32, 43, '2025-01-04 20:04:09', '2025-01-04 20:04:51', 'pending'),
(96, '07:00:00', 'placed', 8, 32, NULL, '2025-01-04 20:07:24', '2025-01-04 21:17:56', 'completed'),
(97, '09:00:00', 'cancelled', 8, 32, 44, '2025-01-04 20:09:26', '2025-01-04 20:12:55', 'pending'),
(98, '08:00:00', 'placed', 7, 32, 45, '2025-01-04 20:15:20', '2025-01-04 20:15:28', 'not_applicable');

-- --------------------------------------------------------

--
-- Table structure for table `order_days`
--

CREATE TABLE `order_days` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `day_number` smallint(6) NOT NULL,
  `date` date NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_days`
--

INSERT INTO `order_days` (`id`, `day_number`, `date`, `order_id`, `created_at`, `updated_at`) VALUES
(43, 1, '2025-01-11', 37, '2024-12-22 12:32:41', '2024-12-22 12:32:41'),
(44, 1, '2024-12-24', 38, '2024-12-22 12:55:37', '2024-12-22 12:55:37'),
(45, 2, '2024-12-11', 38, '2024-12-22 12:55:37', '2024-12-22 12:55:37'),
(46, 1, '2025-01-01', 39, '2024-12-22 13:37:44', '2024-12-22 13:37:44'),
(47, 2, '2024-12-21', 39, '2024-12-22 13:37:44', '2024-12-22 13:37:44'),
(48, 3, '2024-12-25', 39, '2024-12-22 13:37:44', '2024-12-22 13:37:44'),
(49, 1, '2024-12-25', 40, '2024-12-22 14:51:26', '2024-12-22 14:51:26'),
(50, 2, '2024-12-25', 40, '2024-12-22 14:51:26', '2024-12-22 14:51:26'),
(51, 1, '2024-12-17', 41, '2024-12-23 11:57:39', '2024-12-23 11:57:39'),
(52, 1, '2024-12-30', 42, '2024-12-23 14:28:21', '2024-12-23 14:28:21'),
(53, 2, '2024-12-31', 42, '2024-12-23 14:28:21', '2024-12-23 14:28:21'),
(54, 3, '2025-01-01', 42, '2024-12-23 14:28:21', '2024-12-23 14:28:21'),
(55, 4, '2025-01-02', 42, '2024-12-23 14:28:21', '2024-12-23 14:28:21'),
(56, 5, '2025-01-03', 42, '2024-12-23 14:28:21', '2024-12-23 14:28:21'),
(57, 6, '2025-01-04', 42, '2024-12-23 14:28:21', '2024-12-23 14:28:21'),
(72, 1, '2024-12-31', 52, '2024-12-25 16:04:50', '2024-12-25 16:04:50'),
(73, 2, '2025-01-01', 52, '2024-12-25 16:04:50', '2024-12-25 16:04:50'),
(74, 3, '2025-01-03', 52, '2024-12-25 16:04:50', '2024-12-25 16:04:50'),
(75, 1, '2024-12-20', 53, '2024-12-26 06:08:45', '2024-12-26 06:08:45'),
(76, 2, '2024-12-28', 53, '2024-12-26 06:08:45', '2024-12-26 06:08:45'),
(77, 3, '2024-12-28', 53, '2024-12-26 06:08:45', '2024-12-26 06:08:45'),
(78, 1, '2024-12-31', 54, '2024-12-26 06:37:00', '2024-12-26 06:37:00'),
(79, 2, '2025-01-01', 54, '2024-12-26 06:37:00', '2024-12-26 06:37:00'),
(80, 3, '2025-01-03', 54, '2024-12-26 06:37:00', '2024-12-26 06:37:00'),
(81, 1, '2024-12-31', 55, '2024-12-26 06:38:07', '2024-12-26 06:38:07'),
(82, 2, '2025-01-01', 55, '2024-12-26 06:38:07', '2024-12-26 06:38:07'),
(83, 3, '2025-01-02', 55, '2024-12-26 06:38:07', '2024-12-26 06:38:07'),
(84, 4, '2025-01-03', 55, '2024-12-26 06:38:07', '2024-12-26 06:38:07'),
(85, 1, '2024-12-31', 56, '2024-12-26 09:04:07', '2024-12-26 09:04:07'),
(86, 2, '2025-01-02', 56, '2024-12-26 09:04:07', '2024-12-26 09:04:07'),
(87, 3, '2025-01-03', 56, '2024-12-26 09:04:07', '2024-12-26 09:04:07'),
(88, 1, '2025-01-03', 57, '2024-12-26 13:10:36', '2024-12-26 13:10:36'),
(89, 2, '2025-01-04', 57, '2024-12-26 13:10:36', '2024-12-26 13:10:36'),
(90, 3, '2025-01-05', 57, '2024-12-26 13:10:36', '2024-12-26 13:10:36'),
(91, 1, '2024-12-31', 58, '2024-12-27 08:06:49', '2024-12-27 08:06:49'),
(92, 2, '2025-01-01', 58, '2024-12-27 08:06:49', '2024-12-27 08:06:49'),
(93, 3, '2025-01-03', 58, '2024-12-27 08:06:49', '2024-12-27 08:06:49'),
(94, 1, '2024-12-31', 59, '2024-12-27 08:53:03', '2024-12-27 08:53:03'),
(95, 2, '2025-01-01', 59, '2024-12-27 08:53:03', '2024-12-27 08:53:03'),
(96, 3, '2025-01-03', 59, '2024-12-27 08:53:03', '2024-12-27 08:53:03'),
(97, 1, '2024-12-31', 60, '2024-12-27 08:53:17', '2024-12-27 08:53:17'),
(98, 2, '2025-01-01', 60, '2024-12-27 08:53:17', '2024-12-27 08:53:17'),
(99, 3, '2025-01-03', 60, '2024-12-27 08:53:17', '2024-12-27 08:53:17'),
(100, 1, '2024-12-31', 61, '2024-12-27 08:54:56', '2024-12-27 08:54:56'),
(101, 2, '2025-01-01', 61, '2024-12-27 08:54:56', '2024-12-27 08:54:56'),
(102, 3, '2025-01-03', 61, '2024-12-27 08:54:56', '2024-12-27 08:54:56'),
(103, 1, '2024-12-31', 62, '2024-12-27 08:55:14', '2024-12-27 08:55:14'),
(104, 2, '2025-01-01', 62, '2024-12-27 08:55:14', '2024-12-27 08:55:14'),
(105, 3, '2025-01-03', 62, '2024-12-27 08:55:14', '2024-12-27 08:55:14'),
(106, 1, '2024-12-31', 63, '2024-12-27 08:55:35', '2024-12-27 08:55:35'),
(107, 2, '2025-01-01', 63, '2024-12-27 08:55:35', '2024-12-27 08:55:35'),
(108, 3, '2025-01-03', 63, '2024-12-27 08:55:35', '2024-12-27 08:55:35'),
(109, 1, '2024-12-31', 64, '2024-12-27 08:57:18', '2024-12-27 08:57:18'),
(110, 2, '2025-01-01', 64, '2024-12-27 08:57:18', '2024-12-27 08:57:18'),
(111, 3, '2025-01-03', 64, '2024-12-27 08:57:18', '2024-12-27 08:57:18'),
(112, 1, '2024-12-31', 65, '2024-12-27 08:59:22', '2024-12-27 08:59:22'),
(113, 2, '2025-01-01', 65, '2024-12-27 08:59:22', '2024-12-27 08:59:22'),
(114, 3, '2025-01-03', 65, '2024-12-27 08:59:22', '2024-12-27 08:59:22'),
(115, 1, '2024-12-31', 66, '2024-12-27 09:00:18', '2024-12-27 09:00:18'),
(116, 2, '2025-01-01', 66, '2024-12-27 09:00:18', '2024-12-27 09:00:18'),
(117, 3, '2025-01-03', 66, '2024-12-27 09:00:18', '2024-12-27 09:00:18'),
(118, 1, '2025-01-01', 67, '2024-12-27 09:01:09', '2024-12-27 09:01:09'),
(119, 2, '2025-01-02', 67, '2024-12-27 09:01:09', '2024-12-27 09:01:09'),
(120, 3, '2025-01-03', 67, '2024-12-27 09:01:09', '2024-12-27 09:01:09'),
(121, 1, '2024-12-31', 68, '2024-12-27 09:28:58', '2024-12-27 09:28:58'),
(122, 2, '2025-01-02', 68, '2024-12-27 09:28:58', '2024-12-27 09:28:58'),
(123, 3, '2025-01-04', 68, '2024-12-27 09:28:58', '2024-12-27 09:28:58'),
(124, 1, '2024-12-31', 69, '2024-12-27 09:31:46', '2024-12-27 09:31:46'),
(125, 2, '2025-01-02', 69, '2024-12-27 09:31:46', '2024-12-27 09:31:46'),
(126, 3, '2025-01-04', 69, '2024-12-27 09:31:46', '2024-12-27 09:31:46'),
(127, 1, '2024-12-31', 70, '2024-12-27 09:32:23', '2024-12-27 09:32:23'),
(128, 2, '2025-01-02', 70, '2024-12-27 09:32:23', '2024-12-27 09:32:23'),
(129, 3, '2025-01-04', 70, '2024-12-27 09:32:23', '2024-12-27 09:32:23'),
(130, 1, '2024-12-31', 71, '2024-12-27 09:34:41', '2024-12-27 09:34:41'),
(131, 2, '2025-01-02', 71, '2024-12-27 09:34:41', '2024-12-27 09:34:41'),
(132, 3, '2025-01-04', 71, '2024-12-27 09:34:41', '2024-12-27 09:34:41'),
(133, 1, '2025-01-01', 72, '2024-12-27 09:36:12', '2024-12-27 09:36:12'),
(134, 2, '2025-01-03', 72, '2024-12-27 09:36:12', '2024-12-27 09:36:12'),
(135, 3, '2025-01-04', 72, '2024-12-27 09:36:12', '2024-12-27 09:36:12'),
(136, 1, '2025-01-01', 73, '2024-12-27 09:37:48', '2024-12-27 09:37:48'),
(137, 2, '2025-01-03', 73, '2024-12-27 09:37:48', '2024-12-27 09:37:48'),
(138, 3, '2025-01-04', 73, '2024-12-27 09:37:48', '2024-12-27 09:37:48'),
(139, 1, '2025-01-01', 74, '2024-12-27 09:39:29', '2024-12-27 09:39:29'),
(140, 2, '2025-01-03', 74, '2024-12-27 09:39:29', '2024-12-27 09:39:29'),
(141, 3, '2025-01-04', 74, '2024-12-27 09:39:29', '2024-12-27 09:39:29'),
(142, 1, '2025-01-01', 75, '2024-12-27 09:39:38', '2024-12-27 09:39:38'),
(143, 2, '2025-01-03', 75, '2024-12-27 09:39:38', '2024-12-27 09:39:38'),
(144, 3, '2025-01-04', 75, '2024-12-27 09:39:38', '2024-12-27 09:39:38'),
(145, 1, '2024-12-31', 76, '2024-12-27 09:41:17', '2024-12-27 09:41:17'),
(146, 2, '2025-01-02', 76, '2024-12-27 09:41:17', '2024-12-27 09:41:17'),
(147, 3, '2025-01-04', 76, '2024-12-27 09:41:17', '2024-12-27 09:41:17'),
(148, 1, '2024-12-31', 77, '2024-12-27 17:52:53', '2024-12-27 17:52:53'),
(149, 2, '2025-01-02', 77, '2024-12-27 17:52:53', '2024-12-27 17:52:53'),
(150, 3, '2025-01-03', 77, '2024-12-27 17:52:53', '2024-12-27 17:52:53'),
(151, 1, '2024-12-30', 78, '2024-12-27 18:12:46', '2024-12-27 18:12:46'),
(152, 2, '2024-12-31', 78, '2024-12-27 18:12:46', '2024-12-27 18:12:46'),
(153, 3, '2025-01-01', 78, '2024-12-27 18:12:46', '2024-12-27 18:12:46'),
(154, 4, '2025-01-04', 78, '2024-12-27 18:12:46', '2024-12-27 18:12:46'),
(155, 5, '2025-01-05', 78, '2024-12-27 18:12:46', '2024-12-27 18:12:46'),
(156, 6, '2025-01-05', 78, '2024-12-27 18:12:46', '2024-12-27 18:12:46'),
(157, 1, '2024-12-31', 79, '2024-12-28 11:53:37', '2024-12-28 11:53:37'),
(158, 2, '2025-01-02', 79, '2024-12-28 11:53:37', '2024-12-28 11:53:37'),
(159, 3, '2025-01-03', 79, '2024-12-28 11:53:37', '2024-12-28 11:53:37'),
(160, 1, '2024-12-31', 80, '2024-12-28 11:55:20', '2024-12-28 11:55:20'),
(161, 2, '2025-01-01', 80, '2024-12-28 11:55:20', '2024-12-28 11:55:20'),
(162, 3, '2025-01-02', 80, '2024-12-28 11:55:20', '2024-12-28 11:55:20'),
(163, 1, '2024-12-31', 81, '2024-12-28 15:32:08', '2024-12-28 15:32:08'),
(164, 2, '2025-01-01', 81, '2024-12-28 15:32:08', '2024-12-28 15:32:08'),
(165, 3, '2025-01-02', 81, '2024-12-28 15:32:08', '2024-12-28 15:32:08'),
(166, 1, '2024-12-30', 82, '2024-12-28 15:59:35', '2024-12-28 15:59:35'),
(167, 2, '2024-12-31', 82, '2024-12-28 15:59:36', '2024-12-28 15:59:36'),
(168, 3, '2025-01-02', 82, '2024-12-28 15:59:36', '2024-12-28 15:59:36'),
(169, 4, '2025-01-03', 82, '2024-12-28 15:59:36', '2024-12-28 15:59:36'),
(170, 1, '2024-12-30', 83, '2024-12-28 16:21:59', '2024-12-28 16:21:59'),
(171, 2, '2024-12-31', 83, '2024-12-28 16:21:59', '2024-12-28 16:21:59'),
(172, 3, '2025-01-01', 83, '2024-12-28 16:22:00', '2024-12-28 16:22:00'),
(173, 4, '2025-01-02', 83, '2024-12-28 16:22:00', '2024-12-28 16:22:00'),
(174, 5, '2025-01-03', 83, '2024-12-28 16:22:00', '2024-12-28 16:22:00'),
(175, 6, '2025-01-04', 83, '2024-12-28 16:22:00', '2024-12-28 16:22:00'),
(176, 7, '2025-01-05', 83, '2024-12-28 16:22:00', '2024-12-28 16:22:00'),
(177, 1, '2025-01-08', 84, '2024-12-30 12:52:08', '2024-12-30 12:52:08'),
(178, 2, '2025-01-09', 84, '2024-12-30 12:52:08', '2024-12-30 12:52:08'),
(179, 3, '2025-01-10', 84, '2024-12-30 12:52:08', '2024-12-30 12:52:08'),
(180, 1, '2025-01-09', 85, '2024-12-30 12:59:31', '2024-12-30 12:59:31'),
(181, 2, '2025-01-10', 85, '2024-12-30 12:59:31', '2024-12-30 12:59:31'),
(182, 3, '2025-01-12', 85, '2024-12-30 12:59:31', '2024-12-30 12:59:31'),
(183, 1, '2025-01-10', 86, '2024-12-30 19:08:17', '2024-12-30 19:08:17'),
(184, 2, '2025-01-11', 86, '2024-12-30 19:08:17', '2024-12-30 19:08:17'),
(185, 3, '2025-01-12', 86, '2024-12-30 19:08:17', '2024-12-30 19:08:17'),
(186, 1, '2025-01-07', 87, '2024-12-30 19:13:54', '2024-12-30 19:13:54'),
(187, 2, '2025-01-08', 87, '2024-12-30 19:13:54', '2024-12-30 19:13:54'),
(188, 3, '2025-01-09', 87, '2024-12-30 19:13:54', '2024-12-30 19:13:54'),
(189, 1, '2025-01-08', 88, '2024-12-30 19:17:51', '2024-12-30 19:17:51'),
(190, 2, '2025-01-09', 88, '2024-12-30 19:17:51', '2024-12-30 19:17:51'),
(191, 3, '2025-01-10', 88, '2024-12-30 19:17:51', '2024-12-30 19:17:51'),
(192, 1, '2025-01-08', 89, '2024-12-30 19:40:00', '2024-12-30 19:40:00'),
(193, 2, '2025-01-10', 89, '2024-12-30 19:40:00', '2024-12-30 19:40:00'),
(194, 3, '2025-01-11', 89, '2024-12-30 19:40:00', '2024-12-30 19:40:00'),
(195, 1, '2025-01-07', 90, '2025-01-02 06:06:00', '2025-01-02 06:06:00'),
(196, 2, '2025-01-09', 90, '2025-01-02 06:06:00', '2025-01-02 06:06:00'),
(197, 3, '2025-01-10', 90, '2025-01-02 06:06:00', '2025-01-02 06:06:00'),
(198, 1, '2025-01-07', 91, '2025-01-03 10:59:02', '2025-01-03 10:59:02'),
(199, 2, '2025-01-09', 91, '2025-01-03 10:59:02', '2025-01-03 10:59:02'),
(200, 3, '2025-01-10', 91, '2025-01-03 10:59:02', '2025-01-03 10:59:02'),
(201, 1, '2025-01-09', 92, '2025-01-03 18:37:29', '2025-01-03 18:37:29'),
(202, 2, '2025-01-11', 92, '2025-01-03 18:37:29', '2025-01-03 18:37:29'),
(203, 3, '2025-01-12', 92, '2025-01-03 18:37:29', '2025-01-03 18:37:29'),
(204, 1, '2025-01-08', 93, '2025-01-03 19:21:29', '2025-01-03 19:21:29'),
(205, 2, '2025-01-09', 93, '2025-01-03 19:21:30', '2025-01-03 19:21:30'),
(206, 3, '2025-01-09', 93, '2025-01-03 19:21:30', '2025-01-03 19:21:30'),
(207, 1, '2025-01-08', 94, '2025-01-04 19:15:56', '2025-01-04 19:15:56'),
(208, 2, '2025-01-10', 94, '2025-01-04 19:15:56', '2025-01-04 19:15:56'),
(209, 3, '2025-01-11', 94, '2025-01-04 19:15:56', '2025-01-04 19:15:56'),
(210, 1, '2025-01-07', 95, '2025-01-04 20:04:09', '2025-01-04 20:04:09'),
(211, 2, '2025-01-08', 95, '2025-01-04 20:04:09', '2025-01-04 20:04:09'),
(212, 3, '2025-01-09', 95, '2025-01-04 20:04:09', '2025-01-04 20:04:09'),
(213, 1, '2025-01-08', 96, '2025-01-04 20:07:24', '2025-01-04 20:07:24'),
(214, 2, '2025-01-09', 96, '2025-01-04 20:07:24', '2025-01-04 20:07:24'),
(215, 3, '2025-01-10', 96, '2025-01-04 20:07:24', '2025-01-04 20:07:24'),
(216, 1, '2025-01-07', 97, '2025-01-04 20:09:26', '2025-01-04 20:09:26'),
(217, 2, '2025-01-09', 97, '2025-01-04 20:09:26', '2025-01-04 20:09:26'),
(218, 3, '2025-01-10', 97, '2025-01-04 20:09:26', '2025-01-04 20:09:26'),
(219, 1, '2025-01-09', 98, '2025-01-04 20:15:20', '2025-01-04 20:15:20'),
(220, 2, '2025-01-11', 98, '2025-01-04 20:15:20', '2025-01-04 20:15:20'),
(221, 3, '2025-01-12', 98, '2025-01-04 20:15:20', '2025-01-04 20:15:20');

-- --------------------------------------------------------

--
-- Table structure for table `order_day_meals`
--

CREATE TABLE `order_day_meals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_day_id` bigint(20) UNSIGNED NOT NULL,
  `meal_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_day_meals`
--

INSERT INTO `order_day_meals` (`id`, `order_day_id`, `meal_id`, `created_at`, `updated_at`) VALUES
(97, 43, 51, '2024-12-22 12:32:41', '2024-12-22 12:32:41'),
(98, 43, 60, '2024-12-22 12:32:41', '2024-12-22 12:32:41'),
(99, 44, 52, '2024-12-22 12:55:37', '2024-12-22 12:55:37'),
(100, 44, 61, '2024-12-22 12:55:37', '2024-12-22 12:55:37'),
(101, 44, 71, '2024-12-22 12:55:37', '2024-12-22 12:55:37'),
(102, 45, 54, '2024-12-22 12:55:37', '2024-12-22 12:55:37'),
(103, 45, 66, '2024-12-22 12:55:37', '2024-12-22 12:55:37'),
(104, 45, 75, '2024-12-22 12:55:37', '2024-12-22 12:55:37'),
(105, 46, 60, '2024-12-22 13:37:44', '2024-12-22 13:37:44'),
(106, 46, 73, '2024-12-22 13:37:44', '2024-12-22 13:37:44'),
(107, 47, 63, '2024-12-22 13:37:44', '2024-12-22 13:37:44'),
(108, 47, 75, '2024-12-22 13:37:44', '2024-12-22 13:37:44'),
(109, 48, 68, '2024-12-22 13:37:44', '2024-12-22 13:37:44'),
(110, 48, 70, '2024-12-22 13:37:44', '2024-12-22 13:37:44'),
(111, 49, 56, '2024-12-22 14:51:26', '2024-12-22 14:51:26'),
(112, 49, 62, '2024-12-22 14:51:26', '2024-12-22 14:51:26'),
(113, 49, 73, '2024-12-22 14:51:26', '2024-12-22 14:51:26'),
(114, 50, 57, '2024-12-22 14:51:26', '2024-12-22 14:51:26'),
(115, 50, 63, '2024-12-22 14:51:26', '2024-12-22 14:51:26'),
(116, 50, 70, '2024-12-22 14:51:26', '2024-12-22 14:51:26'),
(117, 51, 51, '2024-12-23 11:57:39', '2024-12-23 11:57:39'),
(118, 51, 60, '2024-12-23 11:57:39', '2024-12-23 11:57:39'),
(119, 51, 73, '2024-12-23 11:57:39', '2024-12-23 11:57:39'),
(120, 52, 4, '2024-12-23 14:28:21', '2024-12-23 14:28:21'),
(121, 52, 14, '2024-12-23 14:28:21', '2024-12-23 14:28:21'),
(122, 52, 21, '2024-12-23 14:28:21', '2024-12-23 14:28:21'),
(123, 53, 10, '2024-12-23 14:28:21', '2024-12-23 14:28:21'),
(124, 53, 11, '2024-12-23 14:28:21', '2024-12-23 14:28:21'),
(125, 53, 27, '2024-12-23 14:28:21', '2024-12-23 14:28:21'),
(126, 54, 1, '2024-12-23 14:28:21', '2024-12-23 14:28:21'),
(127, 54, 18, '2024-12-23 14:28:21', '2024-12-23 14:28:21'),
(128, 54, 24, '2024-12-23 14:28:21', '2024-12-23 14:28:21'),
(129, 55, 10, '2024-12-23 14:28:21', '2024-12-23 14:28:21'),
(130, 55, 20, '2024-12-23 14:28:21', '2024-12-23 14:28:21'),
(131, 55, 28, '2024-12-23 14:28:21', '2024-12-23 14:28:21'),
(132, 56, 5, '2024-12-23 14:28:21', '2024-12-23 14:28:21'),
(133, 56, 19, '2024-12-23 14:28:21', '2024-12-23 14:28:21'),
(134, 56, 26, '2024-12-23 14:28:21', '2024-12-23 14:28:21'),
(135, 57, 4, '2024-12-23 14:28:21', '2024-12-23 14:28:21'),
(136, 57, 17, '2024-12-23 14:28:21', '2024-12-23 14:28:21'),
(137, 57, 23, '2024-12-23 14:28:21', '2024-12-23 14:28:21'),
(171, 72, 51, '2024-12-25 16:04:50', '2024-12-25 16:04:50'),
(172, 72, 60, '2024-12-25 16:04:50', '2024-12-25 16:04:50'),
(173, 72, 70, '2024-12-25 16:04:50', '2024-12-25 16:04:50'),
(174, 73, 51, '2024-12-25 16:04:50', '2024-12-25 16:04:50'),
(175, 73, 60, '2024-12-25 16:04:50', '2024-12-25 16:04:50'),
(176, 73, 72, '2024-12-25 16:04:50', '2024-12-25 16:04:50'),
(177, 74, 50, '2024-12-25 16:04:50', '2024-12-25 16:04:50'),
(178, 74, 60, '2024-12-25 16:04:50', '2024-12-25 16:04:50'),
(179, 74, 73, '2024-12-25 16:04:50', '2024-12-25 16:04:50'),
(180, 75, 1, '2024-12-26 06:08:45', '2024-12-26 06:08:45'),
(181, 75, 19, '2024-12-26 06:08:45', '2024-12-26 06:08:45'),
(182, 75, 23, '2024-12-26 06:08:45', '2024-12-26 06:08:45'),
(183, 76, 2, '2024-12-26 06:08:45', '2024-12-26 06:08:45'),
(184, 76, 19, '2024-12-26 06:08:45', '2024-12-26 06:08:45'),
(185, 76, 23, '2024-12-26 06:08:45', '2024-12-26 06:08:45'),
(186, 77, 2, '2024-12-26 06:08:45', '2024-12-26 06:08:45'),
(187, 77, 19, '2024-12-26 06:08:45', '2024-12-26 06:08:45'),
(188, 77, 23, '2024-12-26 06:08:45', '2024-12-26 06:08:45'),
(189, 78, 6, '2024-12-26 06:37:00', '2024-12-26 06:37:00'),
(190, 78, 19, '2024-12-26 06:37:00', '2024-12-26 06:37:00'),
(191, 79, 2, '2024-12-26 06:37:00', '2024-12-26 06:37:00'),
(192, 79, 19, '2024-12-26 06:37:00', '2024-12-26 06:37:00'),
(193, 80, 2, '2024-12-26 06:37:00', '2024-12-26 06:37:00'),
(194, 80, 19, '2024-12-26 06:37:00', '2024-12-26 06:37:00'),
(195, 81, 3, '2024-12-26 06:38:07', '2024-12-26 06:38:07'),
(196, 81, 19, '2024-12-26 06:38:07', '2024-12-26 06:38:07'),
(197, 82, 1, '2024-12-26 06:38:07', '2024-12-26 06:38:07'),
(198, 82, 19, '2024-12-26 06:38:07', '2024-12-26 06:38:07'),
(199, 83, 4, '2024-12-26 06:38:07', '2024-12-26 06:38:07'),
(200, 83, 19, '2024-12-26 06:38:07', '2024-12-26 06:38:07'),
(201, 84, 3, '2024-12-26 06:38:07', '2024-12-26 06:38:07'),
(202, 84, 19, '2024-12-26 06:38:07', '2024-12-26 06:38:07'),
(203, 85, 1, '2024-12-26 09:04:07', '2024-12-26 09:04:07'),
(204, 85, 19, '2024-12-26 09:04:07', '2024-12-26 09:04:07'),
(205, 85, 22, '2024-12-26 09:04:07', '2024-12-26 09:04:07'),
(206, 86, 1, '2024-12-26 09:04:07', '2024-12-26 09:04:07'),
(207, 86, 19, '2024-12-26 09:04:07', '2024-12-26 09:04:07'),
(208, 86, 22, '2024-12-26 09:04:07', '2024-12-26 09:04:07'),
(209, 87, 1, '2024-12-26 09:04:07', '2024-12-26 09:04:07'),
(210, 87, 19, '2024-12-26 09:04:07', '2024-12-26 09:04:07'),
(211, 87, 22, '2024-12-26 09:04:07', '2024-12-26 09:04:07'),
(212, 88, 4, '2024-12-26 13:10:36', '2024-12-26 13:10:36'),
(213, 88, 84, '2024-12-26 13:10:36', '2024-12-26 13:10:36'),
(214, 89, 3, '2024-12-26 13:10:36', '2024-12-26 13:10:36'),
(215, 89, 83, '2024-12-26 13:10:36', '2024-12-26 13:10:36'),
(216, 90, 2, '2024-12-26 13:10:36', '2024-12-26 13:10:36'),
(217, 90, 82, '2024-12-26 13:10:36', '2024-12-26 13:10:36'),
(218, 91, 3, '2024-12-27 08:06:49', '2024-12-27 08:06:49'),
(219, 91, 16, '2024-12-27 08:06:49', '2024-12-27 08:06:49'),
(220, 91, 25, '2024-12-27 08:06:49', '2024-12-27 08:06:49'),
(221, 92, 5, '2024-12-27 08:06:49', '2024-12-27 08:06:49'),
(222, 92, 15, '2024-12-27 08:06:49', '2024-12-27 08:06:49'),
(223, 92, 24, '2024-12-27 08:06:49', '2024-12-27 08:06:49'),
(224, 93, 6, '2024-12-27 08:06:49', '2024-12-27 08:06:49'),
(225, 93, 16, '2024-12-27 08:06:49', '2024-12-27 08:06:49'),
(226, 93, 25, '2024-12-27 08:06:49', '2024-12-27 08:06:49'),
(227, 94, 3, '2024-12-27 08:53:03', '2024-12-27 08:53:03'),
(228, 94, 16, '2024-12-27 08:53:03', '2024-12-27 08:53:03'),
(229, 94, 25, '2024-12-27 08:53:03', '2024-12-27 08:53:03'),
(230, 95, 5, '2024-12-27 08:53:03', '2024-12-27 08:53:03'),
(231, 95, 15, '2024-12-27 08:53:03', '2024-12-27 08:53:03'),
(232, 95, 24, '2024-12-27 08:53:03', '2024-12-27 08:53:03'),
(233, 96, 6, '2024-12-27 08:53:03', '2024-12-27 08:53:03'),
(234, 96, 16, '2024-12-27 08:53:03', '2024-12-27 08:53:03'),
(235, 96, 25, '2024-12-27 08:53:03', '2024-12-27 08:53:03'),
(236, 97, 3, '2024-12-27 08:53:17', '2024-12-27 08:53:17'),
(237, 97, 16, '2024-12-27 08:53:17', '2024-12-27 08:53:17'),
(238, 97, 25, '2024-12-27 08:53:17', '2024-12-27 08:53:17'),
(239, 98, 5, '2024-12-27 08:53:17', '2024-12-27 08:53:17'),
(240, 98, 15, '2024-12-27 08:53:17', '2024-12-27 08:53:17'),
(241, 98, 24, '2024-12-27 08:53:17', '2024-12-27 08:53:17'),
(242, 99, 6, '2024-12-27 08:53:17', '2024-12-27 08:53:17'),
(243, 99, 16, '2024-12-27 08:53:17', '2024-12-27 08:53:17'),
(244, 99, 25, '2024-12-27 08:53:17', '2024-12-27 08:53:17'),
(245, 100, 3, '2024-12-27 08:54:56', '2024-12-27 08:54:56'),
(246, 100, 16, '2024-12-27 08:54:56', '2024-12-27 08:54:56'),
(247, 100, 25, '2024-12-27 08:54:56', '2024-12-27 08:54:56'),
(248, 101, 5, '2024-12-27 08:54:56', '2024-12-27 08:54:56'),
(249, 101, 15, '2024-12-27 08:54:56', '2024-12-27 08:54:56'),
(250, 101, 24, '2024-12-27 08:54:56', '2024-12-27 08:54:56'),
(251, 102, 6, '2024-12-27 08:54:56', '2024-12-27 08:54:56'),
(252, 102, 16, '2024-12-27 08:54:56', '2024-12-27 08:54:56'),
(253, 102, 25, '2024-12-27 08:54:56', '2024-12-27 08:54:56'),
(254, 103, 3, '2024-12-27 08:55:14', '2024-12-27 08:55:14'),
(255, 103, 16, '2024-12-27 08:55:14', '2024-12-27 08:55:14'),
(256, 103, 25, '2024-12-27 08:55:14', '2024-12-27 08:55:14'),
(257, 104, 5, '2024-12-27 08:55:14', '2024-12-27 08:55:14'),
(258, 104, 15, '2024-12-27 08:55:14', '2024-12-27 08:55:14'),
(259, 104, 24, '2024-12-27 08:55:14', '2024-12-27 08:55:14'),
(260, 105, 6, '2024-12-27 08:55:14', '2024-12-27 08:55:14'),
(261, 105, 16, '2024-12-27 08:55:14', '2024-12-27 08:55:14'),
(262, 105, 25, '2024-12-27 08:55:14', '2024-12-27 08:55:14'),
(263, 106, 3, '2024-12-27 08:55:35', '2024-12-27 08:55:35'),
(264, 106, 16, '2024-12-27 08:55:35', '2024-12-27 08:55:35'),
(265, 106, 25, '2024-12-27 08:55:35', '2024-12-27 08:55:35'),
(266, 107, 5, '2024-12-27 08:55:35', '2024-12-27 08:55:35'),
(267, 107, 15, '2024-12-27 08:55:35', '2024-12-27 08:55:35'),
(268, 107, 24, '2024-12-27 08:55:35', '2024-12-27 08:55:35'),
(269, 108, 6, '2024-12-27 08:55:35', '2024-12-27 08:55:35'),
(270, 108, 16, '2024-12-27 08:55:35', '2024-12-27 08:55:35'),
(271, 108, 25, '2024-12-27 08:55:35', '2024-12-27 08:55:35'),
(272, 109, 3, '2024-12-27 08:57:18', '2024-12-27 08:57:18'),
(273, 109, 16, '2024-12-27 08:57:18', '2024-12-27 08:57:18'),
(274, 109, 25, '2024-12-27 08:57:18', '2024-12-27 08:57:18'),
(275, 110, 5, '2024-12-27 08:57:18', '2024-12-27 08:57:18'),
(276, 110, 15, '2024-12-27 08:57:18', '2024-12-27 08:57:18'),
(277, 110, 24, '2024-12-27 08:57:18', '2024-12-27 08:57:18'),
(278, 111, 6, '2024-12-27 08:57:18', '2024-12-27 08:57:18'),
(279, 111, 16, '2024-12-27 08:57:18', '2024-12-27 08:57:18'),
(280, 111, 25, '2024-12-27 08:57:18', '2024-12-27 08:57:18'),
(281, 112, 3, '2024-12-27 08:59:22', '2024-12-27 08:59:22'),
(282, 112, 16, '2024-12-27 08:59:22', '2024-12-27 08:59:22'),
(283, 112, 25, '2024-12-27 08:59:22', '2024-12-27 08:59:22'),
(284, 113, 5, '2024-12-27 08:59:22', '2024-12-27 08:59:22'),
(285, 113, 15, '2024-12-27 08:59:22', '2024-12-27 08:59:22'),
(286, 113, 24, '2024-12-27 08:59:22', '2024-12-27 08:59:22'),
(287, 114, 6, '2024-12-27 08:59:22', '2024-12-27 08:59:22'),
(288, 114, 16, '2024-12-27 08:59:22', '2024-12-27 08:59:22'),
(289, 114, 25, '2024-12-27 08:59:22', '2024-12-27 08:59:22'),
(290, 115, 3, '2024-12-27 09:00:18', '2024-12-27 09:00:18'),
(291, 115, 16, '2024-12-27 09:00:18', '2024-12-27 09:00:18'),
(292, 115, 25, '2024-12-27 09:00:18', '2024-12-27 09:00:18'),
(293, 116, 5, '2024-12-27 09:00:18', '2024-12-27 09:00:18'),
(294, 116, 15, '2024-12-27 09:00:18', '2024-12-27 09:00:18'),
(295, 116, 24, '2024-12-27 09:00:18', '2024-12-27 09:00:18'),
(296, 117, 6, '2024-12-27 09:00:18', '2024-12-27 09:00:18'),
(297, 117, 16, '2024-12-27 09:00:18', '2024-12-27 09:00:18'),
(298, 117, 25, '2024-12-27 09:00:18', '2024-12-27 09:00:18'),
(299, 118, 16, '2024-12-27 09:01:09', '2024-12-27 09:01:09'),
(300, 118, 24, '2024-12-27 09:01:09', '2024-12-27 09:01:09'),
(301, 119, 17, '2024-12-27 09:01:09', '2024-12-27 09:01:09'),
(302, 119, 24, '2024-12-27 09:01:09', '2024-12-27 09:01:09'),
(303, 120, 16, '2024-12-27 09:01:09', '2024-12-27 09:01:09'),
(304, 120, 24, '2024-12-27 09:01:09', '2024-12-27 09:01:09'),
(305, 121, 17, '2024-12-27 09:28:58', '2024-12-27 09:28:58'),
(306, 121, 24, '2024-12-27 09:28:58', '2024-12-27 09:28:58'),
(307, 122, 16, '2024-12-27 09:28:58', '2024-12-27 09:28:58'),
(308, 122, 24, '2024-12-27 09:28:58', '2024-12-27 09:28:58'),
(309, 123, 16, '2024-12-27 09:28:58', '2024-12-27 09:28:58'),
(310, 123, 24, '2024-12-27 09:28:58', '2024-12-27 09:28:58'),
(311, 124, 17, '2024-12-27 09:31:46', '2024-12-27 09:31:46'),
(312, 124, 24, '2024-12-27 09:31:46', '2024-12-27 09:31:46'),
(313, 125, 16, '2024-12-27 09:31:46', '2024-12-27 09:31:46'),
(314, 125, 24, '2024-12-27 09:31:46', '2024-12-27 09:31:46'),
(315, 126, 16, '2024-12-27 09:31:46', '2024-12-27 09:31:46'),
(316, 126, 24, '2024-12-27 09:31:46', '2024-12-27 09:31:46'),
(317, 127, 17, '2024-12-27 09:32:23', '2024-12-27 09:32:23'),
(318, 127, 24, '2024-12-27 09:32:23', '2024-12-27 09:32:23'),
(319, 128, 16, '2024-12-27 09:32:23', '2024-12-27 09:32:23'),
(320, 128, 24, '2024-12-27 09:32:23', '2024-12-27 09:32:23'),
(321, 129, 16, '2024-12-27 09:32:23', '2024-12-27 09:32:23'),
(322, 129, 24, '2024-12-27 09:32:23', '2024-12-27 09:32:23'),
(323, 130, 17, '2024-12-27 09:34:41', '2024-12-27 09:34:41'),
(324, 130, 24, '2024-12-27 09:34:41', '2024-12-27 09:34:41'),
(325, 131, 16, '2024-12-27 09:34:41', '2024-12-27 09:34:41'),
(326, 131, 24, '2024-12-27 09:34:41', '2024-12-27 09:34:41'),
(327, 132, 16, '2024-12-27 09:34:41', '2024-12-27 09:34:41'),
(328, 132, 24, '2024-12-27 09:34:41', '2024-12-27 09:34:41'),
(329, 133, 17, '2024-12-27 09:36:12', '2024-12-27 09:36:12'),
(330, 133, 25, '2024-12-27 09:36:12', '2024-12-27 09:36:12'),
(331, 134, 17, '2024-12-27 09:36:12', '2024-12-27 09:36:12'),
(332, 134, 25, '2024-12-27 09:36:12', '2024-12-27 09:36:12'),
(333, 135, 18, '2024-12-27 09:36:12', '2024-12-27 09:36:12'),
(334, 135, 24, '2024-12-27 09:36:12', '2024-12-27 09:36:12'),
(335, 136, 17, '2024-12-27 09:37:48', '2024-12-27 09:37:48'),
(336, 136, 25, '2024-12-27 09:37:48', '2024-12-27 09:37:48'),
(337, 137, 17, '2024-12-27 09:37:48', '2024-12-27 09:37:48'),
(338, 137, 25, '2024-12-27 09:37:48', '2024-12-27 09:37:48'),
(339, 138, 18, '2024-12-27 09:37:48', '2024-12-27 09:37:48'),
(340, 138, 24, '2024-12-27 09:37:48', '2024-12-27 09:37:48'),
(341, 139, 17, '2024-12-27 09:39:29', '2024-12-27 09:39:29'),
(342, 139, 25, '2024-12-27 09:39:29', '2024-12-27 09:39:29'),
(343, 140, 17, '2024-12-27 09:39:29', '2024-12-27 09:39:29'),
(344, 140, 25, '2024-12-27 09:39:29', '2024-12-27 09:39:29'),
(345, 141, 18, '2024-12-27 09:39:29', '2024-12-27 09:39:29'),
(346, 141, 24, '2024-12-27 09:39:29', '2024-12-27 09:39:29'),
(347, 142, 17, '2024-12-27 09:39:38', '2024-12-27 09:39:38'),
(348, 142, 25, '2024-12-27 09:39:38', '2024-12-27 09:39:38'),
(349, 143, 17, '2024-12-27 09:39:38', '2024-12-27 09:39:38'),
(350, 143, 25, '2024-12-27 09:39:38', '2024-12-27 09:39:38'),
(351, 144, 18, '2024-12-27 09:39:38', '2024-12-27 09:39:38'),
(352, 144, 24, '2024-12-27 09:39:38', '2024-12-27 09:39:38'),
(353, 145, 3, '2024-12-27 09:41:17', '2024-12-27 09:41:17'),
(354, 145, 16, '2024-12-27 09:41:17', '2024-12-27 09:41:17'),
(355, 146, 3, '2024-12-27 09:41:17', '2024-12-27 09:41:17'),
(356, 146, 17, '2024-12-27 09:41:17', '2024-12-27 09:41:17'),
(357, 147, 3, '2024-12-27 09:41:17', '2024-12-27 09:41:17'),
(358, 147, 16, '2024-12-27 09:41:17', '2024-12-27 09:41:17'),
(359, 148, 51, '2024-12-27 17:52:53', '2024-12-27 17:52:53'),
(360, 148, 61, '2024-12-27 17:52:53', '2024-12-27 17:52:53'),
(361, 149, 52, '2024-12-27 17:52:53', '2024-12-27 17:52:53'),
(362, 149, 59, '2024-12-27 17:52:53', '2024-12-27 17:52:53'),
(363, 150, 53, '2024-12-27 17:52:53', '2024-12-27 17:52:53'),
(364, 150, 60, '2024-12-27 17:52:53', '2024-12-27 17:52:53'),
(365, 151, 65, '2024-12-27 18:12:46', '2024-12-27 18:12:46'),
(366, 151, 73, '2024-12-27 18:12:46', '2024-12-27 18:12:46'),
(367, 152, 62, '2024-12-27 18:12:46', '2024-12-27 18:12:46'),
(368, 152, 70, '2024-12-27 18:12:46', '2024-12-27 18:12:46'),
(369, 153, 61, '2024-12-27 18:12:46', '2024-12-27 18:12:46'),
(370, 153, 69, '2024-12-27 18:12:46', '2024-12-27 18:12:46'),
(371, 154, 61, '2024-12-27 18:12:46', '2024-12-27 18:12:46'),
(372, 154, 71, '2024-12-27 18:12:46', '2024-12-27 18:12:46'),
(373, 155, 62, '2024-12-27 18:12:46', '2024-12-27 18:12:46'),
(374, 155, 74, '2024-12-27 18:12:46', '2024-12-27 18:12:46'),
(375, 156, 61, '2024-12-27 18:12:46', '2024-12-27 18:12:46'),
(376, 156, 70, '2024-12-27 18:12:46', '2024-12-27 18:12:46'),
(377, 157, 51, '2024-12-28 11:53:37', '2024-12-28 11:53:37'),
(378, 157, 60, '2024-12-28 11:53:37', '2024-12-28 11:53:37'),
(379, 158, 52, '2024-12-28 11:53:37', '2024-12-28 11:53:37'),
(380, 158, 61, '2024-12-28 11:53:37', '2024-12-28 11:53:37'),
(381, 159, 52, '2024-12-28 11:53:37', '2024-12-28 11:53:37'),
(382, 159, 61, '2024-12-28 11:53:37', '2024-12-28 11:53:37'),
(383, 160, 52, '2024-12-28 11:55:20', '2024-12-28 11:55:20'),
(384, 160, 61, '2024-12-28 11:55:20', '2024-12-28 11:55:20'),
(385, 160, 71, '2024-12-28 11:55:20', '2024-12-28 11:55:20'),
(386, 161, 53, '2024-12-28 11:55:20', '2024-12-28 11:55:20'),
(387, 161, 62, '2024-12-28 11:55:20', '2024-12-28 11:55:20'),
(388, 161, 72, '2024-12-28 11:55:20', '2024-12-28 11:55:20'),
(389, 162, 50, '2024-12-28 11:55:20', '2024-12-28 11:55:20'),
(390, 162, 59, '2024-12-28 11:55:20', '2024-12-28 11:55:20'),
(391, 162, 69, '2024-12-28 11:55:20', '2024-12-28 11:55:20'),
(392, 163, 60, '2024-12-28 15:32:08', '2024-12-28 15:32:08'),
(393, 163, 71, '2024-12-28 15:32:08', '2024-12-28 15:32:08'),
(394, 164, 59, '2024-12-28 15:32:08', '2024-12-28 15:32:08'),
(395, 164, 69, '2024-12-28 15:32:08', '2024-12-28 15:32:08'),
(396, 165, 60, '2024-12-28 15:32:08', '2024-12-28 15:32:08'),
(397, 165, 70, '2024-12-28 15:32:08', '2024-12-28 15:32:08'),
(398, 166, 61, '2024-12-28 15:59:35', '2024-12-28 15:59:35'),
(399, 166, 70, '2024-12-28 15:59:36', '2024-12-28 15:59:36'),
(400, 167, 61, '2024-12-28 15:59:36', '2024-12-28 15:59:36'),
(401, 167, 70, '2024-12-28 15:59:36', '2024-12-28 15:59:36'),
(402, 168, 61, '2024-12-28 15:59:36', '2024-12-28 15:59:36'),
(403, 168, 70, '2024-12-28 15:59:36', '2024-12-28 15:59:36'),
(404, 169, 61, '2024-12-28 15:59:36', '2024-12-28 15:59:36'),
(405, 169, 69, '2024-12-28 15:59:36', '2024-12-28 15:59:36'),
(406, 170, 56, '2024-12-28 16:21:59', '2024-12-28 16:21:59'),
(407, 170, 60, '2024-12-28 16:21:59', '2024-12-28 16:21:59'),
(408, 170, 70, '2024-12-28 16:21:59', '2024-12-28 16:21:59'),
(409, 171, 52, '2024-12-28 16:21:59', '2024-12-28 16:21:59'),
(410, 171, 66, '2024-12-28 16:22:00', '2024-12-28 16:22:00'),
(411, 171, 72, '2024-12-28 16:22:00', '2024-12-28 16:22:00'),
(412, 172, 51, '2024-12-28 16:22:00', '2024-12-28 16:22:00'),
(413, 172, 68, '2024-12-28 16:22:00', '2024-12-28 16:22:00'),
(414, 172, 71, '2024-12-28 16:22:00', '2024-12-28 16:22:00'),
(415, 173, 53, '2024-12-28 16:22:00', '2024-12-28 16:22:00'),
(416, 173, 63, '2024-12-28 16:22:00', '2024-12-28 16:22:00'),
(417, 173, 73, '2024-12-28 16:22:00', '2024-12-28 16:22:00'),
(418, 174, 50, '2024-12-28 16:22:00', '2024-12-28 16:22:00'),
(419, 174, 66, '2024-12-28 16:22:00', '2024-12-28 16:22:00'),
(420, 174, 75, '2024-12-28 16:22:00', '2024-12-28 16:22:00'),
(421, 175, 52, '2024-12-28 16:22:00', '2024-12-28 16:22:00'),
(422, 175, 63, '2024-12-28 16:22:00', '2024-12-28 16:22:00'),
(423, 175, 71, '2024-12-28 16:22:00', '2024-12-28 16:22:00'),
(424, 176, 50, '2024-12-28 16:22:00', '2024-12-28 16:22:00'),
(425, 176, 65, '2024-12-28 16:22:00', '2024-12-28 16:22:00'),
(426, 176, 70, '2024-12-28 16:22:00', '2024-12-28 16:22:00'),
(427, 177, 51, '2024-12-30 12:52:08', '2024-12-30 12:52:08'),
(428, 177, 65, '2024-12-30 12:52:08', '2024-12-30 12:52:08'),
(429, 178, 51, '2024-12-30 12:52:08', '2024-12-30 12:52:08'),
(430, 178, 65, '2024-12-30 12:52:08', '2024-12-30 12:52:08'),
(431, 179, 52, '2024-12-30 12:52:08', '2024-12-30 12:52:08'),
(432, 179, 60, '2024-12-30 12:52:08', '2024-12-30 12:52:08'),
(433, 180, 52, '2024-12-30 12:59:31', '2024-12-30 12:59:31'),
(434, 180, 65, '2024-12-30 12:59:31', '2024-12-30 12:59:31'),
(435, 181, 51, '2024-12-30 12:59:31', '2024-12-30 12:59:31'),
(436, 181, 63, '2024-12-30 12:59:31', '2024-12-30 12:59:31'),
(437, 182, 50, '2024-12-30 12:59:31', '2024-12-30 12:59:31'),
(438, 182, 65, '2024-12-30 12:59:31', '2024-12-30 12:59:31'),
(439, 183, 50, '2024-12-30 19:08:17', '2024-12-30 19:08:17'),
(440, 183, 60, '2024-12-30 19:08:17', '2024-12-30 19:08:17'),
(441, 184, 50, '2024-12-30 19:08:17', '2024-12-30 19:08:17'),
(442, 184, 60, '2024-12-30 19:08:17', '2024-12-30 19:08:17'),
(443, 185, 50, '2024-12-30 19:08:17', '2024-12-30 19:08:17'),
(444, 185, 60, '2024-12-30 19:08:17', '2024-12-30 19:08:17'),
(445, 186, 51, '2024-12-30 19:13:54', '2024-12-30 19:13:54'),
(446, 186, 63, '2024-12-30 19:13:54', '2024-12-30 19:13:54'),
(447, 186, 70, '2024-12-30 19:13:54', '2024-12-30 19:13:54'),
(448, 187, 51, '2024-12-30 19:13:54', '2024-12-30 19:13:54'),
(449, 187, 63, '2024-12-30 19:13:54', '2024-12-30 19:13:54'),
(450, 187, 70, '2024-12-30 19:13:54', '2024-12-30 19:13:54'),
(451, 188, 51, '2024-12-30 19:13:54', '2024-12-30 19:13:54'),
(452, 188, 63, '2024-12-30 19:13:54', '2024-12-30 19:13:54'),
(453, 188, 70, '2024-12-30 19:13:54', '2024-12-30 19:13:54'),
(454, 189, 53, '2024-12-30 19:17:51', '2024-12-30 19:17:51'),
(455, 189, 66, '2024-12-30 19:17:51', '2024-12-30 19:17:51'),
(456, 190, 53, '2024-12-30 19:17:51', '2024-12-30 19:17:51'),
(457, 190, 66, '2024-12-30 19:17:51', '2024-12-30 19:17:51'),
(458, 191, 53, '2024-12-30 19:17:51', '2024-12-30 19:17:51'),
(459, 191, 66, '2024-12-30 19:17:51', '2024-12-30 19:17:51'),
(460, 192, 52, '2024-12-30 19:40:00', '2024-12-30 19:40:00'),
(461, 192, 65, '2024-12-30 19:40:00', '2024-12-30 19:40:00'),
(462, 193, 52, '2024-12-30 19:40:00', '2024-12-30 19:40:00'),
(463, 193, 65, '2024-12-30 19:40:00', '2024-12-30 19:40:00'),
(464, 194, 52, '2024-12-30 19:40:00', '2024-12-30 19:40:00'),
(465, 194, 65, '2024-12-30 19:40:00', '2024-12-30 19:40:00'),
(466, 195, 52, '2025-01-02 06:06:00', '2025-01-02 06:06:00'),
(467, 195, 65, '2025-01-02 06:06:00', '2025-01-02 06:06:00'),
(468, 196, 51, '2025-01-02 06:06:00', '2025-01-02 06:06:00'),
(469, 196, 63, '2025-01-02 06:06:00', '2025-01-02 06:06:00'),
(470, 197, 51, '2025-01-02 06:06:00', '2025-01-02 06:06:00'),
(471, 197, 63, '2025-01-02 06:06:00', '2025-01-02 06:06:00'),
(472, 198, 51, '2025-01-03 10:59:02', '2025-01-03 10:59:02'),
(473, 198, 63, '2025-01-03 10:59:02', '2025-01-03 10:59:02'),
(474, 198, 106, '2025-01-03 10:59:02', '2025-01-03 10:59:02'),
(475, 199, 52, '2025-01-03 10:59:02', '2025-01-03 10:59:02'),
(476, 199, 66, '2025-01-03 10:59:02', '2025-01-03 10:59:02'),
(477, 199, 110, '2025-01-03 10:59:02', '2025-01-03 10:59:02'),
(478, 200, 57, '2025-01-03 10:59:02', '2025-01-03 10:59:02'),
(479, 200, 68, '2025-01-03 10:59:02', '2025-01-03 10:59:02'),
(480, 200, 105, '2025-01-03 10:59:02', '2025-01-03 10:59:02'),
(481, 201, 51, '2025-01-03 18:37:29', '2025-01-03 18:37:29'),
(482, 201, 63, '2025-01-03 18:37:29', '2025-01-03 18:37:29'),
(483, 201, 107, '2025-01-03 18:37:29', '2025-01-03 18:37:29'),
(484, 202, 57, '2025-01-03 18:37:29', '2025-01-03 18:37:29'),
(485, 202, 60, '2025-01-03 18:37:29', '2025-01-03 18:37:29'),
(486, 202, 106, '2025-01-03 18:37:29', '2025-01-03 18:37:29'),
(487, 203, 50, '2025-01-03 18:37:29', '2025-01-03 18:37:29'),
(488, 203, 68, '2025-01-03 18:37:29', '2025-01-03 18:37:29'),
(489, 203, 110, '2025-01-03 18:37:29', '2025-01-03 18:37:29'),
(490, 204, 52, '2025-01-03 19:21:30', '2025-01-03 19:21:30'),
(491, 204, 61, '2025-01-03 19:21:30', '2025-01-03 19:21:30'),
(492, 204, 71, '2025-01-03 19:21:30', '2025-01-03 19:21:30'),
(493, 204, 106, '2025-01-03 19:21:30', '2025-01-03 19:21:30'),
(494, 205, 51, '2025-01-03 19:21:30', '2025-01-03 19:21:30'),
(495, 205, 60, '2025-01-03 19:21:30', '2025-01-03 19:21:30'),
(496, 205, 70, '2025-01-03 19:21:30', '2025-01-03 19:21:30'),
(497, 205, 105, '2025-01-03 19:21:30', '2025-01-03 19:21:30'),
(498, 206, 52, '2025-01-03 19:21:30', '2025-01-03 19:21:30'),
(499, 206, 61, '2025-01-03 19:21:30', '2025-01-03 19:21:30'),
(500, 206, 104, '2025-01-03 19:21:30', '2025-01-03 19:21:30'),
(501, 206, 110, '2025-01-03 19:21:30', '2025-01-03 19:21:30'),
(502, 207, 51, '2025-01-04 19:15:56', '2025-01-04 19:15:56'),
(503, 207, 63, '2025-01-04 19:15:56', '2025-01-04 19:15:56'),
(504, 207, 106, '2025-01-04 19:15:56', '2025-01-04 19:15:56'),
(505, 208, 52, '2025-01-04 19:15:56', '2025-01-04 19:15:56'),
(506, 208, 63, '2025-01-04 19:15:56', '2025-01-04 19:15:56'),
(507, 208, 108, '2025-01-04 19:15:56', '2025-01-04 19:15:56'),
(508, 209, 53, '2025-01-04 19:15:56', '2025-01-04 19:15:56'),
(509, 209, 66, '2025-01-04 19:15:56', '2025-01-04 19:15:56'),
(510, 209, 105, '2025-01-04 19:15:56', '2025-01-04 19:15:56'),
(511, 210, 31, '2025-01-04 20:04:09', '2025-01-04 20:04:09'),
(512, 210, 38, '2025-01-04 20:04:09', '2025-01-04 20:04:09'),
(513, 210, 45, '2025-01-04 20:04:09', '2025-01-04 20:04:09'),
(514, 210, 121, '2025-01-04 20:04:09', '2025-01-04 20:04:09'),
(515, 211, 92, '2025-01-04 20:04:09', '2025-01-04 20:04:09'),
(516, 211, 79, '2025-01-04 20:04:09', '2025-01-04 20:04:09'),
(517, 211, 43, '2025-01-04 20:04:09', '2025-01-04 20:04:09'),
(518, 211, 117, '2025-01-04 20:04:09', '2025-01-04 20:04:09'),
(519, 212, 30, '2025-01-04 20:04:09', '2025-01-04 20:04:09'),
(520, 212, 78, '2025-01-04 20:04:09', '2025-01-04 20:04:09'),
(521, 212, 45, '2025-01-04 20:04:09', '2025-01-04 20:04:09'),
(522, 212, 119, '2025-01-04 20:04:09', '2025-01-04 20:04:09'),
(523, 213, 29, '2025-01-04 20:07:24', '2025-01-04 20:07:24'),
(524, 213, 36, '2025-01-04 20:07:24', '2025-01-04 20:07:24'),
(525, 213, 115, '2025-01-04 20:07:24', '2025-01-04 20:07:24'),
(526, 214, 30, '2025-01-04 20:07:24', '2025-01-04 20:07:24'),
(527, 214, 37, '2025-01-04 20:07:24', '2025-01-04 20:07:24'),
(528, 214, 116, '2025-01-04 20:07:24', '2025-01-04 20:07:24'),
(529, 215, 31, '2025-01-04 20:07:24', '2025-01-04 20:07:24'),
(530, 215, 38, '2025-01-04 20:07:24', '2025-01-04 20:07:24'),
(531, 215, 117, '2025-01-04 20:07:24', '2025-01-04 20:07:24'),
(532, 216, 31, '2025-01-04 20:09:26', '2025-01-04 20:09:26'),
(533, 216, 38, '2025-01-04 20:09:26', '2025-01-04 20:09:26'),
(534, 216, 117, '2025-01-04 20:09:26', '2025-01-04 20:09:26'),
(535, 217, 31, '2025-01-04 20:09:26', '2025-01-04 20:09:26'),
(536, 217, 39, '2025-01-04 20:09:26', '2025-01-04 20:09:26'),
(537, 217, 118, '2025-01-04 20:09:26', '2025-01-04 20:09:26'),
(538, 218, 30, '2025-01-04 20:09:26', '2025-01-04 20:09:26'),
(539, 218, 37, '2025-01-04 20:09:26', '2025-01-04 20:09:26'),
(540, 218, 116, '2025-01-04 20:09:26', '2025-01-04 20:09:26'),
(541, 219, 34, '2025-01-04 20:15:20', '2025-01-04 20:15:20'),
(542, 219, 38, '2025-01-04 20:15:20', '2025-01-04 20:15:20'),
(543, 219, 44, '2025-01-04 20:15:20', '2025-01-04 20:15:20'),
(544, 219, 117, '2025-01-04 20:15:20', '2025-01-04 20:15:20'),
(545, 220, 35, '2025-01-04 20:15:20', '2025-01-04 20:15:20'),
(546, 220, 78, '2025-01-04 20:15:20', '2025-01-04 20:15:20'),
(547, 220, 45, '2025-01-04 20:15:20', '2025-01-04 20:15:20'),
(548, 220, 122, '2025-01-04 20:15:20', '2025-01-04 20:15:20'),
(549, 221, 89, '2025-01-04 20:15:20', '2025-01-04 20:15:20'),
(550, 221, 42, '2025-01-04 20:15:20', '2025-01-04 20:15:20'),
(551, 221, 45, '2025-01-04 20:15:20', '2025-01-04 20:15:20'),
(552, 221, 121, '2025-01-04 20:15:20', '2025-01-04 20:15:20');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `amount` decimal(8,2) NOT NULL,
  `payment_date` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `amount`, `payment_date`, `created_at`, `updated_at`) VALUES
(1, '14.00', '2024-12-26 00:00:00', '2024-12-20 16:07:06', '2024-12-20 16:07:06'),
(2, '11.00', '2024-12-25 00:00:00', '2024-12-21 13:58:34', '2024-12-21 13:58:34'),
(3, '12.50', '2025-01-01 00:00:00', '2024-12-22 12:13:15', '2024-12-22 12:13:15'),
(4, '25.00', '2024-12-09 00:00:00', '2024-12-22 12:55:45', '2024-12-22 12:55:45'),
(5, '30.00', '2024-12-05 00:00:00', '2024-12-22 13:37:53', '2024-12-22 13:37:53'),
(6, '25.00', '2024-12-09 00:00:00', '2024-12-22 14:51:35', '2024-12-22 14:51:35'),
(7, '12.50', '2024-12-23 00:00:00', '2024-12-23 12:00:05', '2024-12-23 12:00:05'),
(8, '84.00', '2024-12-23 00:00:00', '2024-12-23 14:28:46', '2024-12-23 14:28:46'),
(9, '22.00', '2024-12-24 00:00:00', '2024-12-24 08:27:05', '2024-12-24 08:27:05'),
(10, '14.00', '2024-12-24 00:00:00', '2024-12-24 08:31:09', '2024-12-24 08:31:09'),
(11, '14.00', '2024-12-24 00:00:00', '2024-12-24 08:55:37', '2024-12-24 08:55:37'),
(12, '33.00', '2024-12-25 00:00:00', '2024-12-25 07:00:16', '2024-12-25 07:00:16'),
(13, '37.50', '2024-12-25 00:00:00', '2024-12-25 08:04:52', '2024-12-25 08:04:52'),
(14, '37.50', '2024-12-25 00:00:00', '2024-12-25 16:05:07', '2024-12-25 16:05:07'),
(15, '42.00', '2024-12-26 00:00:00', '2024-12-26 06:08:57', '2024-12-26 06:08:57'),
(16, '33.00', '2024-12-26 00:00:00', '2024-12-26 06:37:08', '2024-12-26 06:37:08'),
(17, '44.00', '2024-12-26 00:00:00', '2024-12-26 06:38:29', '2024-12-26 06:38:29'),
(18, '42.00', '2024-12-26 00:00:00', '2024-12-26 09:04:12', '2024-12-26 09:04:12'),
(19, '33.00', '2024-12-26 00:00:00', '2024-12-26 13:10:45', '2024-12-26 13:10:45'),
(20, '36.00', '2024-12-27 00:00:00', '2024-12-27 09:37:57', '2024-12-27 09:37:57'),
(21, '36.00', '2024-12-27 00:00:00', '2024-12-27 09:39:52', '2024-12-27 09:39:52'),
(22, '33.00', '2024-12-27 00:00:00', '2024-12-27 09:41:24', '2024-12-27 09:41:24'),
(23, '27.00', '2024-12-27 00:00:00', '2024-12-27 17:52:57', '2024-12-27 17:52:57'),
(24, '60.00', '2024-12-27 00:00:00', '2024-12-27 18:12:51', '2024-12-27 18:12:51'),
(25, '37.50', '2024-12-28 00:00:00', '2024-12-28 11:55:30', '2024-12-28 11:55:30'),
(26, '35.00', '2024-12-28 00:00:00', '2024-12-28 15:34:45', '2024-12-28 15:34:45'),
(27, '40.00', '2024-12-28 00:00:00', '2024-12-28 15:58:09', '2024-12-28 15:58:09'),
(28, '50.00', '2024-12-28 00:00:00', '2024-12-28 15:59:46', '2024-12-28 15:59:46'),
(29, '50.00', '2024-12-28 00:00:00', '2024-12-28 16:00:46', '2024-12-28 16:00:46'),
(30, '45.00', '2024-12-28 00:00:00', '2024-12-28 16:02:19', '2024-12-28 16:02:19'),
(31, '92.50', '2024-12-28 00:00:00', '2024-12-28 16:22:33', '2024-12-28 16:22:33'),
(32, '27.00', '2024-12-30 00:00:00', '2024-12-30 12:52:14', '2024-12-30 12:52:14'),
(33, '27.00', '2024-12-30 00:00:00', '2024-12-30 12:59:36', '2024-12-30 12:59:36'),
(34, '32.00', '2024-12-30 00:00:00', '2024-12-30 19:08:24', '2024-12-30 19:08:24'),
(35, '42.50', '2024-12-30 00:00:00', '2024-12-30 19:14:01', '2024-12-30 19:14:01'),
(36, '27.00', '2024-12-30 00:00:00', '2024-12-30 19:17:54', '2024-12-30 19:17:54'),
(37, '32.00', '2024-12-30 00:00:00', '2024-12-30 19:40:07', '2024-12-30 19:40:07'),
(38, '27.00', '2025-01-02 00:00:00', '2025-01-02 06:06:41', '2025-01-02 06:06:41'),
(39, '44.00', '2025-01-03 00:00:00', '2025-01-03 10:59:14', '2025-01-03 10:59:14'),
(40, '44.00', '2025-01-03 00:00:00', '2025-01-03 18:37:52', '2025-01-03 18:37:52'),
(41, '62.00', '2025-01-03 00:00:00', '2025-01-03 19:21:36', '2025-01-03 19:21:36'),
(42, '44.00', '2025-01-04 00:00:00', '2025-01-04 19:16:06', '2025-01-04 19:16:06'),
(43, '86.00', '2025-01-04 00:00:00', '2025-01-04 20:04:19', '2025-01-04 20:04:19'),
(44, '62.00', '2025-01-04 00:00:00', '2025-01-04 20:09:41', '2025-01-04 20:09:41'),
(45, '81.00', '2025-01-04 00:00:00', '2025-01-04 20:15:28', '2025-01-04 20:15:28');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `plans`
--

CREATE TABLE `plans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `goal_id` bigint(20) UNSIGNED NOT NULL,
  `plan_type_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `availability` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `plans`
--

INSERT INTO `plans` (`id`, `description`, `price`, `goal_id`, `plan_type_id`, `created_at`, `updated_at`, `availability`) VALUES
(1, 'An Overall Health plan featuring 3 meals per day (Breakfast+Lunch+Dinner)', '19.00', 1, 12, '2024-12-01 13:56:41', '2025-01-03 10:50:31', 1),
(2, 'An Overall Health plan featuring 2 meals per day (Breakfast+Lunch)', '13.00', 1, 10, '2024-12-01 13:56:41', '2025-01-03 10:48:39', 1),
(3, 'An Overall Health plan featuring 2 main meals per day (Lunch+Dinner)', '14.00', 1, 11, '2024-12-01 13:56:41', '2025-01-03 10:49:38', 1),
(4, 'A Low Calorie plan featuring 3 meals per day (Breakfast+Lunch+Dinner)', '24.00', 2, 12, '2024-12-01 13:56:41', '2025-01-03 10:50:42', 1),
(5, 'A Low Calorie plan featuring 2 meals per day (Breakfast+Lunch)', '17.00', 2, 10, '2024-12-01 13:56:41', '2025-01-03 10:49:02', 1),
(6, 'A Low Calorie plan featuring 2 main meals per day (Lunch+Dinner)', '18.00', 2, 11, '2024-12-01 13:56:41', '2025-01-03 10:49:52', 1),
(7, 'A High Protein plan featuring 3 meals per day (Breakfast+Lunch+Dinner)', '27.00', 3, 12, '2024-12-01 13:56:41', '2025-01-03 10:50:51', 1),
(8, 'An High Protein  plan featuring 2 meals per day (Breakfast+Lunch)', '19.00', 3, 10, '2024-12-01 13:56:41', '2025-01-03 10:49:17', 1),
(9, 'A High Protein plan featuring 2 main meals per day (Lunch+Dinner)', '20.00', 3, 11, '2024-12-01 13:56:41', '2025-01-03 10:50:11', 1);

-- --------------------------------------------------------

--
-- Table structure for table `plan_types`
--

CREATE TABLE `plan_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `plan_types`
--

INSERT INTO `plan_types` (`id`, `description`, `name`, `image`, `created_at`, `updated_at`) VALUES
(10, 'Breakfast + Lunch + Snack', 'Half Day AM', 'am.png', '2024-12-29 09:57:51', '2024-12-29 09:57:51'),
(11, 'Lunch + Dinner + Snack', 'Half Day PM', 'pm.png', '2024-12-29 09:58:27', '2024-12-29 09:58:27'),
(12, 'Breakfast + Lunch + Dinner + Snack', 'Full Day', 'full.png', '2024-12-29 09:58:47', '2024-12-29 10:01:30');

-- --------------------------------------------------------

--
-- Table structure for table `plan_type_meals`
--

CREATE TABLE `plan_type_meals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `plan_type_id` bigint(20) UNSIGNED NOT NULL,
  `meal_type_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `plan_type_meals`
--

INSERT INTO `plan_type_meals` (`id`, `plan_type_id`, `meal_type_id`, `created_at`, `updated_at`) VALUES
(17, 10, 1, NULL, NULL),
(18, 10, 2, NULL, NULL),
(19, 10, 4, NULL, NULL),
(20, 11, 2, NULL, NULL),
(21, 11, 3, NULL, NULL),
(22, 11, 4, NULL, NULL),
(29, 12, 1, NULL, NULL),
(30, 12, 2, NULL, NULL),
(31, 12, 3, NULL, NULL),
(32, 12, 4, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `restrictions`
--

CREATE TABLE `restrictions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `restrictions`
--

INSERT INTO `restrictions` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Vegetarian', 'Excluding all types of meat.', '2024-12-01 13:19:35', '2024-12-01 13:19:35'),
(2, 'Lactose Free', 'Excluding all types of dairy products', '2024-12-01 13:19:35', '2024-12-01 13:19:35'),
(3, 'Gluten Free', 'Excluding all types', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'customer', '2024-11-23 09:26:58', '2024-11-23 09:26:58'),
(2, 'admin', '2024-11-23 09:26:58', '2024-11-23 09:26:58');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `goal_id` bigint(20) UNSIGNED DEFAULT NULL,
  `role_id` bigint(20) UNSIGNED DEFAULT NULL,
  `restriction_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `phone`, `address`, `address_details`, `goal_id`, `role_id`, `restriction_id`, `created_at`, `updated_at`) VALUES
(10, 'khaled Hayek', 'khaled@gmail.com', NULL, '$2y$10$0eoQfDKAALhNOt7908zO8OfEac9o2TTfMK.QBI.pycNJqEFM8ZfuO', NULL, '34/665432', 'Berqayel', 'Main Street, facing Akkar Plaza', 1, 1, 1, '2024-12-15 08:15:52', '2025-01-03 11:19:18'),
(30, 'Maryam Mouslimany', 'maryam@gmail.com', NULL, '$2y$10$8Pzpb22peamR5UtXYwYFkuv.d3uGO.RK9jCKncDwf3ZoNLWQU5Dwa', NULL, '81/305964', 'Akkar al-Atika', 'nananananananananana', 1, 2, NULL, '2025-01-03 11:23:07', '2025-01-03 11:23:07'),
(31, 'Yazan Ghayeb', 'yazan@gmail.com', NULL, '$2y$10$i/SpouAz8rIhdIfgX/D2QOI/YNQhitIlVUNemNeCyHU4tWKzoaiDW', NULL, '90/876543', 'Akkar al-Atika', 'nananananananananana', 1, 2, NULL, '2025-01-03 11:24:26', '2025-01-03 11:24:26'),
(32, 'Ahmad Issa', 'ahmad@gmail.com', NULL, '$2y$10$jYoo3/RY9cviJsu45HpYrONsoLBEWegc7vOfS0Yoxhj3BVguGYwWS', NULL, '90/876543', 'Miniara', 'Min Road facing Miniara Bakeies', 3, 1, NULL, '2025-01-03 19:19:45', '2025-01-04 19:46:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `goals`
--
ALTER TABLE `goals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meals`
--
ALTER TABLE `meals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `meals_goal_id_foreign` (`goal_id`),
  ADD KEY `meals_meal_type_id_foreign` (`meal_type_id`);

--
-- Indexes for table `meals_of_days`
--
ALTER TABLE `meals_of_days`
  ADD PRIMARY KEY (`id`),
  ADD KEY `meals_of_days_order_day_id_foreign` (`order_day_id`),
  ADD KEY `meals_of_days_meal_id_foreign` (`meal_id`);

--
-- Indexes for table `meal_restrictions`
--
ALTER TABLE `meal_restrictions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `meal_restrictions_meal_id_foreign` (`meal_id`),
  ADD KEY `meal_restrictions_restriction_id_foreign` (`restriction_id`);

--
-- Indexes for table `meal_types`
--
ALTER TABLE `meal_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_plan_id_foreign` (`plan_id`),
  ADD KEY `orders_user_id_foreign` (`user_id`),
  ADD KEY `orders_payment_id_foreign` (`payment_id`);

--
-- Indexes for table `order_days`
--
ALTER TABLE `order_days`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_days_order_id_foreign` (`order_id`);

--
-- Indexes for table `order_day_meals`
--
ALTER TABLE `order_day_meals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_day_meals_order_day_id_foreign` (`order_day_id`),
  ADD KEY `order_day_meals_meal_id_foreign` (`meal_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `plans`
--
ALTER TABLE `plans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `plans_goal_id_foreign` (`goal_id`),
  ADD KEY `plans_plan_type_id_foreign` (`plan_type_id`);

--
-- Indexes for table `plan_types`
--
ALTER TABLE `plan_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plan_type_meals`
--
ALTER TABLE `plan_type_meals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `plan_type_meals_plan_type_id_foreign` (`plan_type_id`),
  ADD KEY `plan_type_meals_meal_type_id_foreign` (`meal_type_id`);

--
-- Indexes for table `restrictions`
--
ALTER TABLE `restrictions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_goal_id_foreign` (`goal_id`),
  ADD KEY `users_role_id_foreign` (`role_id`),
  ADD KEY `users_restriction_id_foreign` (`restriction_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `goals`
--
ALTER TABLE `goals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `meals`
--
ALTER TABLE `meals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- AUTO_INCREMENT for table `meals_of_days`
--
ALTER TABLE `meals_of_days`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `meal_restrictions`
--
ALTER TABLE `meal_restrictions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=234;

--
-- AUTO_INCREMENT for table `meal_types`
--
ALTER TABLE `meal_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `order_days`
--
ALTER TABLE `order_days`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=222;

--
-- AUTO_INCREMENT for table `order_day_meals`
--
ALTER TABLE `order_day_meals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=553;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `plans`
--
ALTER TABLE `plans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `plan_types`
--
ALTER TABLE `plan_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `plan_type_meals`
--
ALTER TABLE `plan_type_meals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `restrictions`
--
ALTER TABLE `restrictions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `meals`
--
ALTER TABLE `meals`
  ADD CONSTRAINT `meals_goal_id_foreign` FOREIGN KEY (`goal_id`) REFERENCES `goals` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `meals_meal_type_id_foreign` FOREIGN KEY (`meal_type_id`) REFERENCES `meal_types` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `meals_of_days`
--
ALTER TABLE `meals_of_days`
  ADD CONSTRAINT `meals_of_days_meal_id_foreign` FOREIGN KEY (`meal_id`) REFERENCES `meals` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `meals_of_days_order_day_id_foreign` FOREIGN KEY (`order_day_id`) REFERENCES `order_days` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `meal_restrictions`
--
ALTER TABLE `meal_restrictions`
  ADD CONSTRAINT `meal_restrictions_meal_id_foreign` FOREIGN KEY (`meal_id`) REFERENCES `meals` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `meal_restrictions_restriction_id_foreign` FOREIGN KEY (`restriction_id`) REFERENCES `restrictions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_payment_id_foreign` FOREIGN KEY (`payment_id`) REFERENCES `payments` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `orders_plan_id_foreign` FOREIGN KEY (`plan_id`) REFERENCES `plans` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_days`
--
ALTER TABLE `order_days`
  ADD CONSTRAINT `order_days_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_day_meals`
--
ALTER TABLE `order_day_meals`
  ADD CONSTRAINT `order_day_meals_meal_id_foreign` FOREIGN KEY (`meal_id`) REFERENCES `meals` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_day_meals_order_day_id_foreign` FOREIGN KEY (`order_day_id`) REFERENCES `order_days` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `plans`
--
ALTER TABLE `plans`
  ADD CONSTRAINT `plans_goal_id_foreign` FOREIGN KEY (`goal_id`) REFERENCES `goals` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `plans_plan_type_id_foreign` FOREIGN KEY (`plan_type_id`) REFERENCES `plan_types` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `plan_type_meals`
--
ALTER TABLE `plan_type_meals`
  ADD CONSTRAINT `plan_type_meals_meal_type_id_foreign` FOREIGN KEY (`meal_type_id`) REFERENCES `meal_types` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `plan_type_meals_plan_type_id_foreign` FOREIGN KEY (`plan_type_id`) REFERENCES `plan_types` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_goal_id_foreign` FOREIGN KEY (`goal_id`) REFERENCES `goals` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `users_restriction_id_foreign` FOREIGN KEY (`restriction_id`) REFERENCES `restrictions` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
