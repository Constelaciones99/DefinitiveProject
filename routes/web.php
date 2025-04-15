<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PublicacionController;
use Illuminate\Support\Facades\DB;


Route::get('/', [HomeController::class, 'index'])->name('home');


// 🔹 AUTENTICACIÓN
Route::get('/register', [RegisterController::class, 'show'])->name('register.form');
Route::post('/register', [RegisterController::class, 'register'])->name('register');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [LoginController::class, 'login'])->name('login');

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::post('/seguir/{username}', [UserController::class, 'seguir'])->name('usuario.seguir');
Route::post('/seguir/{username}', [UserController::class, 'seguir'])->name('seguir.usuario');

// 🔹 PUBLICACIONES
Route::get('/new', function () {
    return Session::has('username')
        ? view('new')
        : redirect('/login')->with('error', 'Debes iniciar sesión para publicar.');
})->name('post.new');

Route::post('/post/store', [PostController::class, 'store'])->name('post.store');

Route::get('/publicacion/{id}', [PublicacionController::class, 'ver'])->name('ver.publicacion');
Route::get('/usuario/{username}', [UserController::class, 'verUsuario'])->name('ver.usuario');
// Middleware personalizado como Closure
$checkSession = function ($request, $next) {
    if (!Session::has('username')) {
        return redirect('/landing')->with('error', 'Debes iniciar sesión para acceder.');
    }
    return $next($request);
};

Route::get('/profile', [UserController::class, 'profile'])->name('profile')->middleware('auth');
Route::put('/profile/update', [UserController::class, 'update'])->name('profile.update');
Route::put('/usuario/update', [UserController::class, 'update'])->name('usuario.update')->middleware('auth');



// Ahora aplicamos ese middleware manualmente
Route::group(['middleware' => $checkSession], function () {
    //Route::view('/search', 'search')->name('buscar');
    Route::get('/search', [HomeController::class, 'search'])->name('buscar');
    Route::view('/skill', 'skill')->name('habilidad');
    Route::view('/advice', 'advice')->name('consejo');
    Route::view('/notify', 'notify')->name('notificacion');
    //Route::get('/profile', [PostController::class, 'profile'])->name('perfil');
});

Route::middleware(['guest.only'])->group(function () {
    Route::view('/landing', 'landing')->name('landingPage');
    Route::view('/logeo', 'logeo')->name('logeo');
    Route::view('/public', 'public')->name('acc_public');
    Route::view('/private', 'private')->name('acc_private');
});

Route::get('/landing', function () {
    if (Session::has('username')) {
        return redirect('/');
    }
    return view('landing');
})->name('landingPage');

Route::get('/logeo', function () {
    if (Session::has('username')) {
        return redirect('/');
    }
    return view('logeo');
})->name('logeo');

Route::get('/public', function () {
    if (Session::has('username')) {
        return redirect('/');
    }
    return view('public');
})->name('acc_public');

Route::get('/private', function () {
    if (Session::has('username')) {
        return redirect('/');
    }
    return view('private');
})->name('acc_private');


// Route::get('/home', [HomeController::class, 'index'])->name('home');
