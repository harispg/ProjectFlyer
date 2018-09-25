<?php

namespace App\Http\Controllers\Traits;

use App\Flyer;
use Illuminate\Http\Request;

trait AuthorizesUsers{

  protected function unauthorized(Request $request)
  {
    if($request->ajax()){
      return response(['No way.'], 403);
    }
    flash()->error('No way');
    return redirect('/');
  }

  protected function userCreatedFlyer(Request $request)
  {
    return Flyer::where([
      'zip' => $request->zip,
      'street' => $request->address,
      'user_id' => auth()->id(),
    ])->exists();
  }
}
