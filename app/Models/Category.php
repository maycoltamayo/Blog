<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\models\Post;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name','slug'];

    public function getRouteKeyName()
    {
        return "slug";
    }

     // relacion de categories a posts 
     public function posts(){
        return $this->hasMany(Post::class);
    }
}
