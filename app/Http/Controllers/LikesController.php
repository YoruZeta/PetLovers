<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
          //Listado de likes que ha dado este usuario.
          $humanoDador = Auth::user()->id;
          $matches = Match::where('give_user_id', $humanoDador)->get();
          //Mirar a las notificaciones
          return view ('Match')->with('matches', $matches);
        }else{

            return view ('welcome');

        }
    }
}
