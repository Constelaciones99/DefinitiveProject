@extends('layouts.html')

@section('body')
@php
    $define = json_decode($publicacion->define, true);
    $titulo = $define['titulo'] ?? 'Sin título';
    $escrito = $define['escrito'] ?? 'Sin contenido';
    $fecha = \Carbon\Carbon::parse($publicacion->datec)->diffForHumans();
@endphp

<div class="container mt-4">
    <div class="card shadow">
        <div class="card-body">
            <h2 class="card-title">{{ $titulo }}</h2>
            <h6 class="text-muted mb-2">Publicado por <strong>{{ $publicacion->username }}</strong> - {{ $fecha }}</h6>
            <p class="card-text mt-3" style="white-space: pre-wrap;">{{ $escrito }}</p>

            @if ($publicacion->photo)
                <img src="{{ asset($publicacion->photo) }}" class="img-fluid mt-3 rounded" alt="Imagen de la publicación">
            @endif
        </div>
    </div>
</div>
@endsection
