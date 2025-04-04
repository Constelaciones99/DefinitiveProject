<?php

use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\tomarControlador;

//URI,vista,name:opcional
Route::view('/', 'index', ['name' => 'home']);
Route::view('/logeo', 'logeo', ['name' => 'logeo']);
Route::view('/search', 'search', ['name' => 'buscar']);

// Route::get('/',function(){
//     return view('welcome');
// });

// Route::get('/home',[tomarControlador::class,'home'] );
