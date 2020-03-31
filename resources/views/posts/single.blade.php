@extends('layouts/main')

@section('content')
<h1>{{$post->post_title}}</h1>
<h2>Auteur : {{$user->name}}</h2>
<div>{{$post->post_content}}</div>
<div>
<br />
<br />
    <!-- Comment form -->
    <form action="{{ route('un-article-post') }}" method="post">
        @csrf <!-- Required for security reasons -->
            <h4 style = "color:blue"> Laissez votre commentaire ici: </h4>
            <textarea name="message" rows="5"> {{ old('commentaires') }} </textarea>
                @if($errors->has('message'))
                    @foreach($errors->get('message') as $error)
                    <span style="color:red">
                        {{ $error }}
                    </span>
                    @endforeach
                @endif
        <input type="submit" value="Envoyer">
    </form>
</div>

<div>
<br />
<br />
    <h4 style = "color:blue">Commentaires: </h4>
    @if($commentaires)
    @foreach ($commentaires as $commentaire)
    <p>{{ $commentaire->user_id }}</p>
    <p>{{ $commentaire->body }}</p>
    <hr>
    @endforeach   
    @else
    <p>Ce post n'a pas de commentaires</p>
</div>
@endif 
@endsection