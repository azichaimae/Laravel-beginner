<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Post extends Model
{
    use HasFactory;

    //variables that will be in db

    protected $fillabe =[
        'title',
        'content',
        'user_id',
    ];

    //user class

    public function user(){
        return $this->belongsTo(User::class);
    }

    //Comments class

    public function Comments(){
        return $this->hasMany(Comments::class);
    }

}
