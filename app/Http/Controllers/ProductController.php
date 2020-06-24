<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        if ($request) {
            $query = trim($request->get('search'));
            $products = Product::where('model', 'LIKE', '%' . $query . '%')->orderBy('id', 'asc')->paginate(5);
            $searchCount = $products->total();
            return view('private.product.index', ['products' => $products, 'search' => $query, 'searchCount' => $searchCount]);
        }
    }

    public function create()
    {

        return view('private.product.create');
    }

    public function store(Request $request)
    {

    }

    public function show($id)
    {
        //
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
