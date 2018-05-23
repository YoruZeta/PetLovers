<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notification;
use App\Perro;
use App\User;
use Session;
use Auth;


class TinderController extends Controller
{
      
    public function index()
    {
        //Realiza un check si esta ingresado el ususario
        //Se manda la lista de perros
        if (Auth::check()){

            //Normal -Como estaba antes
            //$perros = Perro::all();

            //Selecciona todos los perros que no son del dueño
            $Humano = Auth::user()->id;

            $perros = Perro::where('Humano', '!=' , $Humano)->get();

            //Mirar a los perros
            return view ('Tinder')->with('perros', $perros);

        }else{

            return view ('welcome');

        }    
    }

    
      public function like($id)
    {
        //Realiza un check si esta ingresado el usuario
        if (Auth::check()){

            //El que dio like
            $Id_Humano_seleccionador = Auth::user()->id;
            $Humano_seleccionador_todo = User::find($Id_Humano_seleccionador);
            $Humano_seleccionador =  $Humano_seleccionador_todo->name;
            //Le encuntra al perro con ese id.
            $Perro_todo = Perro::find($id);
            $Nombre_Perro =  $Perro_todo->nombre;
            //Al que le dieron like
            $Humano_seleccionado_id = $Perro_todo->Humano; 
            $Humano_seleccionado_todo = User::find($Humano_seleccionado_id);
            $Humano_seleccionado =  $Humano_seleccionado_todo->name;

            //Nueva notificación con los datos
            $notification = new Notification();
                $notification->Seleccionado   = $Humano_seleccionado;
                $notification->Seleccionador  = $Humano_seleccionador;
                $notification->Perro          = $Nombre_Perro;
                $notification->save();     

            //Mensaje de like <3 HAHAHA sabrozo
            Session::flash('message', 'Like registrado!');
            return $this->index();
        }
        else{
    
            return view ('welcome');

        }  
    }

}
