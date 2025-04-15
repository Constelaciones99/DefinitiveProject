@extends('layouts.html')

@section('title','Stringify')

@section('body')

<div class="row w-100">
    <div class="col-12">
        {{-- dd --}}
        {{-- FORMULARIO DE BÚSQUEDA --}}
        <form method="GET" action="{{ route('buscar') }}">
            <div class="input-group" id="btn-search">
                <select name="filtro" class="form-select">
                    <option value="">Todos</option>
                    <option value="autor" {{ request('filtro') == 'autor' ? 'selected' : '' }}>Autor</option>
                    <option value="libro" {{ request('filtro') == 'libro' ? 'selected' : '' }}>Libro</option>
                    <option value="publicacion" {{ request('filtro') == 'publicacion' ? 'selected' : '' }}>Publicación</option>
                    <option value="consejo" {{ request('filtro') == 'consejo' ? 'selected' : '' }}>Consejo</option>
                    <option value="username" {{ request('filtro') == 'username' ? 'selected' : '' }}>Username</option>
                    <option value="name" {{ request('filtro') == 'name' ? 'selected' : '' }}>Nombre</option>
                    <option value="correo" {{ request('filtro') == 'correo' ? 'selected' : '' }}>Correo</option>
                </select>
                <input type="text" name="busqueda" class="form-control" placeholder="Busca autor, persona, libro, etc" value="{{ request('busqueda') }}" required>
                <input type="submit" class="btn btn-primary" value="Buscar">
            </div>
        </form>

        {{-- MENSAJE SI NO SE ENCUENTRAN RESULTADOS --}}
        @isset($mensaje)
            <p class="mt-3 text-muted">{{ $mensaje }}</p>
        @endisset

        {{-- RESULTADOS --}}
        @if(isset($resultados) && $resultados->isNotEmpty())
            <div class="row mt-4">
                @foreach ($resultados as $item)
    @php $filtro = $filtro ?? ''; @endphp

    @if (in_array($filtro, ['username', 'name', 'correo']))
        {{-- Card tipo usuario --}}
        <div class="card mb-4" onclick="window.location='{{ route('ver.usuario', ['username' => $item->username]) }}'" style="cursor:pointer">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="{{ asset($item->photo ?? 'default.png') }}" alt="Foto perfil" class="img-fluid h-100" style="object-fit: cover;">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->name }}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">{{ "@".$item->username }}</h6>
                        <p class="card-text">Publicaciones: {{ $item->publicaciones()->count() }}</p>
                        <a href="{{ route('ver.usuario', ['username' => $item->username]) }}">Ver perfil</a>
                    </div>
                </div>
            </div>
        </div>
    @else
        {{-- Card tipo publicación --}}
        @php
            $define = json_decode($item->define, true);
            $titulo = $define['titulo'] ?? 'Sin título';
            $escrito = $define['escrito'] ?? '';
            $autor = $define['autor'] ?? '';
            $fecha = \Carbon\Carbon::parse($item->datec);
            $hace = $fecha->diffForHumans();
        @endphp
        <div class="card mb-4" onclick="window.location='{{ route('ver.publicacion', ['id' => $item->id_post]) }}'" style="cursor:pointer">
            <div class="card-body">
                <h5 class="card-title">
                    {{ $autor ? '@' . $autor . ' - ' : '' }}{{ $titulo }}
                </h5>
                <h6 class="card-subtitle mb-2 text-muted">{{ $hace }}</h6>
                <p class="card-text">
                    {{ \Illuminate\Support\Str::words($escrito, 40, '...') }}
                    <a href="{{ route('ver.publicacion', ['id' => $item->id_post]) }}">ver más</a>
                </p>
            </div>
        </div>
    @endif
@endforeach
            </div>
        @endif

    </div>
</div>

@endsection
