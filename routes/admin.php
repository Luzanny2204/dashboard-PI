<?php

use App\Http\Controllers\Admin\Dashboard\DashboardController;
use App\Http\Controllers\Admin\Posts\PostsController;
use App\Http\Controllers\Admin\Roles\RolesController;
use App\Http\Controllers\Admin\States\StatesController;
use Illuminate\Support\Facades\Route;

//->middleware('can:admin.dashboard')
Route::get('dashboard',[DashboardController::class,'index'])->name('admin.dashboard');

Route::resource('states',StatesController::class)->names('admin.states');
Route::resource('posts',PostsController::class)->names('admin.posts');
Route::resource('/roles', RolesController::class)->names('admin.roles');