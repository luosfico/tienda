<?php

namespace App\Http\Controllers;

use App\CarouselHome;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class CarouselHomeController extends Controller
{

    public function index()
    {
        $carousel = CarouselHome::all();
        return view( 'private.carousel.index',['carousel' => $carousel] );
    }

    public function create()
    {
        $carousel = CarouselHome::all();
        return view('private.carousel.create',['carousel' => $carousel] );
    }

    public function store(Request $request)
    {
        $date           = date("ymd");
        $fileFull       = $request->file('image-full');
        $fileMobile     = $request->file('image-mobile');

        $namefileFull   = request('position').'carousel'.'F'.$date.'-full.'.$fileFull->getClientOriginalExtension();
        $namefileMobile = request('position').'carousel'.'F'.$date.'-mobile.'.$fileMobile->getClientOriginalExtension();
        Storage::disk('carousel')->put($namefileFull, File::get($fileFull));
        Storage::disk('carousel')->put($namefileMobile, File::get($fileMobile));

        $carousel = new CarouselHome();

        $carousel->position     = request('position');
        $carousel->imageFull    = $namefileFull;
        $carousel->imageMobile  = $namefileMobile;
        $carousel->visible      = true;
        $carousel->URL          = null;
        $carousel->save();

        return redirect('/carousel');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
