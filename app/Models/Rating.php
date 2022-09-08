<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{

    use HasFactory;
    protected $fillable = [
        'trainer_id',
        'user_id',
        'users_username',
        'user_avatar',
        'star'
       
    ];
    public function trainers()
    {
    return $this->belongsToMany('App\Models\Trainer');

    }

  
}
