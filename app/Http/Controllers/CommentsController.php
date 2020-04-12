<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use App\User;
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
        $comment->user_id =  auth()->user()->id;
        $comment->post_id = $request['post_id'];
        $user = User::where('id',$comment->user_id)->first();// récupère l'utilisateur qu'était enregistré dans $somments->user_id
        // enregistre le nom et le mail de $user
        $comment->name = $user->name;
        $comment->email = $user->email;
        $comment->save();
        return view('confirmComment');

    }
}