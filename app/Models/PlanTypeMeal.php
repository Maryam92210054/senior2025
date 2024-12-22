<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlanTypeMeal extends Model
{
    protected $table = 'plan_type_meals'; // Replace with your actual table name

    
    public function meal()
    {
        return $this->belongsTo(Meal::class);
    }

    public function planType()
    {
        return $this->belongsTo(PlanType::class);
    }
    

}
