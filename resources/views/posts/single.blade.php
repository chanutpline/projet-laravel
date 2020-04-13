@extends('layouts/main')
{{-- insère la section content dans le champ constent du layout main --}}
@section('content')
    {{-- récupère pour les afficher les données qui lui ont été transmises par le controlleur --}}
    <div class="row medium-10 large-10">

        <div class="grid-x">
            <div class="cell small-4">
                <form action="{{ route('delete') }}" method="post" style="display: inline-block">
                    @csrf
                    {{-- envoie l'id de l'article sans demander à l'utilisateur de le rentrer, pour après récupérer l'article à modifier --}}
                    <input type="hidden" name='id' value="{{$post->id}}">
                    <input type="submit" value="Supprimer" class="button alert">
                </form>
                <form action="{{ route('update') }}" method="post" style="display: inline-block">
                    @csrf
                    {{-- envoie l'id de l'article sans demander à l'utilisateur de le rentrer, pour après récupérer l'article à modifier --}}
                    <input type="hidden" name='id' value="{{$post->id}}">
                    <input type="submit" value="Modifier" class="button">
                </form>
            </div>
            <div class="cell small-8">
                <h2>{{$post->post_title}}</h2>
            </div>
        </div>
        <div class="grid-x">
            <div class="cell">
                <div class="cell small-12">
                    <h5>Auteur : {{$user->name}}</h5>
                </div>
            </div>
        </div>
        <div>{{$post->post_content}}</div>
        @foreach ($images as $item)
            <img src="{{ asset("storage/"."$item->image") }}" alt="{{ asset("$item->image") }}"><br/>
        @endforeach
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
                {{-- envoie l'id de l'article sans demander à l'utilisateur de le rentrer, pour après récupérer l'article --}}
                <input type="hidden" name="post_id" value="{{ $post->id }}">
                <input type="submit" value="Envoyer">
            </form>
        </div>

        <div>
            <br />
            <br />
            <h4 style = "color:blue">Commentaires: </h4>
            {{-- Cette partie ne s'affiche que si il y a des commentaires --}}
            @if($commentaires)
                @foreach ($commentaires as $commentaire)
                    <p>{{ $commentaire->name }}</p>
                    <p>{{ $commentaire->body }}</p>
                    <hr>
                @endforeach
            @else
                <p>Ce post n'a pas de commentaires</p>
        </div>
    </div>
    @endif
@endsection