@extends('layouts.html')

@section('body')
    <div class="card text-center w-100">
  <div class="card-header">
    <ul class="nav nav-pills card-header-pills">
      <li class="nav-item">
        <a class="nav-link active" href="#">Publico</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Privado</a>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" aria-disabled="true">Solo consejo✨</a>
      </li>
    </ul>
  </div>
  <div class="card-body">
    <span>TITULO:   </span>
    <input class="card-title ms-1" placeholder="AGREGAR TITULO">
    <div class="mb-3">
      <label for="" class="form-label"></label>
      <textarea class="form-control" id="" style="resize:none;" rows="3" placeholder="Agregar Descripcion..."></textarea>
    </div>

    <a href="#" class="btn btn-primary">Publicar</a>
  </div>
</div>
@endsection
