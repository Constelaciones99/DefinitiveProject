@extends('layouts.html')

@section('style')
    <style>
        #foto-perfil{
            width: 1.2em;
        }
        </style>
@endsection

@section('body')
     <div class="row">
        <div class="col-12 mb-3 d-flex justify-content-center">
            <div class="card mb-3" style="max-width: 540px;">
  <div class="row g-0">
    <div class="col-md-4">

      <div class="card">
        <div class="card-header ">
          Suscribirse
        </div>
        <div class="card-body">
          <blockquote class="blockquote mb-0">
            <img src="img/avatar.png" class="mb-4" id="foto-perfil">
          <br>
            <footer class="blockquote-footer">Anonimo <cite title="Source Title"></cite></footer>
          </blockquote>
        </div>
      </div>
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">para Principiantes</h5>
        <p class="card-text">Escuchen la musica que les dedicó su ex. Así tendrán más inspiración.</p>
        <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
      </div>
    </div>
  </div>
</div>

        </div>
     </div>
@endsection
