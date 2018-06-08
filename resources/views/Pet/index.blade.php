@extends('layouts.app')
@section('content')
<h1>Todas tus mascotas</h1>
@if (Session::has('message'))
    <div class="alert alert-info alert-dismissable">{{ Session::get('message') }}
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    </div>

@endif
@if(count($pet)==0)
<center><h2>Ingresa mascotas en la opción "Ingresar mascota en el menú"<h2></center>
@else
      <div class="row">
      @foreach($pet as $key => $value)
      <div class="col-md-4">
      <div class="card" >
        <img class="card-img-top" src="{{ url($value->foto) }}" alt="Card image cap">
        <div class="card-body" style="text-align:center">
          <h5 class="card-title">{{ $value->nombre }} ({{ $value->edad }} años)</h5>
          <p class="card-text">{{ $value->raza }}, {{ $value->sexo }}</p>
          <a class="btn btn-small btn-success" href="{{ URL::to('Pet/' . $value->id) }}">
               <i class="fas fa-eye"></i>
          </a>
          <a class="btn btn-small btn-info" href="{{ URL::to('Pet/' . $value->id . '/edit') }}">
              <i class="fas fa-pencil-alt"></i>
          </a>
          {{ Form::open(array('url' => 'Pet/' . $value->id, 'style' => 'display: inline-block;')) }}
           {{ Form::hidden('_method', 'DELETE') }}
           <!--{{ Form::submit('Eliminar', array('class' => 'btn btn-warning')) }}-->
           {{Form::button('<i class="fas fa-trash"></i>', array('type' => 'submit', 'class' => 'btn btn-warning'))}}
          {{ Form::close() }}
        </div>
      </div>

  </div>
      @endforeach
      </div>

@endif
@endsection
