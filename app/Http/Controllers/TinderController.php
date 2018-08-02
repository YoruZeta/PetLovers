<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Match;
use App\Interaction;
use App\Pet;
use App\User;
use Session;
use Auth;

class TinderController extends Controller
{
    public function index(Request $request)
    {
        //Realiza un check si esta ingresado el ususario
        //Se manda la lista de Pets
        if (Auth::check()){
            //Selecciona todos los Pets que no son del dueño
            $humanoId = Auth::user()->id;
            $queryBuilder = Pet::where('humano_id', '!=' , $humanoId)
            ->whereDoesnthave('interactions', function($q) use($humanoId){
              $q->where('user_id',$humanoId);
            });

            if($request->get('search') != null){
              $queryBuilder->where('raza',$request->get('search'));
            }
            $pet = $queryBuilder->get();
            //Mirar a los Pets
            return view ('Tinder')->with('pet', $pet);
        }else{
            return view ('welcome');
        }
    }

    private function interaction($id,$isLike){
          //Id del que dio like
          $me = Auth::user();
          //Encuentra a las mascota gustada
          $petSeleccionado = Pet::find($id);
          //Nueva notificación con los datos
          $interaction = new Interaction();
          $interaction->is_like    = $isLike;
          $interaction->user_id    = $me->id;
          $interaction->pet_id     = $petSeleccionado->id;
          $interaction->save();

          $owner = $petSeleccionado->owner;
          $pets = $me->pets;
          $myPetsIds = $pets->pluck('id');
          $hasMatch = Interaction::where('user_id',$owner->id)
          ->where('is_like',true)
          ->whereIn('pet_id',$myPetsIds)->first();
          if($hasMatch != null && $isLike){
            $checkBefore = Match::where('user_id',$me->id)->where('match_user_id',$owner->id)->first();
            if($checkBefore != null){
              return redirect(route('patitas.index'))->with('message','Ya has hecho match con:'.$owner->name );
            }
            $checkBefore = Match::where('match_user_id',$me->id)->where('user_id',$owner->id)->first();
            if($checkBefore != null){
              return redirect(route('patitas.index'))->with('message','Ya has hecho match con:'.$owner->name );
            }
            $match = new Match();
            $match->user_id = $me->id;
            $match->match_user_id = $owner->id;
            $match->save();
            return redirect(route('patitas.index'))->with('message','Ha hecho match con:'.$owner->name );
          }else{
            return redirect(route('patitas.index'))->with('message','Like registrado!');
          }
    }

    public function like($id)
    {
      return $this->interaction($id,true);
    }

    public function dislike($id)
    {
      return $this->interaction($id,false);
    }

}
