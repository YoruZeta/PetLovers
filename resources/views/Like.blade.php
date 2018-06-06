@extends('layouts.app')

@section('content')
<h1>Historial</h1>

<hr>

@foreach($like as $like)
            <div class="alert alert-info alert-dismissable">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>

                Has dado patita al usuario {{ $like->ownerUser->name}}
                con su mascota {{ $like->likedPet->nombre  }}

                </a>
            </div>
 @endforeach






@endsection
