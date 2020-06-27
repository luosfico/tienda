<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        if ($request) {
            $query = trim($request->get('search'));
            $categories = Category::where('name', 'LIKE', '%' . $query . '%')->orderBy('name', 'asc')->paginate(5);
            $searchCount = $categories->total();
            return view('private.category.index', ['categories' => $categories, 'search' => $query, 'searchCount' => $searchCount]);
        }
    }

    public function create()
    {
        return view('private.category.create');
    }

    public function store(Request $request)
    {
        $category = new Category();
        $category->name = request('name');
        $category->save();

        return redirect('/category');
    }
    public function show($id)
    {

    }
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('private.category.edit',['category' => $category] );
    }

    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->name = $request->name;
        $category->update();
        return redirect('/category');
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        //Session::flash('productDelete',$productDelete);
        return redirect('/category');
    }
}
