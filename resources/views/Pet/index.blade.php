@extends('layouts.app')

@section('content')

<title>Administración Perruna</title>
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">

<div>
  <div>
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

<h1>Todas tus mascotas</h1>

<!-- Para mostrar mensajes de alerta -->
@if (Session::has('message'))
    <div class="alert alert-info alert-dismissable">{{ Session::get('message') }}
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    </div>

@endif

<table class="table table-striped table-bordered">
    <thead>
        <tr>
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
            <td>{{ $value->raza }}</td>
            <td>{{ $value->nombre }}</td>
            <td>{{ $value->edad }}</td>
            <td>{{ $value->sexo }}</td>
            <td>{{ $value->foto }}</td>

            <!-- Botones de mostrar y editar -->


                <!-- Luego hago el botón eliminar -->


                <td>
                <center>
                <!-- Mostrar al Pet (USando el método show encontrado en GET /erros/{id} -->
                <a class="btn btn-small btn-success" href="{{ URL::to('Pet/' . $value->id) }}">
                   <span class="glyphicon glyphicon-eye-open"></span>
                </a>
                </center>
                </td>

                <td>
                <center>
                <!-- Editar este Pet (Usando el método edit encontrado en GET /Pet/{id}/edit -->
                <a class="btn btn-small btn-info" href="{{ URL::to('Pet/' . $value->id . '/edit') }}">
                    <span class="glyphicon glyphicon-pencil"></span>
                </a>
                </center>
                </td>

                <td>
                <center>
                   {{ Form::open(array('url' => 'Pet/' . $value->id, 'class' => 'pull-center')) }}
                    {{ Form::hidden('_method', 'DELETE') }}
                    <!--{{ Form::submit('Eliminar', array('class' => 'btn btn-warning')) }}-->
                    {{Form::button('<i class="glyphicon glyphicon-remove-circle"></i>', array('type' => 'submit', 'class' => 'btn btn-warning'))}}
                {{ Form::close() }}
                </center>
                </td>

        </tr>
    @endforeach
    </tbody>
</table>

</div>

@endsection
