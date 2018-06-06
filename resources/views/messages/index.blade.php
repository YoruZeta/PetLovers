@extends('layouts.app')

@section('content')

<h1 class="text-center">Mensajes</h1>

<table class="table">
  <thead>
    <tr>
      <th>Nombre</th>
      <th>Fecha</th>
    </tr>
  </thead>
  <tbody>
    @foreach($matches as $match)
    <tr>
      @if($match->user_id == Auth::user()->id)
      <td><a href="{{route('messages.chat',$match->id)}}">{{$match->match->name}}</a></td>
      @else
        <td><a href="{{route('messages.chat',$match->id)}}">{{$match->user->name}}</a></td>
      @endif
        <td>{{$match->created_at}}</td>
    </tr>
    @endforeach
  </tbody>
</table>

@endsection
