<?php

namespace App\Http\Controllers;

use App\CarouselHome;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['index','products']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //$carousels = CarouselHome::orderBy('position','ASC')->get();
        $carousels = CarouselHome::where('visible','=',true)->orderBy('position','ASC')->get();

        return view('public.index',['carousels' => $carousels]);
    }

    public function products()
    {
        return view('public.products.index');
    }

    public function account()
    {
        return view('private.account');
    }
}
