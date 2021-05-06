<?php

namespace App\Http\Controllers;
use App\Models\Dosis;
use App\Models\Vacuna;
use App\Models\Vacunado;

use Illuminate\Http\Request;

class registrarVacunadosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $vacuna = Vacuna::all();
        $DNI = $request->input('DNI');
        $inicio=1;
        $vacunado = Vacunado::where('DNI', $DNI)->get();
        return view('registrarVacunados.index', compact('vacunado','vacuna','inicio'));
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


    public function buscar(Request $request)
    {
        $vacuna = Vacuna::all();

        $DNI = $request->input('DNI');
        $vacunado = Vacunado::where('DNI', $DNI)->get();

        $cant_vacunados = count($vacunado);

        if ($cant_vacunados==1){

            $dosis= Dosis::where('DNI', $DNI)->get();
            $cant_dosis = count($dosis);

        }        

        return view('registrarVacunados.index', compact('vacunado','dosis','cant_dosis','vacuna'));
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
        //
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
