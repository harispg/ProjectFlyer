<?php

namespace App\Http\Controllers;

use App\Flyer;
use App\Flyer_Photo;
use Illuminate\Http\Request;
use App\Http\Requests\FlyerRequest;

class FlyersController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.home');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //flash()->success('Hi user','Enjoy your stay');
        return view('flyers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FlyerRequest $request)
    {
        Flyer::create($request->all());
        flash()->success('Success', 'Your flyer has been saved');
        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($zip, $street)
    {
        $flyer = Flyer::locatedAt($zip, $street);
        return view('pages.show', compact('flyer'));
    }

    public function addPhoto($zip, $street, Request $request)
    {
      $this->validate($request, [
        'photo' => 'required|mimes:jpg,jpeg,png,bmp'
      ]);
      $photo = Flyer_Photo::fromForm($request->file('photo'));
      Flyer::locatedAt($zip, $street)->addPhoto($photo);

      return 'Done';
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
