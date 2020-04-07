@extends('layouts/main')
{{-- insère la section content dans le champ constent du layout main --}}
@section('content')
{{-- récupère pour les afficher les données qui lui ont été transmises par le controlleur --}}
<h1>{{$post->post_title}}</h1>
<h2>Auteur : {{$user->name}}</h2>
<table>
    <tr>
        <td>
            <form action="{{ route('delete') }}" method="post">
                @csrf
               <input type="hidden" name='id' value="{{$post->id}}">
               <input type="submit" value="Supprimer">
           </form>
        </td>
        <td>
            <form action="{{ route('update') }}" method="post">
                @csrf
               <input type="hidden" name='id' value="{{$post->id}}">
               <input type="submit" value="Modifier">
            </form>
        </td>
    </tr>
</table>
<div>{{$post->post_content}}</div>



@endsection