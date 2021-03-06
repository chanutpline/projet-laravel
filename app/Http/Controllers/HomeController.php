<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /*
    récupères les trois derniers posts triées à partir des plus récent dans la table post
    les stock dans $last_post
    envoie à la vue welcome $lat_post dans un tableau, récupèrable avec la clé last
    retourne la vue welcome
    */
    function index() {
        $last_posts = \App\Post::orderBy('post_date','desc')->take(3)->get();

        // retrieve posts with their comment
        $posts = \App\Post::with('comments')->get();
        return view('welcome')->with( array('posts'=>$posts, 'last'=>$last_posts) );
    }

        /*
    récupères tous les posts dans la table post
    les stock dans $post
    envoie à la vue articles $post dans un tableau, récupèrable avec la clé articles
    retourne la vue articles
    */
    function articles(){
        $posts = \App\Post::all();
        return view('articles',array('articles'=>$posts));
    }

    /*
    retourne la vue nouvelArticle
    */
    function nouvelArticle(){
        return view('posts/nouvelArticle');
    }
}