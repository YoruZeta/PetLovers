@extends('layouts.app')

@section('content')

<title>Administración Perruna</title>
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
        <li><a href="{{ URL::to('Like') }}">Likes</a>
    </ul>
</nav>

<h1>Tinder Patitas!</h1>

<!-- Para mostrar mensajes de alerta -->
@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>ID</td>
            <td>Dueño</td>
            <td>Nombre</td>
            <td>Edad</td>
            <td>Sexo</td>
            <td>Tamaño</td>
            <td>Foto</td>
        </tr>
    </thead>
    <tbody>
    @foreach($perros as $key => $value)
        <tr>
            <td>{{ $value->id }}</td>
            <td>{{ $value->Humano }}</td>
            <td>{{ $value->nombre }}</td>
            <td>{{ $value->edad }}</td>
            <td>{{ $value->sexo }}</td>
            <td>{{ $value->tamaño }}</td>
            <td>{{ $value->foto }}</td>

            <!-- Botones de mostrar y editar -->
            <td>           

                <!-- Like 
                <a class="btn btn-small btn-success" href="{{ URL::to('Perros/' . $value->id) }}">Mostrar</a>
                -->
                <a class="btn btn-small btn-success" href="{{ URL::to('Tinder/like/' . $value->id) }}">Like</a>
                <!-- Editar este perro (Usando el método edit encontrado en GET /perros/{id}/edit -->
                <a class="btn btn-small btn-info" href="#">Dislike</a>

            </td>
        </tr>
    @endforeach
    </tbody>
</table>

</div>

@endsection