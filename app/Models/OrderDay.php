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
}
