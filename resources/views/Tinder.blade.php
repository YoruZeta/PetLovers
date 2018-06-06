@extends('layouts.app')

@section('content')



<h1>Patitas!</h1>

<!-- Para mostrar mensajes de alerta -->
@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

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

            <!-- Botones de mostrar y editar -->
            <td>

                <!-- Like
                <a class="btn btn-small btn-success" href="{{ URL::to('Pet/' . $value->id) }}">Mostrar</a>
                -->
                <a class="btn btn-small btn-success" href="{{ URL::to('Tinder/like/' . $value->id) }}">Patita</a>
                <!-- Editar este Pet (Usando el método edit encontrado en GET /Pet/{id}/edit -->
                <a class="btn btn-small btn-info" href="#">Dislike</a>

            </td>
        </tr>
    @endforeach
    </tbody>
</table>


@endsection
