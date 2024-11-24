<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;





class Meal extends Model
{
    protected $fillable = ['mealName', 'description', 'image'];

    
}
