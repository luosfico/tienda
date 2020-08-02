<?php

namespace App\Http\Controllers;

use App\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use App\Category;


class CartController extends Controller
{
    private $cart;

    public function __construct(Cart $cart)
    {
        $this->cart = $cart;
    }

    public function add(Product $product)
    {
        if($product->offerPrice){
            $this->cart::add($product->id, $product->name, 1, $product->offerPrice)->associate('App\Product');
        }
        else{
            $this->cart::add($product->id, $product->name, 1, $product->currentPrice)->associate('App\Product');
        }
        Session::flash('message','El Producto ha sido agregado al carro de compras');
        return redirect('/productos/'.$product->URL);
    }

    public function index()
    {
        $cart = $this->cart::content();
        $categories = Category::all();
        return view('public.cart.index',['cart'=>$cart,'categories'=>$categories,]);
    }
    public function deleteItem(Request $request){
        Cart::remove($request->item);
    }
    public function destroy(){
        $this->cart::destroy();
        Session::flash('Carro de compras vaciado satisfactoriamente');
        return redirect()->back();
    }

}
