<?php


namespace App\Http\Controllers;


use App\Models\Meal;
use App\Models\Goal;

class MealController extends Controller
{
    public function index()
    {
        // Fetch all goals with their associated meals
        $goals = Goal::with('meals')->get();

        // Pass the goals and their meals to the view
        return view('index', compact('goals'));
    }
}

