<?php

// app/Http/Controllers/UserController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Publicacion;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Models\Follow;
//birth
class UserController extends Controller
{
    public function ver($username)
    {
        $usuario = User::where('username', $username)->firstOrFail();
        $publicaciones = Publicacion::where('username', $username)->orderBy('datec', 'desc')->get();

        return view('ver_usuario', compact('usuario', 'publicaciones'));
    }

    public function verUsuario($username)
    {

        $usuario = User::where('username', $username)->firstOrFail();
        $publicaciones = Publicacion::where('username', $username)->orderBy('datec', 'desc')->get();

        $usuario = Auth::user();
        $followAuth = Follow::where('username', $usuario->username)->first();
        $yaSigue = false;

        if ($followAuth && $followAuth->mode) {
            $datos = json_decode($followAuth->mode, true);
            $yaSigue = in_array($username, $datos['seguidos'] ?? []);
        }


        return view('profile', compact('usuario', 'publicaciones', 'yaSigue'));
    }

    public function profile()
    {
        $usuario = Auth::user();
        $username = $usuario->username;
        $define = json_decode($usuario->define, true);
        $descripcion = $define['descripcion'] ?? '';

        // Buscar el registro de seguidores para este usuario
        $follow = Follow::where('person', $username)->first();

        $seguidores = 0;
        $seguidos = 0;

        if ($follow && $follow->mode) {
            $json = json_decode($follow->mode, true);
            $seguidores = isset($json['seguidores']) ? count($json['seguidores']) : 0;
            $seguidos = isset($json['seguidos']) ? count($json['seguidos']) : 0;
        }

        $publicaciones = Publicacion::where('username', $username)->orderBy('datec', 'desc')->get();
        $cantidadPublicaciones = $publicaciones->count();
        return view('profile', compact('usuario', 'publicaciones', 'cantidadPublicaciones', 'seguidores', 'seguidos', 'descripcion'));
    }


    public function update(Request $request)
    {
        $usuario = Auth::user();

        // Validación simple
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $usuario->username . ',username',
            'password' => 'nullable|string|min:6',
            'portrait' => 'nullable|image|max:2048',
            'dateb' => 'nullable|date',
            'country' => 'nullable|string|max:255',
            'mode' => 'in:0,1',
            'descripcion' => 'nullable|string|max:1000',
        ]);

        // Si quiere borrar la foto
        if ($request->has('remove_photo') && $usuario->portrait) {
            if (Storage::exists($usuario->portrait)) {
                Storage::delete($usuario->portrait);
            }
            $usuario->portrait = null;
        }

        // Guardar campos normales
        $usuario->name = $request->name;
        $usuario->email = $request->email;
        $usuario->dateb = $request->dateb;
        $usuario->country = $request->country;
        $usuario->mode = $request->mode;

        // Si sube una nueva foto
        if ($request->hasFile('portrait')) { //storage\app\private\public\images
            $path = $request->file('portrait')->store('images', 'public');
            $usuario->portrait = 'storage/' . $path;
        }

        // Actualizar campos
        $define = json_decode($usuario->define ?? '{}', true);
        $define['descripcion'] = $request->input('descripcion');
        $usuario->define = json_encode($define);
        $usuario->name = $request->name;
        $usuario->email = $request->email;
        $usuario->dateb = $request->dateb;
        $usuario->country = $request->country;
        $usuario->mode = $request->mode;

        // Guardar descripción en el campo JSON `define`
        $define = json_decode($usuario->define, true) ?? [];
        $define['descripcion'] = $request->descripcion;
        $usuario->define = json_encode($define);

        if ($request->password) {
            $usuario->password = Hash::make($request->password);
        }

        $usuario->save();

        return redirect()->back()->with('success', 'Perfil actualizado correctamente.');
    }

    public function seguir($username)
    {
        $authUser = Auth::user();
        if (!$authUser || $authUser->username === $username) {
            return redirect()->back();
        }

        $usuarioVisitado = User::where('username', $username)->firstOrFail();

        $seguido = Follow::where('person', $username)->first();
        $seguidor = Follow::where('person', $authUser->username)->first();

        if (!$seguido || !$seguidor) return redirect()->back()->with('error', 'Error al seguir al usuario.');

        $seguidoMode = json_decode($seguido->mode, true);
        $seguidorMode = json_decode($seguidor->mode, true);

        if (!in_array($authUser->username, $seguidoMode['seguidores'] ?? [])) {
            $seguidoMode['seguidores'][] = $authUser->username;
        }

        if (!in_array($username, $seguidorMode['seguidos'] ?? [])) {
            $seguidorMode['seguidos'][] = $username;
        }

        $seguido->mode = json_encode($seguidoMode);
        $seguido->save();

        $seguidor->mode = json_encode($seguidorMode);
        $seguidor->save();

        return redirect()->back()->with('success', 'Has comenzado a seguir a ' . $username);
    }


}
