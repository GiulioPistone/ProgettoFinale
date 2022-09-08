<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trainer extends Model
{
    use HasFactory;
 
    protected $fillable = [
        'name',
        'content',
        'email',
        'image'
        
    ];

    public function users()
        {
          return $this->belongsToMany('App\Models\User');

    }
    public function ratings()
    {
        return $this->belongsToMany('App\Models\Rating');
    }
    public function comments()
    {
        return $this->belongsToMany('App\Models\Comment');
    }

}
