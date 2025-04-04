<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.4/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-DQvkBjpPgn7RC31MCQoOeC9TI2kdqa4+BSgNMNj8v77fdC77Kj5zpWFTJaaAoMbC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
    <title>Logeo</title>
</head>
    <style>


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
<body>
     <div class="container-fluid" id="pagina-central">
        <div class="row d-flex justify-content-center">
            <div class="col-12 col-xl-6 py-5 my-5 px-sm-3 mx-md-3 px-lg-5 px-xl-5 d-flex justify-content-center">
                  @yield('body')
            </div>
        </div>
     </div>
</body>
</html>
