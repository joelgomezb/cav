<?php

namespace App\Http\Controllers;
use App\Evento;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index']]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $eventos = Evento::where('estatus','1')->orderBy('fecha_inicio','desc')->get();
        return view('welcome')->with('eventos', $eventos);
    }
}
