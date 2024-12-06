<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meal extends Model
{
    protected $fillable = ['name', 'health_info','description', 'meal_image', 'goal_id', 'meal_type_id'];

    public function goal()
    {
        return $this->belongsTo(Goal::class, 'goal_id');
    }
    public function restriction()
    {
        return $this->belongsTo(Restriction::class, 'restriction_id');
    }
    public function mealType()
    {
    return $this->belongsTo(MealType::class); // Assuming each meal belongs to one meal type
    }  
    public function restrictions()
    {
    return $this->belongsToMany(Restriction::class, 'meal_restrictions');
    } 
}
