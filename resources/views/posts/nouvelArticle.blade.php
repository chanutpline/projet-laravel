@extends('layouts/main')
{{-- insère la section content dans le champ constent du layout main --}}
@section('content')

    <div class="row medium-10 large-10">
<h1>Nouvel Article</h1>

Veuillez rédiger votre article ci-dessus et renseigner les champs complémentaires :
{{-- formulaire utilisant la méthode post et redirigeant vers la route postRediger --}}
        <div class="grid-x">
<form action="{{ route('postRediger') }}" method="post" enctype="multipart/form-data">
    @csrf

                {{--en cas d'erreur dans l'envoi du formulaire le champ prend pour valeur celle ayant été envoyée s'il y en avait une --}}
                <input type="text" name="nom" placeholder="Le nom de votre article" value="{{ old('nom') }}">
                {{--
                en cas d'erreur dans l'entrée des donnes du champ nom dans $error :
                le tableau contenant ces erreur est récupéré et chacun des message d'erreur est affiché en rouge
                     --}}
                @if($errors->has('nom'))
                    @foreach($errors->get('nom') as $error)
                    <span style="color:red">
                        {{ $error }}
                    </span>
                    @endforeach
                @endif
                {{--en cas d'erreur dans l'envoi du formulaire le champ prend pour valeur celle ayant été envoyée s'il y en avait une --}}
                <input type="text" name="titre" placeholder="Le titre de votre article" value="{{ old('titre') }}">
                {{--
                en cas d'erreur dans l'entrée des donnes du champ titre dans $error :
                le tableau contenant ces erreur est récupéré et chacun des message d'erreur est affiché en rouge
                --}}
                @if($errors->has('titre'))
                    @foreach($errors->get('titre') as $error)
                    <span style="color:red">
                        {{ $error }}
                    </span>
                    @endforeach
                @endif
                {{--en cas d'erreur dans l'envoi du formulaire le champ prend pour valeur celle ayant été envoyée s'il y en avait une --}}
                <textarea id="msg" name="article" placeholder="Votre article">{{ old('article') }}</textarea>
                {{--
                en cas d'erreur dans l'entrée des donnes du champ article dans $error :
                le tableau contenant ces erreur est récupéré et chacun des message d'erreur est affiché en rouge
                --}}
                @if($errors->has('article'))
                    @foreach($errors->get('article') as $error)
                    <span style="color:red">
                        {{ $error }}
                    </span>
                    @endforeach
                @endif
                {{--en cas d'erreur dans l'envoi du formulaire le champ prend pour valeur celle ayant été envoyée s'il y en avait une --}}
                <input type="text" name="status" placeholder="Le status de votre article" value="{{ old('status') }}">
                {{--
                en cas d'erreur dans l'entrée des donnes du champ status dans $error :
                le tableau contenant ces erreur est récupéré et chacun des message d'erreur est affiché en rouge
                --}}
                @if($errors->has('status'))
                    @foreach($errors->get('status') as $error)
                    <span style="color:red">
                        {{ $error }}
                    </span>
                    @endforeach
                @endif
                {{--en cas d'erreur dans l'envoi du formulaire le champ prend pour valeur celle ayant été envoyée s'il y en avait une --}}
                <input type="text" name="categorie" placeholder="La catégorie de votre article" value="{{ old('categorie') }}">
                {{--
                en cas d'erreur dans l'entrée des donnes du champ categorie dans $error :
                le tableau contenant ces erreur est récupéré et chacun des message d'erreur est affiché en rouge
                --}}
                @if($errors->has('categorie'))
                    @foreach($errors->get('categorie') as $error)
                    <span style="color:red">
                        {{ $error }}
                    </span>
                    @endforeach
                @endif
                {{-- récupère un ou plusieurs fichiers (forcément des images) et les stocke dans un tableau image --}}
                <input type="file" name="image[]" multiple="multiple" accept='image/*'>

                <input type="submit" value="Soumettre">
            </div>
</form>
    </div>
@endsection