@extends('layouts/main')

@section('content')
<h1>Home</h1>

<ul>
    @foreach ($last as $post)
<li><a href={{ url('/articles/'.$post->post_name) }} >{{ $post->post_title}}</a></li>
    @endforeach
</ul>

@endsection