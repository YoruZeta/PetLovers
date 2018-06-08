@extends('layouts.app')
@section('content')
@if(count($notifications)==0)
<center><h2>No tiene notificaciones aún<h2></center>
@else
<h1>Notificaciones</h1>
<hr>
  @foreach($notifications as $notification)
              <div class="alert alert-info alert-dismissable">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  El usuario {{ $notification->user->name}}
                  le dió patita a tu mascota {{ $notification->pet->nombre}}
                  </a>
              </div>
   @endforeach
@endif
@endsection
