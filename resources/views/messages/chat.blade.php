@extends('layouts.app')
@section('content')
<div  v-init:chatid="{{$chat}}">
  <message :messages="messages" :other="{{$theOther}}"></message>
  <h5>
    <send-message v-on:messagesend="addMessage" :user="{{Auth::user()}}"></send-message>
  </h5>
</div>
@endsection
