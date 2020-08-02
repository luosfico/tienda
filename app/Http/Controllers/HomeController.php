<?php

namespace App\Http\Controllers;

use App\CarouselHome;
use App\Category;
use App\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
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
        $productsNew = Product::where('offerPrice',null)->orderby('created_at','DESC')->limit(4)->get();
        $productsOffer = Product::where('offerPrice','!=',null)->orderby('created_at','DESC')->limit(4)->get();
        $cart = Cart::content();

        return view('public.index',['carousels' => $carousels,
            'categories'=>$categories,
            'productsOffer'=>$productsOffer,
            'productsNew'=>$productsNew,
            'cart'=>$cart]);
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
