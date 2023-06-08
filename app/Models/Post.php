<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $guarded = ['id','created_at','updated_at'];

    public function getRouteKeyName()
    {
        return "slug";
    }

    // relaciones
    public function users(){
        return $this->belongsTo(User::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }
    // relaciones muchos a muchos 
    public function tags(){
        return $this->belongsToMany(Tag::class);
    }

    // relaciones uno a uno polimorfica
    public function image(){
        return $this->morphOne(Image::class,'imageable');
    }
    
}
