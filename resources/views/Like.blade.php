@extends('layouts.app')
@section('content')
@if(count($like)==0)
<h2>No tiene notificaciones aún<h2>
@else
<h1>Historial</h1>
<hr>
  @foreach($like as $like)
      <div class="alert alert-info alert-dismissable">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          Has dado

          @if($like->is_like=1)
          patita
          @else
          dislike
          @endif

          a {{ $like->pet->nombre}}
          que tiene a {{ $like->pet->owner->name}} como dueño.
          </a>
      </div>
   @endforeach
  @endif
@endsection
