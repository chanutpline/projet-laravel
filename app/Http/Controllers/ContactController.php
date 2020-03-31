<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostContactRequest;
use Illuminate\Http\Request;
use App\Contact;
use Illuminate\Support\Carbon;

class ContactController extends Controller
{
    public function show() {
        return view('contact');
    }
    /*
    récupère les données envoyées par le formulaire ($request)
    test la validité de ces données à l'aide de PostContactRequest
    si les données sont valides :
    crée un nouvel objet de la classe Contact (modèle)
    rempli l'objet avec $request
    entre dans la base de donnée cet objet
    retourne la vue confirm
    sinon reste sur la même page mais rempli $error avec les messages d'erreur générés
    */
    public function create(PostContactRequest $request) {
        $email = $request['email']; 
        $name = $request['nom']; 
        $msg =$request['message'];
        $date = Carbon::now(); 
        $contact = new Contact(); 
        $contact->contact_name = $name; 
        $contact->contact_email = $email; 
        $contact->contact_message = $msg;
        $contact->contact_date = $date; 
        $contact->save(); 
        return view('confirm');
        
    }

}



