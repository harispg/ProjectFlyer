<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class SessionsController extends Controller
{
    public function __construct()
    {
      $this->middleware('guest')->except('destroy');
      parent::__construct();
    }

    public function create()
    {
      return view('pages.login');
    }

    public function store()
    {
      $this->validate(request(), [
        'email' => 'required|email',
        'password' => 'required',
      ]);

      if(! auth()->attempt(request(['email', 'password'])))
      {
        return back()->withErrors([
          'message' => 'Please check your credentials and try again'
        ]);
      }
      flash()->success('Loged in', 'Do what you want');
      return redirect('/');
    }

    public function destroy()
    {
      auth()->logout();
      return redirect('/');
    }

        /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Obtain the user information from facebook.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {
      $path = $_SERVER['PATH_INFO'];
      if(strpos($path, 'facebook')){
        $user = Socialite::driver('facebook')->stateless()->user();
      }

        $this->loginOrSignUp($user);

        return redirect()->home();        
    }


    public function loginOrSignUp($userFacebook)
    {
        $clientId = $userFacebook->getId();
        $user = User::where('fb_id', $clientId)->first(); 
        if(! $user){
          $user = User::create([
            'name' => $userFacebook->getName(),
            'email' => $userFacebook->getEmail(),
            'fb_id' => $clientId,
          ]);
        }
          auth()->login($user);
          flash()->success('Loged in', 'Feel free to enjoy');
    }
}
