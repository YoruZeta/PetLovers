@extends('layouts.app')
@section('content')
<h1>Mostrar {{ $pet->name }}</h1>
    <div class="jumbotron text-center">
        <h2>{{ $pet->name }}</h2>
        <p>
            <img class="card-img-top" src="{{ url($pet->foto) }}" alt="Card image cap">
            <strong>Tipo:</strong> {{ $pet->raza }}<br>
            <strong>Nombre:</strong> {{ $pet->nombre }}<br>
            <strong>Edad:</strong> {{ $pet->edad }}<br>
            <strong>Sexo:</strong> {{ $pet->sexo }}<br>
        </p>
    </div>
@endsection
