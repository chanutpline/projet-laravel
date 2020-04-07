<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRedigerArticleRequest;
use App\Post;
use App\User;
use Illuminate\Support\Carbon;
use Faker\Generator as Faker;

class PostCrudController extends Controller
{
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

}