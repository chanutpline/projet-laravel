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



