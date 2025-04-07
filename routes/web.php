<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;
//use App\Http\Controllers\tomarControlador;

//URI,vista,name:opcional
Route::view('/', 'index', ['name' => 'hogar']);
Route::view('/search', 'search', ['name' => 'buscar']);
Route::view('/new', 'new', ['name' => 'publicacion']);
Route::view('/skill', 'skill', ['name' => 'habilidad']);
Route::view('/advice', 'advice', ['name' => 'consejo']);
Route::view('/notify', 'notify', ['name' => 'notificacion']);
Route::view('/profile', 'profile', ['name' => 'perfil']);


Route::view('/landing', 'landing', ['name' => 'landingPage']);
Route::view('/logeo', 'logeo', ['name' => 'logeo']);
Route::view('/public', 'public', ['name' => 'acc_public']);
Route::view('/private', 'private', ['name' => 'acc_private']);


Route::get('/tuneo', function () {
    $response = Http::get('https://restcountries.com/v3.1/all');
   echo gettype($response);


});


// Route::get('/',function(){
//     return view('welcome');
// });

// Route::get('/home',[tomarControlador::class,'home'] );
