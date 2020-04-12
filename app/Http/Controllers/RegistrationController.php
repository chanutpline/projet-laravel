<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\User;
 
/* Set up the RegistrationController@store() method to handle registration form submission 
- Validate the form submission
- Create and save a user to the database
- Redirect the user to the confirmRegistration route*/

class RegistrationController extends Controller
{
    public function create()
    {
        return view('registration.create');
    }


    //@store() method to handle registration form submission
    public function store()
    {
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed'
        ]);
        
        $user = User::create(request(['name', 'email', 'password']));
        
        auth()->login($user);
        return view('confirmRegistration');
        
    }
}                   