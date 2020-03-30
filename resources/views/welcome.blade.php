@extends('layouts/main')

@section('content')
<h1>Home</h1>

<ul>
    @foreach ($last as $post)
<li><a href={{ url('/articles/'.$post->post_name) }} >{{ $post->post_title}}</a></li>
    @endforeach
</ul>

@endsection


@foreach($posts as $post)

     <h4 class="media-heading">{{$post->user->name}}</h4>
     <small>{{$post->created_at}}</small>

     <p>{{$post->description}}</p>

     <!-- trying to retrieve comments with each post -->

             @if (count($post->comments))
                  @foreach($post->commnents as $comment)
                      <small>$comment->body</small>
                   @endforeach
             @else 
                  No comments Found
             @endif 




 @endforeach