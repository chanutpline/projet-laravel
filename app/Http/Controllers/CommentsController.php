<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\CommentRequest;
use Illuminate\Support\Carbon;

class CommentsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(CommentRequest $request)
    {
        $body = $request['message'];
        $comment = new Comment();
        $comment->body = $body;
        $comment->user_id = 1;//valeur arbitraire tant que pas d'utilisateur
        $comment->post_id = 1;
        $comment->save();
        return view('confirm');

    }
}