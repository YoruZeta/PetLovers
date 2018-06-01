@extends('layouts.app')

@section('content')

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

<h1>Ingresar mascota</h1>

<!-- if there are creation errors, they will show here -->
{{ Html::ul($errors->all()) }}

{{ Form::open(array('url' => 'Pet')) }}

    <div class="form-group">
         {{ Form::label('raza', 'Tipo') }}
         {{ Form::select('raza', array('Desconocido' => 'Seleccione el tipo',
         'Perro' => 'Perro',
         'Gato' => 'Gato',
         'Peces' => 'Peces',
         'Pequeños mamiferos' => 'Pequeños mamiferos',
         'Aves' => 'Aves',
         'Reptiles y anfibios' => 'Reptiles y anfibios'
         ), Input::old('raza'), array('class' => 'form-control')) }}
     </div>

    <div class="form-group">
        {{ Form::label('nombre', 'Nombre') }}
        {{ Form::text('nombre', Input::old('nombre'), array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('edad', 'Edad') }}
        {{ Form::text('edad', Input::old('edad'), array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('sexo', 'Sexo') }}
        {{ Form::select('sexo', array('Desconocido' => 'Seleccione sexo', 'Femenino' => 'Femenino', 'Masculino' => 'Masculino'), Input::old('sexo'), array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('foto', 'Foto') }}
        {{ Form::text('foto', Input::old('foto'), array('class' => 'form-control')) }}
    </div>

    {{ Form::submit('Crearlo!', array('class' => 'btn btn-primary')) }}


{{ Form::close() }}

@endsection
