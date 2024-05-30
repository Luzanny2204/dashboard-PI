<?php

use App\Http\Controllers\Admin\Dashboard\DashboardController;
use App\Http\Controllers\Admin\DataBiologies\DatabiologiesController;
use App\Http\Controllers\Admin\MenstrualCalendars\MenstrualcalendarsController;
use App\Http\Controllers\Admin\Nutritionists\NutritionistsController;
use App\Http\Controllers\Admin\Positions\PositionsController;
use App\Http\Controllers\Admin\Psicologies\PsicologiesController;
use App\Http\Controllers\Admin\Roles\RolesController;
use App\Http\Controllers\Admin\States\StatesController;
use App\Http\Controllers\Admin\Teams\TeamsController;
use App\Http\Controllers\Admin\Users\UsersController;
use Illuminate\Support\Facades\Route;

//->middleware('can:admin.dashboard')
Route::get('dashboard',[DashboardController::class,'index'])->middleware('can:admin.dashboard')->name('admin.dashboard');

Route::resource('states',StatesController::class)->names('admin.states');
Route::resource('/roles', RolesController::class)->names('admin.roles');
Route::resource('/positions', PositionsController::class)->names('admin.positions');
Route::resource('/teams', TeamsController::class)->names('admin.teams');
Route::resource('/users', UsersController::class)->names('admin.users');
Route::resource('/databiologies', DatabiologiesController::class)->names('admin.databiologies');
Route::resource('/menstrualcalendars', MenstrualcalendarsController::class)->names('admin.menstrualcalendars');
Route::post('/nutritionists/{id}',[NutritionistsController::class,'store'])->middleware('can:admin.nutritionists.edit')->name('admin.nutritionists.edit');
Route::post('/psicologies/{id}',[PsicologiesController::class,'store'])->middleware('can:admin.psicologies.edit')->name('admin.psicologies.edit');