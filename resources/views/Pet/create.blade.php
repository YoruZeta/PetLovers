@extends('layouts.app')

@section('content')


<h1>Ingresar mascota</h1>

<!-- if there are creation errors, they will show here -->
{{ Html::ul($errors->all()) }}

{{ Form::open(array('url' => 'Pet')) }}

    <div class="form-group">
         {{ Form::label('raza', 'Tipo') }}
         {{ Form::select('raza', array('Desconocido' => 'Seleccione el tipo',
         'Perro' => 'Perro',
         'Gato' => 'Gato',
         'Peces' => 'Peces',
         'Pequeños mamiferos' => 'Pequeños mamiferos',
         'Aves' => 'Aves',
         'Reptiles y anfibios' => 'Reptiles y anfibios'
         ), Input::old('raza'), array('class' => 'form-control')) }}
     </div>

    <div class="form-group">
        {{ Form::label('nombre', 'Nombre') }}
        {{ Form::text('nombre', Input::old('nombre'), array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('edad', 'Edad') }}
        {{ Form::text('edad', Input::old('edad'), array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('sexo', 'Sexo') }}
        {{ Form::select('sexo', array('Desconocido' => 'Seleccione sexo', 'Femenino' => 'Femenino', 'Masculino' => 'Masculino'), Input::old('sexo'), array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('foto', 'Foto') }}
        {{ Form::text('foto', Input::old('foto'), array('class' => 'form-control')) }}
    </div>

    {{ Form::submit('Crearlo!', array('class' => 'btn btn-primary')) }}


{{ Form::close() }}

@endsection
