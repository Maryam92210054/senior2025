<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDay extends Model
{
    use HasFactory;
    use HasFactory;

    protected $fillable = [
        'order_id',
        'day_number',
        'date',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }

    public function meals()
    {
        return $this->belongsToMany(Meal::class, 'order_day_meals', 'order_day_id', 'meal_id');
    }
}
