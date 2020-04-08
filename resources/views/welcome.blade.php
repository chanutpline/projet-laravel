@extends('layouts/main')
{{-- insère la section content dans le champ constent du layout main --}}
@section('content')
<h1>Home</h1>

<ul>
    {{-- 
    récupère les données qui lui ont été transmises par le controlleur
    parcours ces données qui ont la forme d'un tableau et crée un lien pour chacune d'entre elle 
    --}}
    @foreach ($last as $post)
<li><a href={{ url('/articles/'.$post->post_name) }} >{{ $post->post_title}}</a></li>
    @endforeach
</ul>

@endsection


