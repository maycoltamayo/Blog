<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;


class PostController extends Controller
{
    public function __construct(){
        $this->middleware('can:admin.post.index')->only('index');
        $this->middleware('can:admin.post.create')->only('create','store');
        $this->middleware('can:admin.post.edit')->only('edit','update');
        $this->middleware('can:admin.post.destroy')->only('destroy');
    }
    public function index()
    {
        return view('admin.post.index');
    }

    
    public function create()
    {
        $categories = Category::pluck('name','id');
        $tags = Tag::all();
        
        
        return view('admin.post.create',compact('categories','tags'));
    }

    
    public function store(PostRequest $request)
    {
        

        $post = Post::create($request->all());

        if($request->file('file')){
            $url = Storage::put('posts',$request->file('file'));

            $post->image()->create([
                'url' => $url,
            ]);
        }

        Cache::flush();

        if($request->tags){
            $post->tags()->attach($request->tags);
        }

        return redirect()->route('admin.post.edit',$post);
    }

    

    
    public function edit(Post $post)
    {

        $this->authorize('author',$post);

        $categories = Category::pluck('name','id');
        $tags = Tag::all();



        return view('admin.post.edit',compact('post','categories','tags'));
        
    }

    
    public function update(PostRequest $request, Post $post)
    {

        $this->authorize('author',$post);

        $post->update($request->all());

        if($request->file('file')){
            $url = Storage::put('posts',$request->file('file'));

            if($post->image){
                Storage::delete("http://127.0.0.1:8000/storage/".$post->image->url);
                
                $post->image()->update([
                    'url' => $url,
                ]);
                
            }
            else{
                $post->image()->create([
                    'url' => $url,
                ]);
            }
        }
        if($request->tags){
            $post->tags()->sync($request->tags);
        }

        Cache::flush();

        return redirect()->route('admin.post.edit',$post)->with('info','El post se actualizo con exito');

    }

    
    public function destroy(Post $post)
    {

        $this->authorize('author',$post);

        $post->delete();
        
        Cache::flush();

        return redirect()->route('admin.post.index',$post)->with('info','El post se Elimino con exito');

    }
}
