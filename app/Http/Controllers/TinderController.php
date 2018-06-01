<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Match;
use App\Pet;
use App\User;
use Session;
use Auth;

class TinderController extends Controller
{
    public function index()
    {
        //Realiza un check si esta ingresado el ususario
        //Se manda la lista de Pets
        if (Auth::check()){
            //Selecciona todos los Pets que no son del dueño
            $humanoId = Auth::user()->id;
            $pet = Pet::where('humano_id', '!=' , $humanoId)->get();;
            //Mirar a los Pets
            return view ('Tinder')->with('pet', $pet);
        }else{
            return view ('welcome');
        }
    }


      public function like($id)
    {
        //Realiza un check si esta ingresado el usuario
        if (Auth::check()){

            //Id del que dio like
            $humanoSeleccionador = Auth::user();
            //Encuentra a las mascota gustada
            $petSeleccionado = Pet::find($id);
            //Nueva notificación con los datos
            $match = Match::where('owner_user_id',$humanoSeleccionador->id)->where('give_user_id',$petSeleccionado->humano_id)->first();
            if($match == null){
              $match = new Match();
                  $match->give_user_id    = $humanoSeleccionador->id;
                  $match->liked_pet_id    = $petSeleccionado->id;
                  $match->owner_user_id   = $petSeleccionado->humano_id;
                  $match->match_pet_id    = null;
                  $match->save();

              //Mensaje de like <3 HAHAHA sabrozo
              Session::flash('message', 'Like registrado!');
              return $this->index();
            }else{
              $match->match_pet_id = $petSeleccionado->id;
              $match->save();
              //Mensaje de si ya se dio like <3 HAHAHA sabrozo
              Session::flash('message', 'Ya le has dado like ha este usuario');
              return $this->index();
            }

        }
        else{

            return view ('welcome');

        }
    }

}
