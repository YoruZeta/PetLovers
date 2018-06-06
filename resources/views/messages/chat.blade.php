@extends('layouts.app')

@section('content')
<div  v-init:chatid="{{$chat}}">
  <h1 class="text-center">Mensajeria</h1>
  <!-- Vuejs [componente :atributo=variable] -->
  <message :messages="messages"></message>
  <send-message v-on:messagesend="addMessage" :user="{{Auth::user()}}"></send-message>
</div>
@endsection
