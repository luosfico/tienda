<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Category;
use App\Image;
use App\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('show');
    }

    public function index(Request $request)
    {
        if ($request) {
            $query = trim($request->get('search'));
            $products = Product::where('name', 'LIKE', '%' . $query . '%')->orderBy('name', 'asc')->paginate(5);
            $searchCount = $products->total();
            return view('private.product.index', ['products' => $products, 'search' => $query, 'searchCount' => $searchCount]);
        }
    }

    public function create()
    {
        $categories = Category::orderby('name','asc')->get();
        $brands = Brand::orderby('name','asc')->get();
        return view('private.product.create',['categories'=>$categories,'brands'=>$brands]);
    }

    public function store(Request $request)
    {


        /** Crear Codigo SKU = Marca.Categoria.0000.CodigoUnico.CodigoVerificador */
        $codeFinal      = Product::where('brand_id',$request->brand_id)->count() + 1;
        $SKU            = $request->brand_id.$request->category_id;
        $zeros          = 7 - ( iconv_strlen($SKU) + iconv_strlen($codeFinal) );
        $SKU            = $SKU.str_repeat(0, $zeros).$codeFinal;

        $product                        = new Product();
        $product->SKU                   = $SKU;
        $product->brand_id              = request('brand_id');
        $product->category_id           = request('category_id');
        $product->name                  = request('name');
        $product->model                 = request('model');
        $product->stock                 = request('stock');
        $product->principalImage        = 'image-product1.'.$request->File1->getClientOriginalExtension();
        $product->standardPrice         = preg_replace('/\D/', '',request('standardPrice'));
        $product->currentPrice          = preg_replace('/\D/', '',request('currentPrice'));
        $product->offerPrice            = intval(preg_replace('/\D/', '',request('offerPrice')));
        if($product->offerPrice == 0){
            $product->offerPrice = null;
        }
        $product->expirationOfferPrice  = request('expirationOfferPrice');
        $product->description           = request('description');
        $product->URL                   = strtoupper(str_replace(" ",'-',$product->name));
        $product->save();

        /** Guardado de Imagenes */
        $numberFile = 0;
        foreach ($request->files as $file){
            $numberFile = $numberFile+1;
            $namefile = 'image-product'.$numberFile.'.'.$file->getClientOriginalExtension();
            Storage::disk('product')->put($SKU.'/'.$namefile, File::get($file));
            $image = new Image();
            $image->name        = $namefile;
            $image->relation    = 'product';
            $image->product_id  = $product->id;
            $image->save();
        }

        //Session::flash('productCreate',$productCreate);
        return redirect('/product');
    }

    public function show($URL)
    {
        $product = Product::where('URL',$URL)->first();
        $categories = Category::all();
        $images = Image::where('product_id',$product->id)->get();
        $cart = Cart::content();

        return view ('public.product.show',[
            'product'=>$product,
            'categories'=>$categories,
            'images'=>$images,
            'cart'=>$cart]);
    }

    public function edit($id)
    {

    }


    public function update(Request $request, $id)
    {

    }


    public function destroy($id)
    {

    }
}
