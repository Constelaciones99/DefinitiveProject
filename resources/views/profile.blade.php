@extends('layouts.html')

@section('body')


<div class="container mt-4">

    @if(session('success'))
<div class="alert alert-success alert-dismissible fade show position-fixed top-0 end-0 m-3 shadow" role="alert" style="z-index: 9999;">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>

<script>
    // Ocultar automáticamente después de 4 segundos
    setTimeout(function() {
        var alert = document.querySelector('.alert');
        if (alert) {
            alert.classList.remove('show');
            alert.classList.add('fade');
        }
    }, 4000);
</script>
@endif

    {{-- Sección superior: foto + nombre + logout --}}
    <div class="d-flex justify-content-between align-items-start mb-3">
        <div>
            {{-- <img src="{{ asset($usuario->portrait ?? 'default.png') }}"
                 alt="Foto de perfil" class="rounded-circle shadow"
                 style="width: 130px; height: 130px; object-fit: cover;"> --}}
            @if($usuario->portrait)
                <img src="{{ asset($usuario->portrait) }}" alt="Foto de perfil" class="img-thumbnail rounded-circle" style="width: 120px; height: 120px; object-fit: cover;">
        @else
                <img src="{{ asset('img/avatar.png') }}" alt="Foto por defecto" class="img-thumbnail rounded-circle" style="width: 120px; height: 120px; object-fit: cover;">
            @endif
            <h1 class="mt-2 mb-0">{{ $usuario->name }}</h1>
            <h5 class="text-muted">{{"@". $usuario->username }}</h5>

            @if($descripcion)
    <p class="text-muted">{{ $descripcion }}</p>
@else
    <p class="text-muted">Sin descripción aún.</p>
@endif

        </div>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-sm btn-outline-danger">Cerrar sesión</button>
        </form>
    </div>

    {{-- Estadísticas --}}
    <div class="row text-center mb-4">
        <div class="col-md-4">
            <h5>{{ $seguidores }}</h5><small>Seguidores</small>
        </div>
        <div class="col-md-4">
            <h5>{{ $publicaciones->count() }}</h5><small>Publicaciones</small>
        </div>
        <div class="col-md-4">
            <h5>{{ $seguidos }}</h5><small>Seguidos</small>
        </div>
    </div>


    @if (auth()->user()->username !== $usuario->username)
    <form action="{{ route('seguir.usuario', $usuario->username) }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-primary">
            {{ $yaSigue ? 'Siguiendo' : 'Seguir' }}
        </button>
    </form>
@endif

{{-- @if (auth()->check() && auth()->user()->username !== $usuario->username)
    <form method="POST" action="{{ route('usuario.seguir', $usuario->username) }}">
        @csrf
        <button type="submit" class="btn btn-primary">Seguir</button>
    </form>
@endif --}}

    {{-- Descripción + Botón editar --}}
    <div class="mb-4">
        @php
    $define = json_decode($usuario->define, true);
    $descripcion = $define['descripcion'] ?? 'Sin descripción';
@endphp

<p class="text-muted">Publicaciones: {{ $cantidadPublicaciones }}</p>
        <!-- Botón para abrir el modal -->
<button type="button" class="btn btn-primary btn-block my-3" data-bs-toggle="modal" data-bs-target="#editProfileModal">
    Editar perfil
</button>
    </div>

    {{-- Modal para editar perfil --}}

<!-- Modal -->
<div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="editProfileModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form action="{{ route('usuario.update') }}" method="POST" enctype="multipart/form-data" class="modal-content">
      @csrf
      @method('PUT')
      <div class="modal-header">
        <h5 class="modal-title" id="editProfileModalLabel">Editar Perfil</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">

        <!-- Imagen de perfil -->
        <div class="mb-3 d-flex align-items-center">
          @if ($usuario->portrait)
            <img src="{{ asset($usuario->portrait) }}" alt="Foto de perfil" class="rounded-circle me-3" width="60" height="60">
          @else
            <img src="{{ asset('img/avatar.png') }}" alt="Foto por defecto" class="rounded-circle me-3" width="60" height="60">
          @endif
          <div>
            <input type="file" name="portrait" class="form-control mb-1">
            <button type="submit" name="remove_photo" value="1" class="btn btn-sm btn-outline-danger">Borrar foto</button>
          </div>
        </div>

        <!-- Inputs de datos -->
        <div class="mb-3">
          <label>Nombre</label>
          <input type="text" name="name" class="form-control" value="{{ $usuario->name }}">
        </div>
        <div class="mb-3">
    <label for="descripcion" class="form-label">Descripción</label>
    <textarea class="form-control" id="descripcion" name="descripcion" rows="3">{{ $descripcion ?? '' }}</textarea>
</div>
        <div class="mb-3">
          <label>Correo</label>
          <input type="email" name="email" class="form-control" value="{{ $usuario->email }}">
        </div>
        <div class="mb-3">
    <label for="dateb" class="form-label">Fecha de nacimiento</label>
    <input type="date" class="form-control" id="dateb" name="dateb" value="{{ $usuario->dateb }}">
</div>
        <div class="mb-3">
          <label>País</label>
          <input type="text" name="country" class="form-control" value="{{ $usuario->country }}">
        </div>
        <div class="mb-3">
          <label>Contraseña</label>
          <input type="password" name="password" class="form-control">
        </div>
        <div class="mb-3">
          <label>Visibilidad</label>
          <select name="mode" class="form-select">
            <option value="1" {{ $usuario->mode == '1' ? 'selected' : '' }}>Usuario público</option>
            <option value="0" {{ $usuario->mode == '0' ? 'selected' : '' }}>Usuario anónimo</option>
          </select>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-success">Guardar cambios</button>
      </div>
    </form>
  </div>
</div>

    {{-- Publicaciones del usuario --}}
    <h4 class="mt-5">Mis publicaciones</h4>
    @if($publicaciones->isEmpty())
        <p>No tienes publicaciones aún.</p>
    @else
        @foreach ($publicaciones as $post)
            @php
                $define = json_decode($post->define, true);
                $titulo = $define['titulo'] ?? '';
                $escrito = $define['escrito'] ?? '';
                $tipoMap = ['libro', 'publicacion', 'consejo', 'autor_real', 'otro'];
                $tipo = $tipoMap[$post->type] ?? 'otro';
            @endphp

            <div class="publicacion bg-white p-3 m-3 rounded-4 shadow-sm">
                <h5>{{ $titulo }}</h5>
                <hr>
                <p>{{ $escrito }}</p>
                <hr>
                <p><strong>Tipo:</strong> {{ $tipo }}</p>
                <p><strong>Fecha:</strong> {{ $post->datec }}</p>
                @if ($post->photo)
                    <img src="{{ asset($post->photo) }}" alt="Imagen de la publicación"
                         class="img-fluid mt-2" style="max-width: 300px;">
                @endif
            </div>
        @endforeach
    @endif
</div>
@endsection
