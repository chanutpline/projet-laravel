<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Socialite;
use Auth;
use App\user;

 
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

    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return Response
     */
    public function redirectToProvider($provider)
    {
       return Socialite::driver($provider)->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return Response
     */
    public function handleProviderCallback($provider)
    {
        $user = Socialite::driver($provider)->stateless()->user();
        $authUser =$this->findOrCreateUser($user,$provider);
        Auth::login($authUser, true);
        return redirect($this->redirectTo);
    }

    public function findOrCreateUser($user, $provider){
        $authUser = User::where('provider_id', $user->id)->first();
        if($authUser){
            return $authUser;
        }
        return User::create([
            'name' => $user->name,
            'email' => $user->email,
            'provider' => strtoupper($provider),
            'provider_id' => $user->id
        ]);
    }

}                   