<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
   
    public function author() {
        return $this->belongsTo(User::class, 'user_id');
    }


    // posts belongs to one user
    public function user(){
        return $this->belongsTo('App\User');
      }
       public function comments(){
        return $this->hasMany('App\Comment');
       } 

       protected $primaryKey = 'id';
    
}
