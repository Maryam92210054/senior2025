<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MealRestriction extends Model
{
    protected $table = 'meal_restrictions'; 

    public function meal()
    {
        return $this->belongsTo(Meal::class, 'meal_id');
    }
    
    public function restriction()
    {
        return $this->belongsTo(Restriction::class, 'restriction_id');
    }
    
}
