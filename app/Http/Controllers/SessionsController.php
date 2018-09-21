<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionsController extends Controller
{
    public function __construct()
    {
      $this->middleware('guest')->except('destroy');
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

      return redirect('/');
    }

    public function destroy()
    {
      auth()->logout();
      return redirect('/');
    }
}
