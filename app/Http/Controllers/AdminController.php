<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    
    
    public function __construct()
    {
        //auth:admin para que los usuarios no puedan ingresar a la seccion de admins
        $this->middleware('auth:admin');
    }
    

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        return view('admins');
    }

}

