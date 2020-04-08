<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Post extends Model
{

    //attributs pouvant être modifiés
    protected $fillable = [
        'post_name', 'post_content', 'post_title', 'post_status', 'post_category'
    ];

   //indique qu'un post est forcément lié à un utilisateur
    public function author() {
        return $this->belongsTo(User::class, 'user_id');
    }

}
