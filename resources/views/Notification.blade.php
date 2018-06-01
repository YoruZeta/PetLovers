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

<h1>Notificaciones</h1>

<hr>

@foreach($notifications as $notification)
            <div class="alert alert-info alert-dismissable">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>

                El usuario {{ $notification->giveUser->name }}
                le dió like a tu mascota {{ $notification->likedPet->nombre }}

                </a>
            </div>
 @endforeach






@endsection
