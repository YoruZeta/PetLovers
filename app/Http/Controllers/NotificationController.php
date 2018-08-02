<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Interaction;
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
            $me = Auth::user()->id;
            $pets = Pet::where('humano_id',$me)->get();
            $myPetsIds = $pets->pluck('id');
            $hasLike = Interaction::where('is_like',true)
            ->whereIn('pet_id',$myPetsIds)->get();
            return view ('Notification')->with('notifications', $hasLike);
        }else{
            return view ('welcome');
        }
    }

    public function profile($id)
    {
        //Realiza un check si esta ingresado el ususario
        if (Auth::check()){
            //Listado de notificaciones hacia este usuario.
            $profile = Pet::where('humano_id',$id)->get();
            return view ('Profile')->with('profile', $profile);
        }else{
            return view ('welcome');
        }
    }
}
