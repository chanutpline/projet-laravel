<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    // doing this we could insert data into comment table
    protected $fillable =['user_id','post_id','body'];
    // we need two(2) relations here
    // relation of comment with post
    // relation of comment with user

    // 1. comment belongs to one post
    public function post(){
        return $this->belongsTo('App\Post');
    }

    // 2. comment belongs to a user as well
    public function user(){
        return $this->belongsTo('App\User');
    }
    protected $primaryKey = 'id';
  
}
