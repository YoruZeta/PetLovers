<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Match;
use App\Pet;
use App\User;
use Session;
use Auth;

class NotificationController extends Controller
{
    //
    public function index()
    {
        //Realiza un check si esta ingresado el ususario
        if (Auth::check()){
            //Listado de notificaciones hacia este usuario.
            $humanoDador = Auth::user()->id;
            $notifications = Match::where('owner_user_id', $humanoDador)->get();
            //Mirar a las notificaciones
            return view ('Notification')->with('notifications', $notifications);
        }else{
            return view ('welcome');
        }
    }
}
