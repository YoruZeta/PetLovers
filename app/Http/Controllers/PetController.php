<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pet;
use App\User;
use Session;
use Auth;
use Input;

class PetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      //Realiza un check si esta ingresado el ususario
      //Coje le Id del usuario = Humano en tabla pets
      if (Auth::check()){
          $humanoId = Auth::user()->id;
          $queryBuilder = Pet::where('humano_id',$humanoId);
          $pet = $queryBuilder->get();
          return view ('Pet.index')
          ->with('pet', $pet);
      }else{
          return view ('welcome');
      }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      if (Auth::check()){
         //Carga la creación desde (app/views/pets/create.blade.php)
          return view ('Pet.create');
      }else{
          return view ('welcome');
      }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      if (Auth::check()){
     // Validación de datos de mascota
          $rules = array(
              'raza'          => 'required',
              'nombre'        => 'required',
              'edad'          => 'required|numeric',
              'sexo'          => 'required',
              'foto'          => 'required|file'
          );
          //validamos las reglas con los ingresos
          $validator = validator(Input::all(), $rules);
          // Procesas las validaciones
          if ($validator->fails()) {
              return redirect('Pet/create')
                  ->withErrors($validator)
                  ->withInput();
          } else {
              $photo = $request->file('foto');
              $fileName = Auth::user()->id."_".time().".".$photo->getClientOriginalExtension();
              $photo->move(public_path('/images/pets'),$fileName);
              // store
              $pet = new Pet();
              $pet->humano_id   = Auth::user()->id;
              $pet->raza        = Input::get('raza');
              $pet->nombre      = Input::get('nombre');
              $pet->edad        = Input::get('edad');
              $pet->sexo        = Input::get('sexo');
              $pet->foto        = '/images/pets/'.$fileName;
              $pet->save();
              // redirect
              Session::flash('message', 'Ingreso correcto de su mascota!');
              return redirect('Pet');
          }
       }else{
          return view ('welcome');
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      if (Auth::check()){
          //Obtener a la mascota
          $pet = Pet::find($id);
          //Pasar a la vista a la mascota
          return view ('Pet.show')
              ->with('pet', $pet);
      }
      else{
          return view ('welcome');
      }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      //Función para dirijirnos a editar la mascota seleccionada
      if (Auth::check()){
          // get the mascota
          $pet = Pet::find($id);
          // show the edit form and pass the pets
          return view('Pet.edit')
              ->with('pet', $pet);
      }
      else{
          return view ('welcome');
      }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      //dd("Entro");
      //Solo entra si esta login
      if (Auth::check()){
          //Validamos datos del array traido
          $rules = array(
          'raza'          => 'required',
          'nombre'        => 'required',
          'edad'          => 'required|numeric',
          'sexo'          => 'required'
      );
      $validator = validator(Input::all(), $rules);
      // Proceso de mandar errores

      if ($validator->fails()) {
          return redirect('Pet/' . $id . '/edit')
              ->withErrors($validator)
              ->withInput();
      } else {
          //Vamos ingresando
          $pet = Pet::find($id);
          $photo = $request->file('foto');
          if($photo != null){
          //  dd($photo);
            $fileName = Auth::user()->id."_".time().".".$photo->getClientOriginalExtension();
            $photo->move(public_path('/images/pets'),$fileName);
            $pet->foto        = '/images/pets/'.$fileName;
          }
          $pet->humano_id   = Auth::user()->id;
          $pet->raza        = Input::get('raza');
          $pet->nombre      = Input::get('nombre');
          $pet->edad        = Input::get('edad');
          $pet->sexo        = Input::get('sexo');

          $pet->save();//Guardamos.
          //Mensaje y redirección a pagina default.
          Session::flash('message', 'Actualización correcta de la mascota!');
          return redirect('Pet');
        }
      }
      else{
          return view ('welcome'); //Pagina Default
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      //Solo si estas ingresado puedes eliminarlo.
      if (Auth::check()){
          //Encontrar a la mascota
          $pet = Pet::find($id);
          //Eliminarlo
          $pet->delete();
          // Mandamos mensaje y redirijimos a pagina principal de mascotas
          Session::flash('message', 'Eliminación correcta de la mascota!');
          return redirect('Pet');
      }
      else{
          return view ('welcome'); //Pagina default
      }
    }
}
