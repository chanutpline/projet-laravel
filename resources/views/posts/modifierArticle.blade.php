@extends('layouts/main')
{{-- insère la section content dans le champ constent du layout main --}}
@section('content')
    <div class="row medium-10 large-10">
<h1>éditer votre article</h1>

Veuillez modifer votre article :

{{-- si la vue a reçu les valeurs d'un article par la méthode PostController@modifier--}}
@if($post !=null)
            <div class="grid-x">
    {{-- formulaire utilisant la méthode post et redirigeant vers la route update1 --}}
    <form action="{{ route('update1') }}" method="post">
    @csrf
                {{-- envoie l'id de l'article sans demander à l'utilisateur de le rentrer, pour après récupérer l'article à modifier 
                ne prend pas le nom de l'article car il peut être modifé--}}
                <input type="hidden" name="id" value="{{ $post->id }}">
                {{--le champ prend pour valeur le nom de l'article envoyé par la méthode PostController@modifier --}}
                <input type="text" name="post_name" placeholder="Le nom de votre article" value="{{ $post->post_name }}">
                {{--le champ prend pour valeur le titre de l'article envoyé par la méthode PostController@modifier  --}}
                <input type="text" name="post_title" placeholder="Le titre de votre article" value="{{ $post->post_title }}">
                {{--le champ prend pour valeur le contenu de l'article envoyé par la méthode PostController@modifier --}}
                <textarea id="msg" name="post_content" placeholder="Votre article">{{ $post->post_content }}</textarea>
                {{--le champ prend pour valeur le status de l'article envoyé par la méthode PostController@modifier  --}}
                <input type="text" name="post_status" placeholder="Le status de votre article" value="{{ $post->post_status }}">
                {{--le champ prend pour valeur la catégories de l'article envoyé par la méthode PostController@modifier --}}
                <input type="text" name="post_category" placeholder="La catégorie de votre article" value="{{ $post->post_category }}">
                <input type="submit" value="Soumettre">
    </form>
            </div>
@else {{-- si $post = null car la vue est chargée de nouveau car une erreur de saisie a eu lieu --}}
{{-- formulaire utilisant la méthode post et redirigeant vers la route update1 --}}
        <div class="grid-x">
    <form action="{{ route('update1') }}" method="post">
    @csrf
                {{-- envoie l'id de l'article sans demander à l'utilisateur de le rentrer, pour après récupérer l'article à modifier 
                ne prend pas le nom de l'article car il peut être modifé--}}
                <input type="hidden" name="id" value="{{ old("id") }}">
                {{--le champ prend pour valeur l'ancienne valeur de post_name --}}
                <input type="text" name="post_name" placeholder="Le nom de votre article" value="{{ old("post_name") }}">
                {{--
                en cas d'erreur dans l'entrée des donnes du champ nom dans $error :
                le tableau contenant ces erreur est récupéré et chacun des message d'erreur est affiché en rouge
                     --}}
                @if($errors->has('post_name'))
                    @foreach($errors->get('post_name') as $error)
                    <span style="color:red">
                        {{ $error }}
                    </span>
                    @endforeach
                @endif
                {{--le champ prend pour valeur l'ancienne valeur de post_title  --}}
                <input type="text" name="post_title" placeholder="Le titre de votre article" value="{{ old("post_title") }}">
                {{--
                en cas d'erreur dans l'entrée des donnes du champ titre dans $error :
                le tableau contenant ces erreur est récupéré et chacun des message d'erreur est affiché en rouge
                --}}
                @if($errors->has('post_title'))
                    @foreach($errors->get('post_title') as $error)
                    <span style="color:red">
                        {{ $error }}
                    </span>
                    @endforeach
                @endif
                {{--le champ prend pour valeur l'ancienne valeur de post_content --}}
                <textarea id="msg" name="post_content" placeholder="Votre article">{{ old("post_content") }}</textarea>
                {{--
                en cas d'erreur dans l'entrée des donnes du champ article dans $error :
                le tableau contenant ces erreur est récupéré et chacun des message d'erreur est affiché en rouge
                --}}
                @if($errors->has('post_content'))
                    @foreach($errors->get('post_content') as $error)
                    <span style="color:red">
                        {{ $error }}
                    </span>
                    @endforeach
                @endif
                {{--le champ prend pour valeur l'ancienne aleur de post_status --}}
                <input type="text" name="post_status" placeholder="Le status de votre article" value="{{ old("post_status") }}">
                {{--
                en cas d'erreur dans l'entrée des donnes du champ status dans $error :
                le tableau contenant ces erreur est récupéré et chacun des message d'erreur est affiché en rouge
                --}}
                @if($errors->has('post_status'))
                    @foreach($errors->get('post_status') as $error)
                    <span style="color:red">
                        {{ $error }}
                    </span>
                    @endforeach
                @endif
                {{--le champ prend pour valeur l'ancienne valeur de post_category --}}
                <input type="text" name="post_category" placeholder="La catégorie de votre article" value="{{ old("post_category") }}">
                {{--
                en cas d'erreur dans l'entrée des donnes du champ categorie dans $error :
                le tableau contenant ces erreur est récupéré et chacun des message d'erreur est affiché en rouge
                --}}
                @if($errors->has('post_category'))
                    @foreach($errors->get('post_category') as $error)
                    <span style="color:red">
                        {{ $error }}
                    </span>
                    @endforeach
                @endif
                <input type="submit" value="Soumettre">
    </form>
    </div>
@endif
    </div>
@endsection