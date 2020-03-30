@extends('layouts/main')

@section('content')
<h1>Contacts</h1>

Pour nous contacter, veuillez remplir le formulaire ci-dessous :

<form action="{{ route('post-contact') }}" method="post">
    @csrf
    <table>
        <tr>
            <td>
                <input type="text" name="nom" placeholder="Votre nom" value="{{ old('nom') }}">
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
                <input type="text" name="email" placeholder="Votre email" value="{{ old('email') }}">
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
                <textarea id="msg" name="message" placeholder="Votre message">{{ old('message') }}</textarea>
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