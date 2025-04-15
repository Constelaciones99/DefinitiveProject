 <div class="col-12 mb-3">

        <div class="card mx-1">

            <div class="card-header">
                @if(session('username'))
    <p>Bienvenido, {{ session('username') }}</p>
    <div>(Bandera)
    ¡Bienvenido, {{ Session::get('username') }}!
                </div>
@else
    <p>No estás autenticado.</p>
@endif


            </div>

            <div class="card-body">
                <blockquote class="blockquote mb-0">
                <p>No sé como explicar todo lo que si siento, pero si soy consciente de mis fortaleza. Solo eso me salvó</p>
                <footer class="blockquote-footer">Jean il <cite title="Source Title">, Siete horas</cite></footer>
                </blockquote>
                <br>

                <p class="btn btn-primary">Seguir+</p>
            </div>

        </div>
    </div>
