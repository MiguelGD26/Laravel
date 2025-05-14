<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('categorias',CategoriaController::class);
Route::resource('users',UserController::class);

Route::get('page', function(){
    return view ('plantilla.page');
});