<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notification;
use App\Perro;
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

            //Antes
            //Listado de notificaciones hacia este usuario.
            $Humano_id = Auth::user()->id;
            $Humano_Seleccionador = User::find($Humano_id);
            $Seleccionado =  $Humano_Seleccionador->name;
            $notifications = Notification::where('Seleccionador', $Seleccionado)->get();

            //Mirar a las notificaciones
            return view ('Like')->with('notifications', $notifications);

        }else{

            return view ('welcome');

        }    
    }
}
