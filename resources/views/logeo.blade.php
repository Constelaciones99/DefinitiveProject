@extends('layouts.esquema')

@section('style')
    <style>

@font-face {
  font-family: logo;
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

#title {
    font-family: logo;
    font-size: 2.6em;
    color: #E07F84;
    scale: 1.3;
}

#description {
    font-family: narracion;
}

body {
    background: #ccc;
}

#very-card {
    font-family: logo;
}


input,
p,
a {
    font-size: 1.1em;
}

.flagticon{
    background-size: cover;
    width:2.5em;
    border-radius: .2em;
    margin:0;

}


#btn_create {
    background: #7FB2F9;
    color: #fff;
    border: 2px solid #7FB2F9
}

#submit {
    background: #7FB2F9;
    color: #fff;
    border: 2px solid #7FB2F9
}

#btn_regresar {
    background: #E07F84;
    border: 2px #E07F84 solid;
}


#logo {
    font-family: logo;
    font-size: 3em;
    color: #E07F84;
}

svg {
    color: #E07F84;
}

.paddington {
    padding: 0em .3em
}

.junior img {
    background-size: cover;
    width: 2em;
    border-radius: .2em;
    margin: 0
}

        </style>
@endsection

@section('body')
    <div class="row">
        <div class="col-12 mt-0 px-5 bg-white rounded-4 shadow" id="very-card">

            <div class="row">
                <div class="col-12 card border-0 mt-0" style="width: 19em;">
                    <div class="card-body" id="description">

                        <h5 class="card-title text-center mt-3 mb-5" style="scale: 1.8;" id="title">Stringify</h5>

                    <form  onsubmit="prevenir"  class="mt-5" id="form" >

                        <div class="input-group has-validation">
                            <span class="input-group-text" id="validationTooltipUsernamePrepend">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-person-circle" viewBox="0 0 16 16">
                                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                                    <path fill-rule="evenodd"
                                        d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1" />
                                </svg>
                            </span>
                            <input type="text" class="form-control nombres"
                                aria-describedby="validationTooltipUsernamePrepend" v-model="name" name="name" placeholder="Nombres"  required>
                        </div>

                        <div class="input-group has-validation mt-1">
                            <span class="input-group-text" id="validationTooltipUsernamePrepend">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-person-vcard" viewBox="0 0 16 16">
                                    <path
                                        d="M5 8a2 2 0 1 0 0-4 2 2 0 0 0 0 4m4-2.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5M9 8a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4A.5.5 0 0 1 9 8m1 2.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5" />
                                    <path
                                        d="M2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2zM1 4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H8.96q.04-.245.04-.5C9 10.567 7.21 9 5 9c-2.086 0-3.8 1.398-3.984 3.181A1 1 0 0 1 1 12z" />
                                </svg>
                            </span>
                            <input type="text" class="form-control"
                                aria-describedby="validationTooltipUsernamePrepend" placeholder="Usuario" v-model="nick" name="nick"  required>
                        </div>

                        <div class="input-group has-validation mt-1">
                            <span class="input-group-text" id="validationTooltipUsernamePrepend">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-lock-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2m3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2" />
                                </svg>
                            </span>
                            <input type="password" class="form-control"
                                 placeholder="Clave secreta" v-model="pass" name="pass"
                                 required>
                        </div>


                        <div class="input-group has-validation mt-1">
                            <span class="input-group-text junior" >
                                <img  class="flagticon"/>
                            </span>

                            <select   class="form-control" onclick="mostrarBandera()"
                                aria-describedby="validationTooltipUsernamePrepend">
                                <option value="pais" >País</option>
                                <option>
                                   primera opcion
                                </option>
                            </select>
                        </div>

                        <br>

                        <input type="submit" class="btn" id="btn_create" value="Registrar">
                    </form>

                    <hr>
                    <p class="card-text">
                        ✨ Únete a la comunidad donde la literatura cobra vida.

                        Crea tu cuenta y descubre un mundo donde los libros clásicos se encuentran con la interacción
                        social.
                        Conéctate, debate y sumérgete en las mejores historias de la humanidad. ¡Empieza hoy! 🚀
                    </p>


                    <a href="/landing" class="btn btn-primary" id="btn_regresar"> Come Back </a>

                    <footer
                        class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mt-5 pt-3 pb-1 border-top text-center">
                        <span class="" id="copyright">Copyright&copy; 2025 - Página creada por Carlos A. Herrera Palma -
                            Todos
                            los derechos reservados</span>
                    </footer>

                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
