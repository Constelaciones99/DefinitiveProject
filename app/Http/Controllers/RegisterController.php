<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Models\User;
use App\Models\Follow;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth; // Asegúrate de incluir esto

class RegisterController extends Controller
{

    public function showRegistrationForm()
    {
        return view('logeo'); // Esta es la vista de registro
    }

    public function show()
    {
        return view('logeo');
    }

    public function register(Request $request)
    {
        // Validación de los campos del formulario
        // $request->validate([
        //     'name' => 'required|string|max:255',
        //     'username' => 'required|string|unique:users,username|max:255',
        //     'password' => 'required|string|min:6', // Confirmación de la contraseña
        //     'email' => 'nullable|email',
        //     'country' => 'nullable|string|max:255',
        // ]);
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'username' => 'required|string|min:6|max:255|unique:users,username',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|string|min:8',
            'country' => 'required|string|max:255',
        ]);

        // Si la validación falla, retorna con errores
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }




        // Crear el usuario
        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'email' => $request->email,
            'country' => $request->country,
            'mode' => 1,
            'datec' => now(),
        ]);

        // Crear entrada en la tabla seguidores
        Follow::create([
            'person' => $user->username,
            'mode' => json_encode([
                'seguidores' => [],
                'seguidos' => []
            ]),
        ]);

        // Hacer login automático después del registro
        auth::login($user);

        // Redirigir al usuario a las publicaciones o donde lo desees
        return redirect('/');
    }
}
