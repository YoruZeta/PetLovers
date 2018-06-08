@extends('layouts.app')
@section('content')
@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif
@if(count($pet)==0)
  <center><h2>Pronto existirán más mascotas para darles patita!<h2></center>
@else
<h1>Patitas!</h1>
  <table class="table table-striped table-bordered">
      <thead>
          <tr>
              <td>Dueño</td>
              <td>Tipo</td>
              <td>Nombre</td>
              <td>Edad</td>
              <td>Sexo</td>
              <td>Foto</td>
          </tr>
      </thead>
      <tbody>
      @foreach($pet as $key => $value)
          <tr>
              <td>{{ $value->Userid->name }}</td>
              <td>{{ $value->raza }}</td>
              <td>{{ $value->nombre }}</td>
              <td>{{ $value->edad }}</td>
              <td>{{ $value->sexo }}</td>
              <td>{{ $value->foto }}</td>
              <td>
                  <a class="btn btn-small btn-success" href="{{ URL::to('Tinder/like/' . $value->id) }}">Patita</a>
                  <a class="btn btn-small btn-info" href="{{ URL::to('Tinder/dislike/' . $value->id) }}">Dislike</a>
              </td>
          </tr>
      @endforeach
      </tbody>
  </table>
@endif
@endsection
