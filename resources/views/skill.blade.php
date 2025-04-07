@extends('layouts.html')

@section('style')

@endsection

@section('body')
    <div class="primer">
      <h1>ENTRENAMIENTO CREATIVO</h1> <br>
      <h5>Estadistica:</h5>
        <ul class="list-group">
  <li class="list-group-item d-flex justify-content-between align-items-center">
    Escritura Libre
    <span class="badge text-bg-primary rounded-pill">20</span>
  </li>
  <li class="list-group-item d-flex justify-content-between align-items-center">
    Watch-if
    <span class="badge text-bg-primary rounded-pill">12</span>
  </li>
  <li class="list-group-item d-flex justify-content-between align-items-center">
    Histerias
    <span class="badge text-bg-primary rounded-pill">7</span>
  </li>
  <li class="list-group-item d-flex justify-content-between align-items-center">
    Foto 1
    <span class="badge text-bg-primary rounded-pill">5</span>
  </li>
  <li class="list-group-item d-flex justify-content-between align-items-center">
    Foto 2
    <span class="badge text-bg-primary rounded-pill">5</span>
  </li>
  <li class="list-group-item d-flex justify-content-between align-items-center">
    Notify
    <span class="badge text-bg-primary rounded-pill">10</span>
  </li>
  <li class="list-group-item d-flex justify-content-between align-items-center">
    Vocabulapi
    <span class="badge text-bg-primary rounded-pill">11</span>
  </li>
  <li class="list-group-item d-flex justify-content-between align-items-center">
    Cuentacuentos
    <span class="badge text-bg-primary rounded-pill">7</span>
  </li>
</ul>

<hr>
<br>
      <h5>Recientes:</h5>
<br>
<div class="list-group">
    <a href="#" class="list-group-item list-group-item-action active" aria-current="true">
    <div class="d-flex w-100 justify-content-between flex-grow-1">
      <h5 class="mb-1">La fiesta</h5>
      <small>3 days ago</small>
    </div>
    <p class="mb-1">El 11 de setiembre, y la destruccion del pentagono...
      </p>
    <small>(Watch-if) </small>
    </a>
    <a href="#" class="list-group-item list-group-item-action">
        <div class="d-flex w-100 justify-content-between">
        <h5 class="mb-1">Desaparecidos en Vilcatoma</h5>
        <small class="text-body-secondary">1 days ago</small>
        </div>
        <p class="mb-1">Llamados por el periodista como Los 3 importantes...</p>
        <small class="text-body-secondary">(Notify)</small>
    </a>
    <a href="#" class="list-group-item list-group-item-action">
        <div class="d-flex w-100 justify-content-between">
            <h5 h5 class="mb-1">La Metastasis</h5>
            <small class="text-body-secondary">7 days ago</small>
        </div>
        <p class="mb-1">Abrieron la puerta y no supo como enfrentarse...</p>
        <small class="text-body-secondary">(Cuentacuentos)</small>
        </a>
    </div>
</div>
@endsection
