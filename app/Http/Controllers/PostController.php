<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class PostController extends Controller
{

public function show($post_name) {
    $post = \App\Post::where('post_name',$post_name)->first();
    $author = \App\User::where('id',$post->user_id)->first(); ;
    $comment = \App\Comment::where('p_id',$post->comments)->first();
    return view('posts/single',array('post'=>$post,'user'=>$author, 'commentaires'=>$comment));
}

}