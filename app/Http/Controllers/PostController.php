<?php
namespace App\Http\Controllers;

use App\Models\Publicacion; // Asegúrate de importar el modelo
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{

    public function store(Request $request)
    {

        $username = Session::get('username');
        if (!$username) {
            return redirect()->back()->with('error', 'No hay sesión activa. Por favor inicia sesión.');
        }

        try {

            $username = Session::get('username');
            // Contar publicaciones existentes
            $total = DB::table('publicaciones')->count();

            // Construir ID del post

            // Obtener usuario de la sesión
            $username = Session::get('username');

            // Convertir título y escrito a JSON
            $define = json_encode([
                'titulo' => $request->input('titulo'),
                'escrito' => $request->input('escrito'),
            ]);

            // Mapear opción seleccionada a valor numérico
            $typeOptions = [
                'libro' => 0,
                'publicacion' => 1,
                'consejo' => 2,
                'autor_real' => 3
            ];

            $type = $typeOptions[$request->input('type')] ?? 4;

            // Obtener la fecha actual
            $c = now();

            // Manejar imagen
            $photo = null;
            if ($request->hasFile('photo')) {
                //$photo = base64_encode(file_get_contents($request->file('photo')->getRealPath()));

                // $image = $request->file('photo');
                // $photo = $image->store('public/images'); // Guarda en storage/app/public/images
                // $photo = str_replace('public/', 'storage/', $photo);

                $image = $request->file('photo');

                $imageName = uniqid() . '.' . $image->getClientOriginalExtension();

                $manager = new ImageManager(
                    new \Intervention\Image\Drivers\Gd\Driver()
                );

                $compressedImage = $manager->read($image->getRealPath())
                    ->resize(1200, null)
                    ->toJpeg(75);

                Storage::disk('public')->put('images/' . $imageName, (string) $compressedImage);

                // 🔧 ¡Esta línea es clave!
                $photo = 'storage/images/' . $imageName;
            }

            // Insertar en la base de datos
            DB::table('publicaciones')->insert([
                'username' => $username,
                'id_react' => null,
                'define' => $define,
                'type' => $type,
                'c' => $c,
                'photo' => $photo,
            ]);

            return redirect('/');
        } catch (\Exception $e) {
            return back()->with('error', 'No se pudo guardar la publicación. Error: ' . $e->getMessage());
        }
    }
    public function index()
    {
        // Obtener publicaciones ordenadas por fecha de manera descendente
        $publicaciones = Publicacion::orderBy('c', 'desc')->get(); // Usando Eloquent

        // Pasar las publicaciones a la vista
        return view('index', compact('publicaciones'));
    }
    public function profile()
    {
        $username = Session::get('username'); // Obtener el nombre de usuario de la sesión

        if (!$username) {
            return redirect()->route('login')->with('error', 'No estás logueado.');
        }

        // Obtener las publicaciones del usuario actual usando DB
        $publicaciones = DB::table('publicaciones')
            ->where('username', $username)
            ->orderBy('c', 'desc') // Ordenar por fecha, de más reciente a más antigua
            ->get();

        // Pasar las publicaciones a la vista
        return view('profile', compact('publicaciones'));
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

    public function verPublicacion($id)
    {
        $post = \App\Models\Publicacion::find($id);

        if (!$post) {
            return redirect()->back()->with('error', 'Publicación no encontrada.');
        }

        $define = json_decode($post->define, true);
        return view('ver_publicacion', compact('post', 'define'));
    }
}
