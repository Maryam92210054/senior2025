<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Goal extends Model
{

    use HasFactory;

    // Table name (optional if it follows Laravel's convention)
    protected $table = 'goals';

    // Fillable attributes (columns that can be mass-assigned)
    protected $fillable = ['name'];
}
