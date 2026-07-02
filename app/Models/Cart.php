<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    // Database mein data save karne ki permission
    protected $fillable = ['user_id', 'meal_id', 'quantity', 'price'];

    // Yeh batata hai ki har cart item ek Meal (Food) se juda hai
    public function meal()
    {
        return $this->belongsTo(Meal::class);
    }
}