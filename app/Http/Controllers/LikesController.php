<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Interaction;
use App\Match;
use App\Pet;
use App\User;
use Session;
use Auth;

class LikesController extends Controller
{
    //
    public function index()
    {
        //Realiza un check si esta ingresado el ususario
        //Se manda la lista de notificaciones
        if (Auth::check()){
            //Listado de notificaciones hacia este usuario.
            $me = Auth::user()->id;
            $like = Interaction::where('user_id', $me)->get();
            //Mirar a las notificaciones
            return view ('Like')->with('like', $like);
        }else{
            return view ('welcome');
        }
    }
}
