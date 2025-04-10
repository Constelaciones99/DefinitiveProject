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
    font-family: subtitulos;
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

#btn_create {
    background: transparent;
    border: 2px #E07F84 solid;
    color: #E07F84;
    transition: all .2s;
}

#btn_create:hover {
    background: #E07F84;
    color: #fff;
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
        </style>
@endsection

@section('body')
<row class="row">
    <div class="col-12 px-5 pt-4 mt-0 bg-white rounded-4 shadow" id="very-card">
        <div class="row">
            <div class="col-12 card border-0" style="width: 18em;">
                <img src="{{ asset('img/responsabilidad.png') }}" class="card-img-top">
                <div class="card-body" id="description">
                    <h5 class="card-title" id="title">Cuenta Pública</h5>
                    <hr>
                    <form action="#">

                        <div class="input-group has-validation mb-1">
                            <span class="input-group-text" id="validationTooltipUsernamePrepend">🙋🏻‍♂️</span>
                            <input type="text" class="form-control" id="validationTooltipUsername"
                                aria-describedby="validationTooltipUsernamePrepend" v-model="user" name="user" placeholder="/Nombre de Usuario"
                                required>
                            <div class="invalid-tooltip">
                                Please choose a unique and valid username.
                            </div>
                        </div>

                        <div class="input-group has-validation">
                            <span class="input-group-text" id="validationTooltipUsernamePrepend">🔑</span>
                            <input type="password" class="form-control" name="pass"
                                aria-describedby="validationTooltipUsernamePrepend" v-model="pass" placeholder="/Clave secreta"
                                required>
                            <div class="invalid-tooltip">
                                Please choose a unique and valid username.
                            </div>
                        </div>
                        <br>
                            <a href="/logeo" class="btn" id="btn_create">Crear Cuenta+</a>
                            <input type="button" value="Ingresar" class="btn" id="submit">
                    </form>
                    <hr>
                    <p class="card-text">
                        📚 Lee y descubre <br>
                        ☕︎ Crea y mejora <br>
                        🗣️ Conectate con la comunidad <br>
                        🤝 Disfruta y comparte
                    </p>
                    <hr>
                        <a href="/landing" class="btn btn-primary" id="btn_regresar"> Come Back </a>
                    <hr>
                    <span class="text-center mt-5 ms-5" id="logo">Stringify</span>
                </div>
            </div>
        </div>
    </div>
</row>
@endsection
