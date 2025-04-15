<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Publicacion;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{

    // public function search(Request $request)
    // {
    //     $query = $request->input('q');
    //     $filtro = $request->input('filtro');

    //     $resultados = collect(); // ← Esto asegura que $resultados siempre existe

    //     if ($query) {
    //         // Tu lógica de filtrado aquí...
    //         // Por ejemplo:
    //         if ($filtro === 'autor') {
    //             $resultados = Publicacion::whereRaw("LOWER(define) LIKE ?", ['%"titulo"%' . strtolower($query) . '%'])->get();
    //         }
    //         // ... otros filtros ...
    //     }

    //     return view('search', compact('resultados', 'query', 'filtro'));
    // }
}
