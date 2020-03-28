<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    function index() {
        $last_posts = \App\Post::orderBy('post_date','desc')->take(3)->get();
        return view('welcome',array('last'=>$last_posts));
    }

    function articles(){
        $posts = \App\Post::all();
        return view('articles',array('articles'=>$posts));
    // $​posts​ ​=​ \App\​Post::​all​(); ​//get all posts
    // return view('articles',array('post'=>$posts));

    }
}