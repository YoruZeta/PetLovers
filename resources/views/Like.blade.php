@extends('layouts.app')
@section('content')
@if(count($like)==0)
<h2><center>No tiene historial aún<center><h2>
@else
<h1>Historial</h1>
<hr>
  @foreach($like as $like)
      <div class="alert alert-primary" role="alert">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          Has dado
          @if(($like->is_like)==1)
            patita
          @else
            dislike
          @endif
          a {{$like->pet->nombre}}.
          Su dueño es el usuario {{ $like->pet->owner->name}} como dueño. Esta acción fue realizada el día {{ $like->created_at }}.
          </a>
      </div>
   @endforeach
  @endif
@endsection
