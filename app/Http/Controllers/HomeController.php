<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    function index() {
        $last_posts = \App\Post::orderBy('post_date','desc')->take(3)->get();
        return view('welcome',array('last'=>$last_posts));

        // retrieve posts with their comment
        $posts = Post::with('comments')->get();    
        return view('home')->with( array('posts'=>$posts ) );
    }

   


    function articles(){
        $posts = \App\Post::all();
        return view('articles',array('articles'=>$posts));
   

    }
}