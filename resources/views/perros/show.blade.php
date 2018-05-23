
@section('content')

<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">

<div>&#160<div>
<div class="container">

<nav class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="{{ URL::to('home') }}">Inicio</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('Perros') }}">Mis perros</a></li>
        <li><a href="{{ URL::to('Perros/create') }}">Ingresar nuevo perro</a>
        <li><a href="{{ URL::to('Tinder') }}">Tinder!</a>
        <li><a href="{{ URL::to('Notification') }}">Notificaciones</a>
    </ul>
</nav>
<h1>Mostrar {{ $perro->name }}</h1>

    <div class="jumbotron text-center">
        <h2>{{ $perro->name }}</h2>
        <p>
            <strong>Nombre:</strong> {{ $perro->nombre }}<br>
            <strong>Edad:</strong> {{ $perro->edad }}<br>
            <strong>Sexo:</strong> {{ $perro->sexo }}<br>
            <strong>Tamaño:</strong> {{ $perro->tamaño }}<br>
            <strong>Foto:</strong> {{ $perro->foto }}<br>

        </p>
    </div>

</div>
</body>
</html>