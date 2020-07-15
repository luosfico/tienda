<?php

namespace App\Http\Controllers;

use App\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function add(Product $product)
    {
        Cart::add($product->id, $product->name, 1, $product->currentPrice)->associate('App\Product');
        Session::flash('message','El Producto ha sido agregado al carro de compras');
        return redirect('/productos/'.$product->URL);
    }

    public function index()
    {
        $cart = Cart::content();
        return view('public.cart.index',['cart'=>$cart]);
    }
    public function destroy(Request $request){
        dd($request);
         Cart::destroy($cart);
    }

}
