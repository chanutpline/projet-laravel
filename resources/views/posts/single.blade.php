@extends('layouts/main')
{{-- insère la section content dans le champ constent du layout main --}}
@section('content')
{{-- récupère pour les afficher les données qui lui ont été transmises par le controlleur --}}
<h1>{{$post->post_title}}</h1>
<h2>Auteur : {{$user->name}}</h2>
<div>{{$post->post_content}}</div>



@endsection