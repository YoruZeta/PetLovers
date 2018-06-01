@extends('layouts.app')

@section('content')


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
