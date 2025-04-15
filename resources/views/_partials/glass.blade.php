{{--<form method="GET" action="{{ route('buscar') }}">
    <div class="input-group" id="btn-search">
        <button class="btn border-2 border-white text-white dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="bi bi-search"></i>
        </button>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#" onclick="setFilter('autor')">Autor</a></li>
            <li><a class="dropdown-item" href="#" onclick="setFilter('libro')">Libro</a></li>
            <li><a class="dropdown-item" href="#" onclick="setFilter('persona')">Persona</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#" onclick="setFilter('otros')">Otros</a></li>
        </ul>

        <input type="hidden" name="filter" id="filter" value="">
        <input type="text" name="query" class="form-control" placeholder="Busca autor, persona, libro, etc">
        <input type="submit" class="btn border border-dark" value="BUSCAR">
    </div>
</form> --}}

<form method="GET" action="{{ route('buscar') }}">
    <div class="input-group" id="btn-search">
        {{-- Dropdown del filtro --}}
        <select name="filtro" class="form-select border-2 border-white text-white bg-dark" style="max-width: 200px;">
            <option value="">Todos</option>
            <option value="autor">Autor</option>
            <option value="libro">Libro</option>
            <option value="publicacion">Publicación</option>
            <option value="consejo">Consejo</option>
            <option value="username">Username</option>
            <option value="name">Nombre</option>
            <option value="correo">Correo</option>
        </select>

        {{-- Campo de búsqueda --}}
        <input type="text" name="busqueda" class="form-control" id="place"
               placeholder="/Busca autor, persona, libro, etc" aria-label="Text input with dropdown button" required>

        {{-- Botón de enviar --}}
        <input type="submit" class="btn border border-dark text-white bg-primary" value="BUSCAR">
    </div>
</form>


@if(request()->has('tipo'))
    <div class="resultados mt-4">
        @if(in_array(request('tipo'), ['autor', 'libro', 'publicacion', 'consejo']))
            {{-- Card tipo publicación --}}
            @forelse($publicaciones as $post)
                @php
                    $define = json_decode($post->define, true);
                @endphp

                {{-- Card tipo publicación --}}
<div class="card mb-3 shadow" style="cursor: pointer;" onclick="window.location.href='{{ route('autor.detalle', ['id' => $post->id_post]) }}'">
    <div class="card-body">
        <h5 class="card-title">
            @if(isset($define['autor']))
                @{{ $define['autor'] }}
            @endif
            {{ $define['titulo'] ?? 'Sin título' }}
        </h5>

        <h6 class="card-subtitle mb-2 text-muted" style="font-size: 0.8rem;">
            {{ \Carbon\Carbon::parse($post->datec)->diffForHumans() }}
        </h6>

        <p class="card-text">
            {{ \Illuminate\Support\Str::words($define['escrito'] ?? '', 40, '...') }}
        </p>

        <a href="{{ route('autor.detalle', ['id' => $post->id_post]) }}" class="card-link">...ver más</a>
    </div>
</div>

            @empty
                <p>No se encontraron publicaciones.</p>
            @endforelse

        @elseif(in_array(request('tipo'), ['username', 'name', 'correo']))
            {{-- Card tipo perfil --}}
            @forelse($usuarios as $user)
                {{-- Card tipo perfil --}}
<div class="card mb-3 shadow d-flex flex-row" style="cursor: pointer;" onclick="window.location.href='{{ route('usuario.detalle', ['id' => $user->id]) }}'">
    <div style="width: 36%;">
        <img src="{{ asset($user->photo ?? 'img/default.jpg') }}" class="img-fluid rounded-start h-100 w-100 object-fit-cover" alt="Foto de perfil">
    </div>
    <div class="card-body">
        <h5 class="card-title">{{ $user->name }}</h5>
        <h6 class="card-subtitle mb-2 text-muted">@{{ $user->username }}</h6>
        <p class="card-text">{{ $user->publicaciones_count ?? 0 }} publicaciones</p>
        <a href="{{ route('usuario.detalle', ['id' => $user->id]) }}" class="card-link">Ver perfil</a>
    </div>
</div>
            @empty
                <p>No se encontraron usuarios.</p>
            @endforelse
        @endif
    </div>
@endif




<script>
    function setFilter(value) {
        document.getElementById('filter').value = value;
    }
</script>
