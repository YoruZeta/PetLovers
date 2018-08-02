<?php

namespace App\Http\Controllers;

use App\Events\MessageSendEvent;
use Illuminate\Http\Request;
use App\Message;
use App\Match;
use Auth;

class MessageController extends Controller
{

    public function index(){
      $me = Auth::user();
      $matches = Match::where('user_id', $me->id)->orWhere('match_user_id',$me->id)->get();
      return view('messages.index')->with(['matches' => $matches]);
    }
    public function chat($id){
      $match = Match::find($id);
      if($match->user_id == Auth::user()->id){
        $theOther = $match->match;
      }else{
        $theOther = $match->user;
      }
  
      return view('messages.chat')->with(['chat' => $id,"theOther" => $theOther ]);
    }
    public function fetch($id){
      return Message::where('match_id',$id)->with('user')->get();
    }

    public function sendMessage(Request $request,$id){
      $user = Auth::user();

      $message = Message::create([
        'message' => $request->message,
        'match_id' => $id,
        'user_id' => Auth::user()->id
      ]);

      broadcast(new MessageSendEvent($user,$message))->toOthers();
    }
}
