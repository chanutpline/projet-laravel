<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class PostController extends Controller
{
/*
récupères les premier post de la table post dont post_name correspond à $post_name
le stock dans $post
récupère le premier utilisateur dans la table user dont l'id correspond à user_id de $post
le stock dans $author
envoie à la vue single $post et $authors dans un tableau, récupèrables avec les clés post et user
retourne la vue single
*/
public function show($post_name) {
    $post = \App\Post::where('post_name',$post_name)->first();
    $author = \App\User::where('id',$post->user_id)->first(); ;
    return view('posts/single',array('post'=>$post,'user'=>$author));
}

}