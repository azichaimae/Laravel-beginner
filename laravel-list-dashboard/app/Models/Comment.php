<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    //variables that will be in db

    protected $fillabe =[
        'body',
        'post_id',
        'user_id',
    ];

    //user class

    public function user(){
        return $this->belongsTo(User::class);
    }

    //Post class

    public function Post(){
        return $this->belongsTo(Post::class);
    }

}
