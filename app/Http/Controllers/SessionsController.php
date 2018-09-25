<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
