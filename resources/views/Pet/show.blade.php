
@section('content')

<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">

<div><div>
<div class="container">

<nav class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="{{ URL::to('home') }}">Inicio</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('pet') }}">Mis mascotas</a></li>
        <li><a href="{{ URL::to('pet/create') }}">Ingresar nueva mascota</a>
        <li><a href="{{ URL::to('Tinder') }}">Tinder!</a>
        <li><a href="{{ URL::to('Notification') }}">Notificaciones</a>
    </ul>
</nav>
<h1>Mostrar {{ $pet->name }}</h1>

    <div class="jumbotron text-center">
        <h2>{{ $pet->name }}</h2>
        <p>
            <strong>Tipo:</strong> {{ $pet->raza }}<br>
            <strong>Nombre:</strong> {{ $pet->nombre }}<br>
            <strong>Edad:</strong> {{ $pet->edad }}<br>
            <strong>Sexo:</strong> {{ $pet->sexo }}<br>
            <strong>Foto:</strong> {{ $pet->foto }}<br>

        </p>
    </div>

</div>
</body>
</html>
