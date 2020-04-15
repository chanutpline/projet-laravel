<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;


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
     * Redirect the user to the GitHub/Google authentication page.
     *
     * @return Response
     */

    public function redirectToProvider($provider)
    {
       return Socialite::driver($provider)->redirect();
    }

    /**
     * Obtain the user information from Google.
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */

     //handle user when callback from Google.
    public function handleProviderCallbackGoogle()
    {
        $user = Socialite::driver('google')->user();
        $provider = 'google';
        $authUser =$this->findOrCreateUser($user,$provider);
        Auth::login($authUser, true);
        return redirect('/');
    }

    //handle user when callback from Github.
    public function handleProviderCallbackGithub()
    {
        $user = Socialite::driver('github')->user();
        $provider = 'github';
        $authUser =$this->findOrCreateUser($user,$provider);
        Auth::login($authUser, true);
        return redirect('/');
    }

    public function findOrCreateUser($user, $provider) {
        $authUser = User::where('provider_id', $user->id)->first();
        $checkUser = User::where('email', $user->email)->first();

        // check if there is already an existing user that has this email address
        // if so, then login him
        if ($checkUser) {
          return $checkUser;
        } 

        // check if there is already an authuntified user that has the provider_id provided by github/google
        // if so, then login him
        if($authUser){
            return $authUser;
        }

        // check if the user has a name defined on his account (not always the case with github) then return this name
        if($user->name !== null){
            return User::create([
                'name' => $user->name,
                'email' => $user->email,
                'provider' => strtoupper($provider),
                'provider_id' => $user->id
            ]);
            // else return his nickname (defined on github) in place
            } else {
                return User::create([
                    'name' => $user->nickname,
                    'email' => $user->email,
                    'provider' => strtoupper($provider),
                    'provider_id' => $user->id
                ]);
            }

        
    }

}                   