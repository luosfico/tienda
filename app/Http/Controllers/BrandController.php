<?php

namespace App\Http\Controllers;

use App\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        if ($request) {
            $query = trim($request->get('search'));
            $brands = Brand::where('name', 'LIKE', '%' . $query . '%')->orderBy('name', 'asc')->paginate(5);
            $searchCount = $brands->total();
            return view('private.brand.index', ['brands' => $brands, 'search' => $query, 'searchCount' => $searchCount]);
        }
    }

    public function create()
    {
        return view('private.brand.create');
    }

    public function store(Request $request)
    {
        $brand = new Brand();
        $brand->name = request('name');
        $brand->save();

        return redirect('/brand');
    }
    public function show($id)
    {

    }
    public function edit($id)
    {
        $brand = Brand::findOrFail($id);
        return view('private.brand.edit',['brand' => $brand] );
    }

    public function update(Request $request, $id)
    {
        $brand = Brand::findOrFail($id);
        $brand->name = $request->name;
        $brand->update();
        return redirect('/brand');
    }

    public function destroy($id)
    {
        $brand = Brand::findOrFail($id);
        $brand->delete();
        //Session::flash('productDelete',$productDelete);
        return redirect('/brand');
    }
}
