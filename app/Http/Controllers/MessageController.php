<?php

namespace App\Http\Controllers;

use App\Events\MessageSendEvent;
use Illuminate\Http\Request;
use App\Message;
use Auth;

class MessageController extends Controller
{
    public function chat(){
      return view('messages.chat');
    }
    public function fetch(){
      return Message::with('user')->get();
    }

    public function sendMessage(Request $request){
      $user = Auth::user();

      $message = Message::create([
        'message' => $request->message,
        'user_id' => Auth::user()->id
      ]);

      broadcast(new MessageSendEvent($user,$message))->toOthers();
    }
}
