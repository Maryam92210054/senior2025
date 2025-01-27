<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class PlanType extends Model
{

    protected $fillable = ['description','name','image'];

    public function plans()
    {
        return $this->hasMany(Plan::class);
    }
    
    public function mealTypes()
    {
        return $this->belongsToMany(MealType::class, 'plan_type_meals', 'plan_type_id', 'meal_type_id');
    }

    public function planTypeMeals()
    {
        return $this->hasMany(PlanTypeMeal::class);
    }

}


