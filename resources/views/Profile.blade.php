@extends('layouts.app')
@section('content')
@if (Session::has('message'))
    <div class="alert alert-info alert-dismissable">{{ Session::get('message') }}
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    </div>

@endif

@if(count($profile)==0)
<center><h2>El usuario no tiene mascotas!"<h2></center>
@else
      </div>
      <div class="row">
      @foreach($profile as $key => $value)
      <div class="col-md-4">
      <div class="card" >
        <img class="card-img-top" src="{{ url($value->foto) }}" alt="Card image cap">
        <div class="card-body" style="text-align:center">
          <h5 class="card-title">{{ $value->nombre }} ({{ $value->edad }} años)</h5>
          <p class="card-text">{{ $value->raza }}, {{ $value->sexo }}</p>
        </div>
    </div>
  </div>
      @endforeach
</div>

@endif
@endsection
