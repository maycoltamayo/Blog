<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tag;
use Faker\Core\Color;

class TagController extends Controller
{
    public function __construct(){
        $this->middleware('can:admin.tag.index')->only('index');
        $this->middleware('can:admin.tag.create')->only('create','store');
        $this->middleware('can:admin.tag.edit')->only('edit','update');
        $this->middleware('can:admin.tag.destroy')->only('destroy');
    }
    public function index()
    {
        $tags = Tag::all();
        return view('admin.tag.index',compact('tags'));
    }

    
    public function create()
    {
        $colors = [
            'red' => 'Color rojo',
            'yellow' => 'Color amarillo',
            'green' => 'Color verde',
            'blue' => 'Color azul',
            'indigo' => 'Color indigo',
            'purple' => 'Color morado',
            'pink' => 'Color rosado'

        ];
        return view('admin.tag.create',compact('colors'));
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:tags',
            'color' => 'required'
        ]);
        $tag = Tag::create($request->all());

        return redirect()->route('admin.tag.edit',compact('tag'))->with('info',"la Etiqueta: $tag->name se creo con exito");
    }

    

    
    public function edit(Tag $tag)
    {
        $colors = [
            'red' => 'Color rojo',
            'yellow' => 'Color amarillo',
            'green' => 'Color verde',
            'blue' => 'Color azul',
            'indigo' => 'Color indigo',
            'purple' => 'Color morado',
            'pink' => 'Color rosado'

        ];
        return view('admin.tag.edit',compact('tag','colors'));
    }

   
    public function update(Request $request, Tag $tag)
    {
        $request->validate([
            'name' => 'required',
            'slug' => "required|unique:tags,slug,$tag->id",
            'color' => 'required'
        ]);

        $tag->update($request->all());

        return redirect()->route('admin.tag.edit',$tag)->with('info','Se actualizo con exito');
        
    }

    
    public function destroy(Tag $tag)
    {
        $tag->delete();
        return redirect()->route('admin.tag.index')->with('info','La etiqueta se Elimino con exito');
    }
}
