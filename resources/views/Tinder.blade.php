@extends('layouts.app')
@section('content')
@if (Session::has('message'))
    <div class="alert alert-info alert-dismissable">{{ Session::get('message') }}
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    </div>

@endif
<h1>Patitas!</h1>
      <div>
          <nav class="navbar navbar-expand-lg navbar-light bg-transparent justify-content-end">
            <form class="form-inline my-2 my-lg-0 pull-right" method="GET">
              {{ Form::select('search', array('Desconocido' => 'Seleccione el tipo',
              'Perro' => 'Perro',
              'Gato' => 'Gato',
              'Peces' => 'Peces',
              'Pequeños mamiferos' => 'Pequeños mamiferos',
              'Aves' => 'Aves',
              'Reptiles y anfibios' => 'Reptiles y anfibios'
              ), Input::old('search'), array('class' => 'form-control mr-sm-2')) }}
              <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
            </form>
          </nav>
      </div>
      &nbsp;
      <div>
@if(count($pet)==0)
<center><h2>Pronto existirán más mascotas para darles patita!"<h2></center>
@else
      </div>
      <div class="row">
      @foreach($pet as $key => $value)
      <div class="col-md-4">
      <div class="card" >
        <img class="card-img-top" src="{{ url($value->foto) }}" alt="Card image cap">
        <div class="card-body" style="text-align:center">
          <h5 class="card-title">{{ $value->nombre }} ({{ $value->edad }} años)</h5>
          <p class="card-text">{{ $value->raza }}, {{ $value->sexo }}</p>
          <a class="btn btn-small btn-success" href="{{ URL::to('Tinder/like/' . $value->id) }}">
               <i class="fas fa-paw"></i>
          </a>
          <a class="btn btn-dark" href="{{ URL::to('Tinder/dislike/' . $value->id) }}">
              <i class="fas fa-thumbs-down"></i>
          </a>
        </div>
    </div>
  </div>
      @endforeach
</div>

@endif
@endsection
