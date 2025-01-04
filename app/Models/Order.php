<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders'; // This ensures it maps to the correct 'orders' table in the DB
    protected $fillable = ['delivery_time', 'plan_id', 'user_id','status','refund_processed']; // Only allow these fields to be mass assigned
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function plan()
    {
        return $this->belongsTo(Plan::class, 'plan_id');
    }
    public function orderDays()
    {
        return $this->hasMany(OrderDay::class);
    }
    

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }
}
