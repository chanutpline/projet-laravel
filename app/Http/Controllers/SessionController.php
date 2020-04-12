<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\User;
 
/* Those will be create() to offer a login form, 
store() to log an existing user in, 
and destroy() to log a user out of the application */

class SessionsController extends Controller
{
    public function create()
    {
        return view('sessions.create');
    }
    
    public function store()
    {
        if (auth()->attempt(request(['email', 'password'])) == false) {
            return back()->withErrors([
                'message' => 'The email or password is incorrect, please try again'
            ]);
        }
        
        return redirect()->to('/');
        
    }
    
    public function destroy()
    {
        auth()->logout();
        return view('confirmLogOut');
    }
}