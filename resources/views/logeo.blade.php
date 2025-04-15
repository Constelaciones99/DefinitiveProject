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
    font-size: 4em;
    background:#E07F84;/*url('../img/fiodor.jpg')*/
    text-shadow: 5px -2px 1px rgba(0,0,0,.1);
    background-attachment: difference;
    background-repeat: no-repeat;
    -webkit-text-fill-color:transparent;
    -webkit-background-clip:text;
}

@keyframes movtext {
    50%{
        background-position-y:100%;
    }
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
@php
    header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
    header("Cache-Control: post-check=0, pre-check=0", false);
    header("Pragma: no-cache");
@endphp
    <div class="row">
        <div class="col-12 mt-0 px-5 bg-white rounded-4 shadow" id="very-card">

            <div class="row">
                <div class="col-12 card border-0 mt-0" style="width: 19em;">
                    <div class="card-body" id="description">

                        <h5 class="card-title text-center mt-3 mb-5" style="scale: 1.8;" id="title">Stringify</h5>
@if ($errors->any())
    <div class="alert alert-danger mt-2">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
                    <form  class="mt-5" id="form" method="POST" action="{{ route('register') }}">
                            @csrf
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
                                aria-describedby="validationTooltipUsernamePrepend" name="name" placeholder="Nombres"  required>
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
                                aria-describedby="validationTooltipUsernamePrepend" placeholder="Usuario" name="username" required>
                        </div>

                        <div class="input-group has-validation mt-1">
                            <span class="input-group-text" id="validationTooltipUsernamePrepend">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-at-fill" viewBox="0 0 16 16">
  <path d="M2 2A2 2 0 0 0 .05 3.555L8 8.414l7.95-4.859A2 2 0 0 0 14 2zm-2 9.8V4.698l5.803 3.546zm6.761-2.97-6.57 4.026A2 2 0 0 0 2 14h6.256A4.5 4.5 0 0 1 8 12.5a4.49 4.49 0 0 1 1.606-3.446l-.367-.225L8 9.586zM16 9.671V4.697l-5.803 3.546.338.208A4.5 4.5 0 0 1 12.5 8c1.414 0 2.675.652 3.5 1.671"/>
  <path d="M15.834 12.244c0 1.168-.577 2.025-1.587 2.025-.503 0-1.002-.228-1.12-.648h-.043c-.118.416-.543.643-1.015.643-.77 0-1.259-.542-1.259-1.434v-.529c0-.844.481-1.4 1.26-1.4.585 0 .87.333.953.63h.03v-.568h.905v2.19c0 .272.18.42.411.42.315 0 .639-.415.639-1.39v-.118c0-1.277-.95-2.326-2.484-2.326h-.04c-1.582 0-2.64 1.067-2.64 2.724v.157c0 1.867 1.237 2.654 2.57 2.654h.045c.507 0 .935-.07 1.18-.18v.731c-.219.1-.643.175-1.237.175h-.044C10.438 16 9 14.82 9 12.646v-.214C9 10.36 10.421 9 12.485 9h.035c2.12 0 3.314 1.43 3.314 3.034zm-4.04.21v.227c0 .586.227.8.581.8.31 0 .564-.17.564-.743v-.367c0-.516-.275-.708-.572-.708-.346 0-.573.245-.573.791"/>
</svg>
                                    <path
                                        d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2m3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2" />
                                </svg>
                            </span>
                            <input type="email" class="form-control"
                                 placeholder="E-mail" name="email"
                                 required>
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
                                 placeholder="Clave secreta" name="password"
                                 required>
                        </div>


                        <input type="hidden" name="mode" value="1">

                        <div class="input-group has-validation mt-1">
                            <span class="input-group-text junior" >
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-flag-fill" viewBox="0 0 16 16">
  <path d="M14.778.085A.5.5 0 0 1 15 .5V8a.5.5 0 0 1-.314.464L14.5 8l.186.464-.003.001-.006.003-.023.009a12 12 0 0 1-.397.15c-.264.095-.631.223-1.047.35-.816.252-1.879.523-2.71.523-.847 0-1.548-.28-2.158-.525l-.028-.01C7.68 8.71 7.14 8.5 6.5 8.5c-.7 0-1.638.23-2.437.477A20 20 0 0 0 3 9.342V15.5a.5.5 0 0 1-1 0V.5a.5.5 0 0 1 1 0v.282c.226-.079.496-.17.79-.26C4.606.272 5.67 0 6.5 0c.84 0 1.524.277 2.121.519l.043.018C9.286.788 9.828 1 10.5 1c.7 0 1.638-.23 2.437-.477a20 20 0 0 0 1.349-.476l.019-.007.004-.002h.001"/>
</svg>
                            </span>

                            <select   class="form-control" name="country"
                                aria-describedby="validationTooltipUsernamePrepend" id="select-country" name="pais">
                                <option value="pais" selected>País</option>

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
@if(Session::has('username'))
    <script>
        window.location.href = "/";
    </script>
@endif

<script>

    count_select=document.querySelector("#select-country")
    stringify=document.querySelector("#title")

    countries=[]
    pais=[]
    bandera=[]

    async function consultar(){
    axios.get('https://restcountries.com/v3.1/all').then(
          response=>{
                    paises=response.data
                    paises.forEach(country=>{
                        countries.push(country.name.common+"//"+country.flags.png)
                        })
                    countries=countries.sort()

                    countries.forEach(asign=>{
                texto=asign.slice(0,asign.indexOf("//"))
                pais.push(texto)
        bandera.push(asign.slice(asign.indexOf("//")+2))

        opcion=document.createElement("option")
        opcion.textContent=texto
        count_select.appendChild(opcion)


            })
          }).catch(error=>{
                    console.log(error)
            })
    }

    count_select.onchange=evt=>{
        ind=count_select.selectedIndex

        if(ind==0){
    stringify.style.backgroundClip="text"
    stringify.style.webkitTextFillColor="#E07F84"
    stringify.style.animation="none"
        }else{
              stringify.style.background="url("+bandera[ind -1]+")"
    stringify.style.webkitTextFillColor="transparent"

        stringify.style.backgroundClip="text"
        stringify.style.backgroundSize="cover"
        stringify.style.animation="movtext 5s linear infinite"
    }}

//EJECUTAR AL INICIAR LA APP
consultar()
</script>
@endsection
