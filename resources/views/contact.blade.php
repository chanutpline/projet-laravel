@extends('layouts/main')
{{-- insère la section content dans le champ constent du layout main --}}
@section('content')
<h1>Contacts</h1>

Pour nous contacter, veuillez remplir le formulaire ci-dessous :
{{-- formulaire utilisant la méthode post et redirigeant vers la route appelée post-contact --}}
<form action="{{ route('post-contact') }}" method="post">
    @csrf
    <table>
        <tr>
            <td>
                {{--en cas d'erreur dans l'envoi du formulaire le champ prend pour valeur celle ayant été envoyée s'il y en avait une --}}
                <input type="text" name="nom" placeholder="Votre nom" value="{{ old('nom') }}">
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

            </td>
        </tr>
        <tr>
            <td>
                {{--en cas d'erreur dans l'envoi du formulaire le champ prend pour valeur celle ayant été envoyée s'il y en avait une --}}
                <input type="text" name="email" placeholder="Votre email" value="{{ old('email') }}">
                {{--
                en cas d'erreur dans l'entrée des donnes du champ email dans $error :
                le tableau contenant ces erreur est récupéré et chacun des message d'erreur est affiché en rouge
                --}}
                @if($errors->has('email'))
                    @foreach($errors->get('email') as $error)
                    <span style="color:red">
                        {{ $error }}
                    </span>
                    @endforeach
                @endif
            </td>
            </td>
        </tr>
        <tr>
            <td>
                {{--en cas d'erreur dans l'envoi du formulaire le champ prend pour valeur celle ayant été envoyée s'il y en avait une --}}
                <textarea id="msg" name="message" placeholder="Votre message">{{ old('message') }}</textarea>
                {{--
                en cas d'erreur dans l'entrée des donnes du champ message dans $error :
                le tableau contenant ces erreur est récupéré et chacun des message d'erreur est affiché en rouge
                --}}
                @if($errors->has('message'))
                    @foreach($errors->get('message') as $error)
                    <span style="color:red">
                        {{ $error }}
                    </span>
                    @endforeach
                @endif
            </td>
        </tr>
        <tr>
            <td>
                <input type="submit" value="Envoyer">
            </td>
        </tr>
    </table>
</form>


@endsection