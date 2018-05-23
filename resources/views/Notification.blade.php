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

<h1>Notificaciones</h1>

<hr>
   
@foreach($notifications as $notifications)
            <div class="alert alert-info alert-dismissable"> 
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>

                El usuario {{ $notifications->Seleccionador }}
                le dió like a tu mascota {{ $notifications->Perro }} 

                </a>
            </div>
 @endforeach
                    

   



@endsection