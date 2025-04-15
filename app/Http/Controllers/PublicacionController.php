<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Publicacion;

class PublicacionController extends Controller
{
    public function ver($id)
    {
        $publicacion = Publicacion::find($id);

        if (!$publicacion) {
            return redirect()->route('buscar')->with('error', 'Publicación no encontrada.');
        }

        return view('ver_publicacion', [
            'publicacion' => $publicacion,
        ]);
    }
}
