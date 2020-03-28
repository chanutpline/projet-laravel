@extends('layouts/main')

@section('content')
<h1>{{$post->post_title}}</h1>
<h2>Auteur : {{$user->name}}</h2>
<div>{{$post->post_content}}</div>



@endsection