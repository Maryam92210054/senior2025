<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Plan extends Model
{
    public function planType()
    {
        return $this->belongsTo(PlanType::class, 'plan_type_id');
    }
    public function mealTypes()
{
    return $this->belongsToMany(MealType::class, 'plan_meal_types', 'plan_id', 'meal_type_id');
}

}
