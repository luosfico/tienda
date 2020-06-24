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
            $brands = Brand::where('name', 'LIKE', '%' . $query . '%')->orderBy('id', 'asc')->paginate(5);
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
