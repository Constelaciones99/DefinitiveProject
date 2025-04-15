@extends('layouts.html')

@section('title', $usuario->name)

@section('body')
<div class="container mt-4">

    {{-- Card de usuario --}}
    <div class="card mb-4">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="{{ asset($usuario->photo ?? 'default.png') }}" alt="Foto perfil" class="img-fluid" style="object-fit: cover; height: 100%;">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h3>{{ $usuario->name }}</h3>
                    <h5 class="text-muted">{{"@".$usuario->username }}</h5>
                    <p><strong>Correo:</strong> {{ $usuario->email }}</p>
                    <p><strong>Publicaciones:</strong> {{ $usuario->publicaciones()->count() }}</p>
                </div>
            </div>
        </div>
    </div>

    {{-- Publicaciones del usuario --}}
    @if($publicaciones->isNotEmpty())
        <h4>Publicaciones recientes</h4>
        @foreach($publicaciones as $pub)
            @php
                $define = json_decode($pub->define, true);
                $titulo = $define['titulo'] ?? 'Sin título';
                $escrito = $define['escrito'] ?? '';
                $fecha = \Carbon\Carbon::parse($pub->datec)->diffForHumans();
            @endphp
            <div class="card mb-3" onclick="window.location='{{ route('ver.publicacion', ['id' => $pub->id_post]) }}'" style="cursor:pointer">
                <div class="card-body">
                    <h5 class="card-title">{{ $titulo }}</h5>
                    <h6 class="card-subtitle mb-2 text-muted">{{ $fecha }}</h6>
                    <p class="card-text">{{ \Illuminate\Support\Str::words($escrito, 40, '...') }}</p>
                    <a href="{{ route('ver.publicacion', ['id' => $pub->id_post]) }}">Ver más</a>
                </div>
            </div>
        @endforeach
    @else
        <p class="text-muted">Este usuario aún no ha publicado nada.</p>
    @endif

</div>
@endsection
