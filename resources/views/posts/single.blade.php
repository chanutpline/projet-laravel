@extends('layouts/main')

@section('content')
<h1>{{$post->post_title}}</h1>
<h2>Auteur : {{$user->name}}</h2>
<div>{{$post->post_content}}</div>



<div>
<br />
<br />

    <!-- Comment form -->
    <form method="GET" action="./articles">
        @csrf <!-- Required for security reasons -->
        <fieldset>
        <legend> <h4 style = "color:blue"> Laissez votre commentaire ici: </h4></legend>
                <textarea name="message" rows="5"> {{ old('commentaires') }} </textarea>
            @error('message')
                <p> {{ $comment }} </p>
            @enderror
        </fieldset>
        <input type="submit" value="Envoyer">
    </form>
</div>



<div>
<br />
<br />

    <h4 style = "color:blue">Commentaires: </h4>
    @if($commentaires)
         <p>{{ $commentaires->user->name }} {{$commentaires->created_at}}</p>
         <p>{{ $commentaires->body }}</p>
         <hr>
    @else
    <p>Ce post n'a pas de commentaires</p>
</div>
@endif 


@endsection