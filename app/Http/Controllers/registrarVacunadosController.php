<?php

namespace App\Http\Controllers;

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
        $DNI = $request->input('DNI');
        $vacunado = Vacunado::where('DNI', $DNI)->get();
        return view('registrarVacunados.index', compact('vacunado'));
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
        $DNI = $request->input('DNI');
        // return view('registrarVacunados.index');
        //return "$DNI";
        //$vacunas = Vacuna::all();
        $vacunado = Vacunado::where('DNI', $DNI)->get();

        $cant = count($vacunado);

        return view('registrarVacunados.index', compact('vacunado'));

       // return view('registrarVacunados.index', compact(['vacunado'=> $vacunado)]); 

        // if ($vacunado == []) {return 'Error';} else {
        //  return View('admin.user.edit', compact(['data', 'roles']));
       // return $cant;
        //  return view('vacunas.index', compact('vacunado'));
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
