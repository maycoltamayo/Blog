<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{


    public function __construct(){
        $this->middleware('can:admin.category.index')->only('index');
        $this->middleware('can:admin.category.create')->only('create','store');
        $this->middleware('can:admin.category.edit')->only('edit','update');
        $this->middleware('can:admin.category.destroy')->only('destroy');
    }
    public function index()
    {
        $categories = Category::all();
        return view('admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
        
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:categories',
        ]);

       $category = Category::create($request->all());

       return redirect()->route('admin.category.edit',$category)->with('info','La categoría se agrego con exito');
    }


    
    public function edit(Category $category)
    {
        return view('admin.category.edit', compact('category'));

    }

    
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required',
            'slug' => "required|unique:categories,slug,$category->id",
        ]);

        $category->update($request->all());

        return redirect()->route('admin.category.edit',$category)->with('info','La categoría se actualizo con éxito');
    }

    
    public function destroy(Category $category)
    {
        $category->delete();
        
        return redirect()->route('admin.category.index')->with('info','La Categorya se elimino con exito');
    }
}
