@extends('layouts/main')



@section('content')
<h1>Articles</h1>

<ul>
    @foreach ($articles as $post)
<li><a>{{ $post->post_title}}</a></li>
    @endforeach
</ul>
@endsection