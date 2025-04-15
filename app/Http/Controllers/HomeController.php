<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use App\Models\Publicacion; // Asegúrate de importar el modelo
use App\Models\User;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function showHome()
    {
        if (Session::has('username')) {
            return view('index');
        } else {
            return view('landing');
        }
    }

    public function index()
    {
        if (!Session::has('username')) {
            return view('landing')->with('error', 'Por favor, regístrate o inicia sesión para continuar.');
        }

        $publicaciones = DB::table('publicaciones')->orderBy('datec', 'desc')->get();
        return view('index', compact('publicaciones'));
    }


    public function search(Request $request)
    {
        $query = strtolower($request->input('busqueda'));
        $filtro = $request->input('filtro');

        // Si se está buscando por campos de usuarios
        if (in_array($filtro, ['username', 'name', 'correo'])) {
            $campo = $filtro === 'correo' ? 'email' : $filtro;
            $resultados = User::where($campo, 'like', '%' . $query . '%')->get();
        }else {
            // Si se busca por publicaciones
            $resultados = Publicacion::query();

            if ($filtro === 'autor') {
                $resultados->whereRaw("LOWER(JSON_UNQUOTE(JSON_EXTRACT(define, '$.autor'))) LIKE ?", ["%$query%"]);
            } elseif ($filtro === 'libro') {
                $resultados->whereRaw("LOWER(JSON_UNQUOTE(JSON_EXTRACT(define, '$.titulo'))) LIKE ?", ["%$query%"]);
            } elseif ($filtro === 'publicacion' || $filtro === 'consejo') {
                $resultados->whereRaw("LOWER(JSON_UNQUOTE(JSON_EXTRACT(define, '$.escrito'))) LIKE ?", ["%$query%"]);
            } else {
                // Búsqueda general en todo el JSON
                $resultados->where('define', 'like', '%' . $query . '%');
            }

            $resultados = $resultados->get();
        }

        // Si no hay resultados
        $mensaje = null;
        if ($resultados->isEmpty()) {
            $mensaje = 'No se encontraron resultados.';
        }

        return view('search', compact('resultados', 'query', 'filtro', 'mensaje'));
    }



    private function mapFiltroTipo($filtro)
    {
        return match ($filtro) {
            'libro' => 0,
            'publicacion' => 1,
            'consejo' => 2,
            'autor' => 3,
            default => 4,
        };
    }
}
