<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
   //indique qu'un post est forcément lié à un utilisateur
    public function author() {
        return $this->belongsTo(User::class, 'user_id');
    }

}
