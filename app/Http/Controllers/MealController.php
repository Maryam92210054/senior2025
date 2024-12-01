<?php


namespace App\Http\Controllers;


use App\Models\Meal;
use App\Models\Goal;

class MealController extends Controller
{
    public function meals()
    {
        $goals = Goal::with('meals')->get();
        
        return view('viewMeals', compact('goals'));
    }
    public function index() {
        $meals=Meal:: paginate(10);

        return view('meals.index',['meals'=>$meals]); 
    }
    public function show($mealId) {
        //select * from meals where id=$
        $singleMealFromDb= Meal::find($mealId);
        if (is_null( $singleMealFromDb)){
            return redirect()->route('meals.index');
        }
        return view('meals.show',['meal'=>$singleMealFromDb]);
    
    }
}


