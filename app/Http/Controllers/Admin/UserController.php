<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function __construct(){
        $this->middleware('can:admin.user.index')->only('index');
        $this->middleware('can:admin.user.edit')->only('edit','update');
    }
    public function index()
    {
        return view('admin.user.index');
    }

    
    public function edit(User $user)
    {
        $roles = Role::all();

        return view('admin.user.edit',compact('user','roles'));
        
    }

    
    public function update(Request $request,User $user)
    {
        $user->roles()->sync($request->roles);
        return redirect()->route('admin.user.edit',$user)->with('info','Se agregaron los permisos con exito');
    }

    
}
