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

<h1>Tinder Patitas!</h1>

<!-- Para mostrar mensajes de alerta -->
@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>Dueño</td>
            <td>Tipo</td>
            <td>Nombre</td>
            <td>Edad</td>
            <td>Sexo</td>
            <td>Foto</td>
        </tr>
    </thead>
    <tbody>
    @foreach($pet as $key => $value)
        <tr>
            <td>{{ $value->humano_id }}</td>
            <td>{{ $value->raza }}</td>
            <td>{{ $value->nombre }}</td>
            <td>{{ $value->edad }}</td>
            <td>{{ $value->sexo }}</td>
            <td>{{ $value->foto }}</td>

            <!-- Botones de mostrar y editar -->
            <td>

                <!-- Like
                <a class="btn btn-small btn-success" href="{{ URL::to('Pet/' . $value->id) }}">Mostrar</a>
                -->
                <a class="btn btn-small btn-success" href="{{ URL::to('Tinder/like/' . $value->id) }}">Like</a>
                <!-- Editar este Pet (Usando el método edit encontrado en GET /Pet/{id}/edit -->
                <a class="btn btn-small btn-info" href="#">Dislike</a>

            </td>
        </tr>
    @endforeach
    </tbody>
</table>

</div>

@endsection
