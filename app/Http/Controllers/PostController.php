<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use App\Image;
use Illuminate\Support\Carbon;
use App\Http\Requests\PostRedigerArticleRequest;
use App\Http\Requests\PostModifierArticleRequest;
use App\Http\Requests\DeleteUpdateRequest;
use App\Comment;

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
        $post = Post::where('post_name',$post_name)->first();
        $author = User::where('id',$post->user_id)->first(); ;
        $comment = Comment::where('post_id',$post->id)->get();
        $image = Image::where('post',$post->id)->get();
        return view('posts/single',['post'=>$post,'user'=>$author, 'commentaires'=>$comment,'images'=>$image]);
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
        $article->user_id = auth()->user()->id;
        $article->post_date = Carbon::now();
        $article->post_content = $request['article'];
        $article->post_title = $request['titre'];
        $article->post_status = $request['status'];
        $article->post_name = $request['nom'];
        $article->post_type = 'article';
        $article->post_category = $request['categorie'];
        $article->save();

        if($request->hasFile('image')) {
            foreach ($request->file('image') as $file) {
                $path = $file->store('images', 'public_path');
                $image = new Image();
                $image->post = $article->id;
                $image->image = $path;
                $image->save();
            }
        }

        return redirect('/');
    }

    /*
   récupère les données envoyées par le formulaire ($request)
   test la validité de ces données à l'aide de DeleteUpdateRequest
   si les données sont valides :
   récupère le post associé à l'id de $request dans $post
   retourne la vue modifierArticle et l'article récupéré
   sinon reste sur la même page
   */
    public function modifier(DeleteUpdateRequest $request){
        $post = Post::where('id',$request['id'])->first();
        return view('posts/modifierArticle', ['post' => $post]);
    }

    /*
    crée une variable $post nulle
    retourne la vue modifierArticle et $post
    */
    public function modifier2(){
        $post = null;
        return view('posts/modifierArticle', ['post' => $post]);
    }

    /**
     * récupère les données envoyées par le formulaire ($request)
     * test la validité de ces données à l'aide de PostModifierArticleRequest
     * si les données sont valides :
     * récupère le post associé à l'id de $request dans $article
     * met à jour le post $article avec les données contenues dans $request
     * redirige sur la page accueil
     * sinon reste sur la même page mais rempli $error avec les messages d'erreur générés
     *
     * @param PostModifierArticleRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(PostModifierArticleRequest $request){
        $article = Post::where('id',$request['id'])->first();
        $article->update($request->all());
        return redirect('/');
    }

    /**
     * récupère les données envoyées par le formulaire ($request)
     * test la validité de ces données à l'aide de DeleteUpdateRequest
     * si les données sont valides :
     * supprime le post associé à l'id de $request dans $article
     * redirige sur la page accueil
     * sinon reste sur la même page
     *
     * @param DeleteUpdateRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function delete(DeleteUpdateRequest $request) {
        Post::find($request->id)->delete();

        return redirect('/');
    }

}