<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restriction extends Model
{
    use HasFactory;

    // Table name (optional if it follows Laravel's convention)
    protected $table = 'restrictions';

    // Fillable attributes
    protected $fillable = ['name'];
}
