<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CocktailController;
use App\Http\Controllers\Searchcontroller;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/AdminUsers', function () {
    return view('AdminUsers');
});

Route::get('/AdminRecipe', function () {
    return view('AdminRecipe');
});

Route::get('/', [Searchcontroller::class, 'getDataApi']);

Route::resource('users', UserController::class);
Route::delete('user_delete/{id}', [UserController::class, 'destroy']);
Route::post('user_update/{id}', [UserController::class, 'update']);

Route::resource('cocktails', CocktailController::class);
Route::delete('cocktail_delete/{id}', [CocktailController::class, 'destroy']);
Route::post('cocktail_update/{id}', [CocktailController::class, 'update']);

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');