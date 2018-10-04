<?php

namespace App\Http\Controllers;

use App\Flyer;
use App\Flyer_Photo;
use App\AddPhotoToFlyer;
use App\Http\Requests\AddPhotoRequest;

class PhotosController extends Controller
{

    public function __construct()
    {
      $this->middleware('auth');
    }
    public function store($zip, $street, AddPhotoRequest $request)
    {
      $flyer = Flyer::locatedAt($zip, $street);
      $photo = $request->file('photo');
      (new AddPhotoToFlyer($flyer, $photo))->save();
    }

    public function destroy($id)
    {
    	Flyer_Photo::findOrFail($id)->delete();

      return redirect()->back();
    }
}
