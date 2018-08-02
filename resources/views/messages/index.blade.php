@extends('layouts.app')

@section('content')

<h1 class="text-center">Mensajes</h1>

@if(count($matches)==0)
  <center><h2>Pronto existirán mensajes, da "patita" a otros usuarios para hacer match!"<h2></center>
@else
  <list-matches :matches="{{$matches}}"></list-matches>
@endif
@endsection
