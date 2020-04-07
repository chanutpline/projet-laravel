@extends('layouts/main')
{{-- insère la section content dans le champ constent du layout main --}}
@section('content')
<h1>éditer votre article</h1>

Veuillez modifer votre article :
{{-- formulaire utilisant la méthode post et redirigeant vers la route postRediger --}}

<form action="{{ route('update1') }}" method="post">
    @csrf
    <table>
        <tr>
            <td>
                <input type="hidden" name="id" value="{{ $post->id }}">
                {{--en cas d'erreur dans l'envoi du formulaire le champ prend pour valeur celle ayant été envoyée s'il y en avait une --}}
                <input type="text" name="post_name" placeholder="Le nom de votre article" value="{{ $post->post_name }}">
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

            </td>
        </tr>
        <tr>
            <td>
                {{--en cas d'erreur dans l'envoi du formulaire le champ prend pour valeur celle ayant été envoyée s'il y en avait une --}}
                <input type="text" name="post_title" placeholder="Le titre de votre article" value="{{ $post->post_title }}">
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
            </td>
        </tr>
        <tr>
            <td>
                {{--en cas d'erreur dans l'envoi du formulaire le champ prend pour valeur celle ayant été envoyée s'il y en avait une --}}
                <textarea id="msg" name="post_content" placeholder="Votre article">{{ $post->post_content }}</textarea>
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
            </td>
        </tr>
        <tr>
            <td>
                {{--en cas d'erreur dans l'envoi du formulaire le champ prend pour valeur celle ayant été envoyée s'il y en avait une --}}
                <input type="text" name="post_status" placeholder="Le status de votre article" value="{{ $post->post_status }}">
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
            </td>
        </tr>
        <tr>
            <td>
                {{--en cas d'erreur dans l'envoi du formulaire le champ prend pour valeur celle ayant été envoyée s'il y en avait une --}}
                <input type="text" name="post_category" placeholder="La catégorie de votre article" value="{{ $post->post_category }}">
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
            </td>
        </tr>
        <tr>
            <td>
                <input type="submit" value="Soumettre">
            </td>
        </tr>
    </table>
</form>

@endsection