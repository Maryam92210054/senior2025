<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MealType extends Model
{
    use HasFactory;

    protected $table = 'meal_types';
    protected $fillable = ['name'];

    public function meals()
    {
        return $this->hasMany(Meal::class, 'meal_type_id');
    }
    public function plans()
{
    return $this->belongsToMany(Plan::class, 'plan_meal_types', 'meal_type_id', 'plan_id');
}
public function planTypes()
{
    return $this->belongsToMany(PlanType::class, 'plan_type_meals', 'meal_type_id', 'plan_type_id');
}
public function planTypeMeals()
{
    return $this->hasMany(PlanTypeMeal::class);
}


}
