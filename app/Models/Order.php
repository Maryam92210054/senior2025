<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders'; // This ensures it maps to the correct 'orders' table in the DB
    protected $fillable = ['delivery_time', 'plan_id', 'user_id']; // Only allow these fields to be mass assigned
}
