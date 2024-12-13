<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDayMeal extends Model
{
    use HasFactory;
    protected $fillable = [
        'order_day_id',
        'meal_id',
    ];
}
