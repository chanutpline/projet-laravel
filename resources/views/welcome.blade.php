@extends('layouts/main')

@section('content')
<h1>Home</h1>

<ul>
    @foreach ($articles as $post)
<li><a>{{ $post->post_title}}</a></li>
    @endforeach
</ul>




@endsection