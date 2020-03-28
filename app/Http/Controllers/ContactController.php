<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostContactRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Validator;

class ContactController extends Controller
{

    public function show() {
        return view('contact');
    }

    public function create(PostContactRequest $request) {
        //Todo db
    }

}



