<?php

namespace App\Http\Controllers;

use App\Perro;
use Illuminate\Support\Facades\Input;
use Request;
use Session;
use Auth;

class PerroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Realiza un check si esta ingresado el ususario
        //Coje le Id del usuario = Humano en tabla perros
        if (Auth::check()){

            $Humano = Auth::user()->id;
            $perros = Perro::where('Humano',$Humano)->get();
            return view ('Perros.index')
            ->with('perros', $perros);

        }else{

            return view ('welcome');

        }

        //Normal -Como estaba antes
        //$perros = Perro::find($id);

        // Mirar a los perros
        //return view ('Perros.index')
        //    ->with('perros', $perros);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        if (Auth::check()){

            //Carga la creación desde (app/views/perros/create.blade.php)
            return view ('Perros.create');

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
    public function store()
    {
        if (Auth::check()){
       // Validación de datos de perro
            $rules = array(
                'nombre'        => 'required',
                'edad'          => 'required|numeric',
                'sexo'          => 'required',
                'tamaño'        => 'required',
                'foto'          => 'required'
            );
            $validator = validator(Input::all(), $rules);

            // Procesas las validaciones
            if ($validator->fails()) {
                return redirect('Perros/create')
                    ->withErrors($validator)
                    ->withInput();
            } else {
                // store

                $perro = new Perro();
                $perro->Humano      = Auth::user()->id;
                $perro->nombre      = Input::get('nombre');
                $perro->edad        = Input::get('edad');
                $perro->sexo        = Input::get('sexo');
                $perro->tamaño      = Input::get('tamaño');
                $perro->foto        = Input::get('foto');
                $perro->save();

                // redirect
                Session::flash('message', 'Ingreso correcto de su mascota!');
                return redirect('Perros');
            }
         }else{

            return view ('welcome');

        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Perro  $perro
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (Auth::check()){

            //Obtener al perro
            $perro = Perro::find($id);

            //Pasar a la vista al perro
            return view ('Perros.show')
                ->with('perro', $perro);

        }
        else{

            return view ('welcome');

        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Perro  $perro
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //Función para dirijirnos a editar el perro seleccionado

        if (Auth::check()){

            // get the perro
            $perro = Perro::find($id);

            // show the edit form and pass the perro
            return view('Perros.edit')
                ->with('perro', $perro);

        }
        else{

            return view ('welcome');

        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Perro  $perro
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        //Solo entra si esta login
        if (Auth::check()){

            //Validamos datos del array traido
            $rules = array(
            'nombre'        => 'required',
            'edad'          => 'required|numeric',
            'sexo'          => 'required',
            'tamaño'        => 'required',
            'foto'          => 'required'
        );
        $validator = validator(Input::all(), $rules);

        // Proceso de mandar errores

        if ($validator->fails()) {
            return redirect('Perros/' . $id . '/edit')
                ->withErrors($validator)
                ->withInput();
        } else {
            //Vamos ingresando
            $perro = Perro::find($id);
            $perro->Humano      = Auth::user()->id;
            $perro->nombre      = Input::get('nombre');
            $perro->edad        = Input::get('edad');
            $perro->sexo        = Input::get('sexo');
            $perro->tamaño      = Input::get('tamaño');
            $perro->foto        = Input::get('foto');
            $perro->save();//Guardamos.

            //Mensaje y redirección a pagina default.
            Session::flash('message', 'Actualización correcta de perro!');
            return redirect('Perros');
        }

        }
        else{

            return view ('welcome'); //Pagina Default

        }



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Perro  $perro
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Solo si estas ingresado puedes eliminarlo.
        if (Auth::check()){

            //Entoncrear al perro
            $perro = Perro::find($id);
            //Eliminarlo
            $perro->delete();

            // Mandamos mensaje y redirijimos a pagina principal de perros
            Session::flash('message', 'Eliminación correcta de perro!');
            return redirect('Perros');

        }
        else{

            return view ('welcome'); //Pagina default

        }
    }
}
