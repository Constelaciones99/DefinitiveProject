@extends('layouts.html')

@section('body')
<?php
    use Illuminate\Support\Facades\Session;
    $username = Session::get('username');
?>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <h2 class="mb-4 text-center">Crear nueva publicación</h2>

            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data" class="card p-4 shadow-sm rounded">
                @csrf

                <div class="mb-3">
                    <label for="titulo" class="form-label">Título (opcional)</label>
                    <input type="text" name="titulo" class="form-control" id="titulo" placeholder="Título de tu publicación">
                </div>

                <div class="mb-3">
                    <label for="escrito" class="form-label">Contenido</label>
                    <textarea name="escrito" class="form-control" id="escrito" rows="5" placeholder="Escribe tu contenido aquí..." required></textarea>
                </div>

                <div class="mb-3">
                    <label for="type" class="form-label">Tipo de publicación</label>
                    <select name="type" id="type" class="form-select">
                        <option value="libro">Libro</option>
                        <option value="publicacion">Publicación</option>
                        <option value="consejo">Consejo</option>
                        <option value="autor_real">Autor Real</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="photo" class="form-label">Imagen (opcional)</label>
                    <input type="file" name="photo" id="photo" class="form-control">
                </div>

                <button type="submit" class="btn btn-primary w-100">Publicar</button>
            </form>

            <p class="text-center mt-3 text-muted">Estás publicando como: <strong>{{ $username }}</strong></p>

        </div>
    </div>
</div>
@endsection
