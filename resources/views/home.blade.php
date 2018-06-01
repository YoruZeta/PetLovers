@extends('layouts.app')



@section('content')


<title>Administración Perruna</title>
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
<div><div>
<div class="container">

<nav class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="{{ URL::to('home') }}">Inicio</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('Pet') }}">Mis mascotas</a></li>
        <li><a href="{{ URL::to('Pet/create') }}">Ingresar nueva mascota</a>
        <li><a href="{{ URL::to('Tinder') }}">Tinder!</a>
        <li><a href="{{ URL::to('Notification') }}">Notificaciones</a>
        <li><a href="{{ URL::to('Like') }}">Likes</a>
    </ul>
</nav>

<h1>Bienvenido Usuario</h1>


<h3>
    Bienvenido a la applicación de tinder para tus mascotas!
    Por el momento solo estan habilitados nuestros mejores amigos, los canes. En un parche nuevo tendremos mas mascotas!
</h3>

<center><img src="https://www.mundoPet.net/wp-content/uploads/Nombres-para-Pet.jpg"></center>

</div>

@endsection
