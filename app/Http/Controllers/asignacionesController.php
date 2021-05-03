<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vacunatorio;
use App\Models\User;
use App\Models\Enfermero;
use App\Models\Asignacion;
use App\Http\Requests\guardarAsignacionRequest;
use App\Http\Requests\editarAsignacionRequest;

class asignacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        $vacunatorios = Vacunatorio::all();
        $asignaciones = Asignacion::all();

        return view('asignaciones.index', compact('users', 'vacunatorios', 'asignaciones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (auth()->user()->role == 'admin') {
            $users = User::all();
            $vacunatorios = Vacunatorio::all();
            return view('asignaciones.create', compact('users', 'vacunatorios'));
        } else {
            return redirect('/error-rol');
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
        if (auth()->user()->role == 'admin') {
            $asignacion = New Asignacion();
            $asignacion->user_id = $request->input('user_id');
            $asignacion->vacunatorio_id = $request->input('vacunatorio_id');
            $asignacion->save();

            return redirect()->route('asignaciones.index');
        } else {
            return redirect('/error-rol');
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
        if (auth()->user()->role == 'admin') {
            $vacunatorios = Vacunatorio::all();
            $users = User::all();
            $asignacion = Asignacion::findOrFail($id);

            return view('asignaciones.edit', compact('vacunatorios','users', 'asignacion'));
        } else {
            return redirect('/error-rol');
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
        if (auth()->user()->role == 'admin') {

            $asignacion = Asignacion::findOrFail($id);
            $asignacion->user_id = $request->input('user_id');
            $asignacion->vacunatorio_id = $request->input('vacunatorio_id');
            $asignacion->save();

            return redirect()->route('asignaciones.index');
        } else {
            return redirect('/error-rol');
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
        if (auth()->user()->role == 'admin') {
            $asignacion = Asignacion::findOrFail($id);

            $asignacion->delete();

            return redirect()->route('asignaciones.index');
        } else {
            return redirect('/error-rol');
        }
    }
}
