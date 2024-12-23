<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Plan extends Model
{
    protected $fillable = ['description', 'price','goal_id','plan_type_id','name',
    'price',];
    
    public function planType()
    {
        return $this->belongsTo(PlanType::class, 'plan_type_id');
    }
    public function goal()
    {
        return $this->belongsTo(Goal::class, 'goal_id');
    }
    
    

    public function meals()
    {
        return $this->belongsToMany(Meal::class, 'plan_type_meals', 'plan_type_id', 'meal_type_id');
    }

}
