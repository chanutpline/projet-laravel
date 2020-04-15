@extends('layouts/main')
{{-- insère la section content dans le champ constent du layout main --}}
@section('content')
    <div class="row medium-10 large-10">
    <h1>Articles</h1>
        <ul>
    {{-- 
    récupère les données qui lui ont été transmises par le controlleur
    parcours ces données qui ont la forme d'un tableau et crée un lien pour chacune d'entre elle 
    --}}
        @foreach ($articles as $post)
                <li><h5><a href={{ url('/articles/'.$post->post_name) }}>{{ $post->post_title}}</a></h5></li>
         @endforeach
        </ul>
    </div>
@endsection