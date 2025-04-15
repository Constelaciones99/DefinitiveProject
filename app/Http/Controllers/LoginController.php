<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('public'); // Cambia esto si tu vista tiene otro nombre o ubicación
    }

    public function login(Request $request)
    {

        $username = $request->input('username');
        $password = $request->input('password');

        // Renombramos para mapear a tus columnas reales en la tabla `users`
        $credentialsMapped = [
            'username' => $username,
            'password' => $password,
        ];

        if (Auth::attempt($credentialsMapped)) {
            Session::put('username', $username); // Guarda el nombre real del usuario
            return redirect()->intended('/');
        }
        // Si falló la autenticación, mostramos error
        return back()->withErrors([
            'login_error' => 'Usuario o contraseña incorrectos.',
        ])->withInput();
    }

    public function logout()
    {
        Auth::logout();
        Session::forget('username'); // asegúrate de limpiar esta variable si la usas
        return redirect('/landing'); // 👈 redirige a la vista que tú quieres
    }

    public function username()
    {
        return 'username'; // no 'email'
    }
}
