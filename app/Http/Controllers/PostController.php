<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use Illuminate\Support\Carbon;
use App\Http\Requests\PostRedigerArticleRequest;
use App\Http\Requests\DeleteUpdateRequest;



class PostController extends Controller
{
/*
récupères les premier post de la table post dont post_name correspond à $post_name
le stock dans $post
récupère le premier utilisateur dans la table user dont l'id correspond à user_id de $post
le stock dans $author
envoie à la vue single $post et $authors dans un tableau, récupèrables avec les clés post et user
retourne la vue single
*/
public function show($post_name) {
    $post = \App\Post::where('post_name',$post_name)->first();
    $author = \App\User::where('id',$post->user_id)->first();
    return view('posts/single',array('post'=>$post,'user'=>$author));
}

     /*
    récupère les données envoyées par le formulaire ($request)
    test la validité de ces données à l'aide de PostRedigerArticleRequest
    si les données sont valides :
    crée un nouvel objet de la classe Post (modèle)
    rempli l'objet avec $request
    entre dans la base de donnée cet objet
    redirige sur la page accueil (l'article rédigé apparait en premier)
    sinon reste sur la même page mais rempli $error avec les messages d'erreur générés
    */
public function create(PostRedigerArticleRequest $request) {
    $article = new Post();
    $users = User::pluck('id')->toArray();//récupère dans un tableau tous les id de la table user
    $article->user_id = array_rand($users,1);//sélectionne un utlisateur aléatoirement pour remplir l'auteur de l'article
    $article->post_date = Carbon::now();
    $article->post_content = $request['article'];
    $article->post_title = $request['titre'];
    $article->post_status = $request['status'];
    $article->post_name = $request['nom'];
    $article->post_type = 'article';
    $article->post_category = $request['categorie'];
    $article->save();
    return redirect('/');
}

public function update(){

    return view('nouvelArticle');
}

public function delete(DeleteUpdateRequest $request){
    if($request['id'] != null){
    Post::where('id',$request['id'])->first()->delete();
    }
    return redirect('/');
}

}