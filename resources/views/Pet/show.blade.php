@extends('layouts.app')

@section('content')

<h1>Mostrar {{ $pet->name }}</h1>

    <div class="jumbotron text-center">
        <h2>{{ $pet->name }}</h2>
        <p>
            <strong>Tipo:</strong> {{ $pet->raza }}<br>
            <strong>Nombre:</strong> {{ $pet->nombre }}<br>
            <strong>Edad:</strong> {{ $pet->edad }}<br>
            <strong>Sexo:</strong> {{ $pet->sexo }}<br>
            <strong>Foto:</strong> {{ $pet->foto }}<br>

        </p>
    </div>
@endsection
