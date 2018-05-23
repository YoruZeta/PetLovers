<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notification;
use App\Perro;
use App\User;
use Session;
use Auth;

class NotificationController extends Controller
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
            $Humano_Seleccionado = User::find($Humano_id);
            $Seleccionado =  $Humano_Seleccionado->name;
            $notifications = Notification::where('Seleccionado', $Seleccionado)->get();

            //Mirar a las notificaciones
            return view ('Notification')->with('notifications', $notifications);

        }else{

            return view ('welcome');

        }    
    }
}
