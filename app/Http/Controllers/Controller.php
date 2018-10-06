<?php

namespace App\Http\Controllers;

use App\Flyer;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function __construct()
    {
      view()->composer('master', function($view){
        $view->with('signedIn', auth()->check());
        $view->with('user', auth()->user());
      });
      view()->composer('pages.show', function($view){
        $view->with('signedIn', auth()->check());
        $view->with('user', auth()->user());
      });
      view()->composer('pages.home', function($view){
        $view->with('flyers', Flyer::all());
      });
    }
}
