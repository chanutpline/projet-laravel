@extends('layouts/main')
{{-- insère la section content dans le champ constent du layout main --}}
@section('content')
    <div class="row medium-10 large-10">
        <h1>Contacts</h1>
        <div style='color:green'>
            <h4> Votre article a bien été modifié.</h4>
        </div>
        <button><a href="{{ url('/articles/'.$post->post_name) }}">Retourner à l'article</a></button>
    </div>
@endsection