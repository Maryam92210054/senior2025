<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Plan extends Model
{
    protected $fillable = ['description', 'price','goal_id','plan_type_id'];
    
    public function planType()
    {
        return $this->belongsTo(PlanType::class, 'plan_type_id');
    }
    public function goal()
    {
        return $this->belongsTo(Goal::class, 'goal_id');
    }
    

}
