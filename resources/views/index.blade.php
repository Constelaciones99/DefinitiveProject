@extends('layouts.html')
@section('title','Stringify')

@section('body')

<div class="row">

        <div class="container-fluid px-3 mt-4">
    <div class="row">
        @foreach ($publicaciones as $post)
            @php
                $define = json_decode($post->define, true);
                $titulo = $define['titulo'] ?? '';
                $escrito = $define['escrito'] ?? '';
                $tipoMap = ['libro' => 'Libro', 'publicacion' => 'Publicación', 'consejo' => 'Consejo', 'autor_real' => 'Autor Real'];
                $tipo = $tipoMap[$post->type] ?? 'Otro';
            @endphp

            <div class="col-12 mb-4">
                <div class="card shadow-sm border-0 h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between text-muted small mb-2">
                            <span>{{"@". $post->username }}</span>
                            <span>{{ $post->datec }}</span>
                        </div>
                        <h5 class="card-title">{{ $titulo }}</h5>
                        <hr>
                        <p class="card-text">{{ \Illuminate\Support\Str::words($escrito, 40, '...') }}</p>
                        <hr>
                        <p class="text-muted">Tipo: <strong>{{ $tipo }}</strong></p>

                        @if ($post->photo)
                            <div class="text-center mt-3">
                                <img src="{{ asset($post->photo) }}" alt="Imagen de la publicación" class="img-fluid rounded" style="max-height: 300px; object-fit: cover;">
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>



    {{-- @include('_partials.card')
    @include('_partials.card')
    @include('_partials.card')
    @include('_partials.card')
    @include('_partials.card')
    @include('_partials.card') --}}
</div>
@endsection
