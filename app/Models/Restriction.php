<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restriction extends Model
{
    use HasFactory;

    protected $table = 'restrictions';
    protected $fillable = ['name'];
    public function restrictions()
{
    return $this->belongsToMany(Restriction::class, 'meal_restrictions');
}
public function meal()
{
    return $this->belongsTo(Meal::class, 'meal_id');
}

public function restriction()
{
    return $this->belongsTo(Restriction::class, 'restriction_id');
}

}
