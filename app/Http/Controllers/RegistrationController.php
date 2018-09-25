<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class RegistrationController extends Controller
{
  public function __construct()
  {
    parent::__construct();
  }
    public function create()
    {
      return view('pages.register');
    }

    public function store(Request $request)
    {
      $this->validate($request, [
        'name' => 'required|min:2',
        'email' => 'required|email',
        'password' => 'required|min:6|confirmed'
      ]);

      $user=User::create([
      'name' => $request->name,
      'email' => $request->email,
      'password' => bcrypt($request->password)
    ]);

      flash()->overlay('Well done', 'You are now signed up and loged in you can now add flyers');

      auth()->login($user);

      return redirect()->home();
    }
}
