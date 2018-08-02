@extends('layouts.app')
@section('content')
@if(count($notifications)==0)
<center><h2>No tiene notificaciones aún<h2></center>
@else
<h1>Notificaciones</h1>
<hr>
  @foreach($notifications as $notification)
              <div class="alert alert-primary" role="alert">
                    El usuario
                    <a href="{{ URL::to('Notification/profile/' . $notification->user->id) }}" class="alert-link">
                      {{ $notification->user->name}}
                    </a>
                    le dió patita a tu mascota {{ $notification->pet->nombre}}.
                </div>

   @endforeach
@endif
@endsection
