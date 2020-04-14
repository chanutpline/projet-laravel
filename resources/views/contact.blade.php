@extends('layouts/main')
{{-- insère la section content dans le champ constent du layout main --}}
@section('content')
    <div class="row medium-10 large-10">
<h1>Contacts</h1>

Pour nous contacter, veuillez remplir le formulaire ci-dessous :
{{-- formulaire utilisant la méthode post et redirigeant vers la route appelée post-contact --}}
        <div class="grid-x">
    <form action="{{ route('post-contact') }}" method="post">
    @csrf
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
                <input type="submit" value="Envoyer">
    </form>
            <br/>
        </div>
    {{--
    Récupère les données envoyées par le controlleur
    Parcours le tableau contenant les messages
    Les affiches
    --}}
        <div class="grid-x">
        @foreach ($contact as $message)
             <div>
            Le {{$message->contact_date }} message de {{ $message->contact_name }} :
            {{ $message->contact_message}}
            </div>
        @endforeach
        </div>
        </div>
@endsection
