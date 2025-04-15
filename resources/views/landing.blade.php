@extends('layouts.esquema')

@section('style')
    <style>


@font-face {
  font-family: titulos;
  src: url(fuentes/ledbetter.woff);
}

@font-face {
  font-family: subtitulos;
  src: url(fuentes/Hungtrey_Beatmora.otf);
}

@font-face {
  font-family: narracion;
  src: url(fuentes/Avenis.otf);
}

        body {
  background: #ddd;
}

#pagina {
  /*background:#dde;*/
  /* background: #e2eaf5; */
  background:#eee
}


@keyframes despinte {
  50% {
    color: #ddd;
  }

  75% {
    color: transparent;
  }

  80% {
    color: #ccc;
  }

  95% {
    color: transparent;
    -webkit-text-stroke: .2px #242424;

  }
}


#title {
  font-family: titulos;
  font-size: 6em;
  color: #E07F84;
  scale: 1.1;
  /*text-shadow:-6px -3px 10px #E07F84,
                    6px 3px 10px #7FB2F9;*/

}

#h5 {
  color: #E07F84;
  font-family: subtitulos;
  font-size: 2em;
  /*text-shadow: 0px 5px 5px #fff;*/
}

#cp {
  color: #7FB2F9;
  font-family: subtitulos;
  font-size: 2em;
  /*text-shadow: 0px 5px 5px #fff;*/
}



#narracion {
  font-family: narracion;
  font-size: 1.3rem;
  color: #242424;
}

svg {
  color: #E07F84;
  scale: 2.5;
}

button#narracion {
  color: #eee;
}

#copyright {
  font-size: .75rem;
  font-family: narracion;
  color: #242424;
}

    </style>
@endsection

@section('body')

@php
    header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
    header("Cache-Control: post-check=0, pre-check=0", false);
    header("Pragma: no-cache");
@endphp


    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-9 ms-xxl-5">
        <div class="row">

            <p class="col-10 ms-5 ms-xl-5" id="title">
                <span class="capital">S</span>tringify
            </p>
        <!-- <hr class="text-white mb-0 pb-0 pb-xl-5 mb-xl-5 pt-4 "> -->

            <span>
                @if (session('error'))
                    <p style="color: red;">{{ session('error') }}</p>
                @endif
            </span>

            <div class="col-12 rounded-3 pt-4" id="pagina">

        <!--primera card-->
        <div class="card bg-transparent border-0 ms-3" style="max-width: 38rem;">
          <div class="row g-0">
            <div class="col-md-4">
              <img src="img/atencion-al-cliente.png" class="img-fluid rounded-start ms-5" style="width:9rem; ">
            </div>

            <div class="col-md-8">
              <div class="card-body">
                <h5 class="card-title ms-5" id="h5">Cuenta Pública</h5>
                <div class="card-text w-100 mb-3" id="narracion">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-dot"
                    viewBox="0 0 16 16">
                    <path d="M8 9.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3" />
                  </svg>
                  Bienvenido! 🎙️ Aquí puedes explorar un vasto mundo de libros sin restricciones 💬desde obras de
                  autores reconocidos hasta creaciones originales. Disfrute de miles de títulos, comparte tus
                  propias historias y mejora tus habilidades con nuestros entrenamientos de creatividad✍🏼

                  <!--
        📚 <b>Lee y descubre-</b>
        ☕︎<b>Crea y mejora-</b>
        🗣️<b>Conectate con la comunidad-</b>
        🤝<b>Disfruta y comparte:</b> <br><br>

        ¡Únete y haz que tu voz creativa resuene en esta comunidad de escritores y lectores apasionados!🎨 <br> <br>
        -->
                </div>
                  <a href="/logeo" class="btn text-xxl-start text-end rounded-2"
                    style="background: transparent; color: #E07F84; border:2px solid #E07F84" id="narracion">Crear
                    Cuenta</a>
                  <a href="/public" class="btn ms-2 text-xxl-start text-end rounded-2 text-white"
                    style="background: #E07F84; border: 2px #E07F84 solid;" id="narracion">Iniciar Sesion</a>
              </div>
            </div>
          </div>
        </div>
        <!--fin primera card-->

        <!--segunda card-->
        <div class="card bg-transparent border-0" style="max-width: 38rem; margin-left:3.5rem">
          <div class="row g-0">

            <div class="col-md-4 order-1 order-sm-1 order-md-1 order-lg-2 mt-3">
              <img src="img/datos.png" class="img-fluid rounded-start  mt-5" style="width:9rem;">
            </div>

            <div class="col-md-8 order-2 order-sm-2 order-md-2 order-lg-1">
              <div class="card-body">
                <h5 class="card-title" id="cp">Cuenta Privada</h5>
                <p class="card-text" id="narracion">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-dot"
                    viewBox="0 0 16 16">
                    <path d="M8 9.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3" />
                                </svg>
                  Hey! Explora con discreción! Ten una experiencia reservada🔐 ¡Solo observa, descubre, degusta y
                  decide cuando dar el siguiente paso!
                                </p>
                                <a href="private" class="btn btn-primary ms-5  rounded-2 border-0" id="narracion"
                    style="background:#7FB2F9; border:2px solid #7FB2F9;  color: #eee;">Iniciar Sesion</a>
                            </div>
                        </div>
                    </div>
                </div>
        <!--fin segunda card-->

                <footer class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mt-5 pb-1 border-top text-center">
                <span class="" id="copyright">Copyright&copy; 2025 - Página creada por Carlos A. Herrera Palma - Todos los
                    derechos reservados</span>
                </footer>
            </div>
        </div>
    </div>
    @if(Session::has('username'))
    <script>
        window.location.href = "/";
    </script>
@endif
@endsection
