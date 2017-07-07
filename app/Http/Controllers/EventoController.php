<?php

namespace App\Http\Controllers;

use Response;
use App\User;
use App\Evento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventoController extends Controller
{
  /**
   * Get a validator for an incoming registration request.
   *
   * @param  array  $data
   * @return \Illuminate\Contracts\Validation\Validator
   */
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $id)
    {
        $auth_check = Auth::check() ? 1 : 0;
        return view('evento',['evento' => $id, 'auth_check' => $auth_check]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      return Response::json(Evento::where('estatus','1')
                                  ->where('id',$id)
                                  ->orderBy('fecha_inicio','desc')
                                  ->get());

    }
    /**
     * Search Rif the specified resource.
     *
     * @param  int  $rif
     * @return \Illuminate\Http\Response
     */
    public function searchRif($tipo_rif, $rif)
    {
      $rif = User::where('tipo_rif', $tipo_rif)->where('rif', $rif)->get() ? User::where('tipo_rif', $tipo_rif)->where('rif', $rif)->first() : array('data' => 0);
      return Response::json($rif);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * List the eventos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function listar(Request $request)
    {
      return Response::json(Evento::where('estatus','1')->orderBy('fecha_inicio','desc')->paginate(2));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
