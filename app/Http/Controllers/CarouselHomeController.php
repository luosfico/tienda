<?php

namespace App\Http\Controllers;

use App\CarouselHome;
use Carbon\Carbon;
use Faker\Provider\DateTime;
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
        $carousel       = CarouselHome::all();
        $position       = $carousel->count()+1;
        $date           = Carbon::now();
        $fileFull       = $request->file('ImageFull');
        $fileMobile     = $request->file('ImageMobile');

        $namefileFull   = 'carousel'.'F'.$date->timestamp.'-full.'.$fileFull->getClientOriginalExtension();
        $namefileMobile = 'carousel'.'F'.$date->timestamp.'-mobile.'.$fileMobile->getClientOriginalExtension();
        Storage::disk('carousel')->put($namefileFull, File::get($fileFull));
        Storage::disk('carousel')->put($namefileMobile, File::get($fileMobile));

        $carousel = new CarouselHome();

        $carousel->position     = $position;
        $carousel->imageFull    = $namefileFull;
        $carousel->imageMobile  = $namefileMobile;
        $carousel->visible      = true;
        $carousel->URL          = null;
        $carousel->save();

        return redirect('/carousel');
    }
    public function show($id)
    {

    }
    public function edit($id)
    {
        $carousel = CarouselHome::findOrFail($id);
        return view('private.carousel.edit',['carousel' => $carousel] );
    }

    public function update(Request $request, $id)
    {
        $carousel = CarouselHome::findOrFail($id);
        if(request('ImageFull')) {
            $fileFull = $request->file('ImageFull');
            $nameFileFull = $carousel->imageFull;
            Storage::disk('carousel')->delete($carousel->imageFull);
            Storage::disk('carousel')->put($nameFileFull, File::get($fileFull));
        }
        if(request('ImageMobile')) {
            $fileMobile = $request->file('ImageMobile');
            $nameFileMobile = $carousel->imageMobile;
            Storage::disk('carousel')->delete($carousel->imageMobile);
            Storage::disk('carousel')->put($nameFileMobile, File::get($fileMobile));
        }
        $carousel->visible      = true;
        $carousel->URL          = null;
        $carousel->update();

        return redirect('/carousel');
    }

    public function destroy($id)
    {
        $carousel =  CarouselHome::findOrFail($id);
        Storage::disk('carousel')->delete($carousel->imageFull);
        Storage::disk('carousel')->delete($carousel->imageMobile);
        $carousel->delete();
        //Session::flash('productDelete',$productDelete);
        return redirect('/carousel');
    }
}
