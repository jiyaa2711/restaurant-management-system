<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $table = 'feedbacks';
    protected $primaryKey = 'feedback_id';
    
    protected $fillable = ['user_name', 'message', 'date'];

    protected $casts = [
        'date' => 'date',
    ];
}