<?php

namespace App\Http\Controllers;

use App\CarouselHome;
use App\Category;
use App\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index','products']);
    }
    public function index()
    {
        $carousels = CarouselHome::where('visible','=',true)->orderBy('position','ASC')->get();
        $categories = Category::all();
        $productsNew = Product::where('offerPrice',null)->orderby('created_at','ASC')->limit(4)->get();
        $productsOffer = Product::where('offerPrice','!=',null)->orderby('created_at','ASC')->limit(4)->get();

        return view('public.index',['carousels' => $carousels,
            'categories'=>$categories,
            'productsOffer'=>$productsOffer,
            'productsNew'=>$productsNew]);
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
