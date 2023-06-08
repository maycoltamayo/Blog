<?php

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\PostController;
use App\Http\Controllers\Admin\RoleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\TagController;
use App\Http\Controllers\Admin\UserController;

Route::get('',[HomeController::class,'index'])->middleware('can:admin.index')->name('admin.index');

Route::resource('users',UserController::class)->only('index','edit','update')->names('admin.user');

Route::resource('roles',RoleController::class)->except('show')->names('admin.role');


Route::resource('categories',CategoryController::class)->except('show')->names('admin.category');

Route::resource('tags',TagController::class)->except('show')->names('admin.tag');

Route::resource('posts',PostController::class)->except('show')->names('admin.post');


