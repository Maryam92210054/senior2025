<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Goal extends Model
{

    use HasFactory;


    protected $table = 'goals';


    protected $fillable = ['name'];

    public function meals()
    {
        return $this->hasMany(Meal::class, 'goal_id');
    }
}
