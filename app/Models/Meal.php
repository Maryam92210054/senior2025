<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;





class Meal extends Model
{
    protected $fillable = ['name', 'description', 'meal_image'];

    public function goal()
    {
        return $this->belongsTo(Goal::class, 'goal_id');
    }
}
