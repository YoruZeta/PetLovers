@extends('layouts.app')

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
        <li><a href="{{ URL::to('Like') }}">Likes</a>
    </ul>
</nav>

<h1>Ingresar Perro! :D</h1>

<!-- if there are creation errors, they will show here -->
{{ Html::ul($errors->all()) }}

{{ Form::open(array('url' => 'Perros')) }}

    <!--
    <div class="form-group">
        {{ Form::label('Humano', 'Humano') }}
        {{ Form::text('Humano', Input::old('Humano'), array('class' => 'form-control')) }}
    </div>
    -->

    <div class="form-group">
        {{ Form::label('nombre', 'nombre') }}
        {{ Form::text('nombre', Input::old('nombre'), array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('edad', 'edad') }}
        {{ Form::text('edad', Input::old('edad'), array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('sexo', 'sexo') }}
        {{ Form::select('sexo', array('Desconocido' => 'Seleccione sexo', 'Femenino' => 'Femenino', 'Masculino' => 'Masculino'), Input::old('sexo'), array('class' => 'form-control')) }}
    </div>

   <div class="form-group">
        {{ Form::label('tamaño', 'tamaño') }}
        {{ Form::select('tamaño', array('Desconocido' => 'Seleccione tamaño', 'Pequeño' => 'Pequeño', 'Mediano' => 'Mediano', 'Grande' => 'Grande'), Input::old('tamaño'), array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('foto', 'foto') }}
        {{ Form::text('foto', Input::old('foto'), array('class' => 'form-control')) }}
    </div>

    {{ Form::submit('Crearlo!', array('class' => 'btn btn-primary')) }}


{{ Form::close() }}

@endsection