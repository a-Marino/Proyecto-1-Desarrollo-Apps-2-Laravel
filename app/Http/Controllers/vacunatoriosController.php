<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Vacunatorio;
use App\Models\Centro;
use App\Models\Medico;
use App\Http\Requests\guardarVacunatoriosRequest;
use App\Http\Requests\editarVacunatoriosRequest;


class vacunatoriosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vacunatorios = Vacunatorio::all();

        return view('vacunatorios.index', compact('vacunatorios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (auth()->user()->role == 'admin') {
            $centros = Centro::all();
            $medicos = Medico::all();

            return view('vacunatorios.create', compact('centros', 'medicos'));
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
    public function store(guardarVacunatoriosRequest  $request)
    {
        if (auth()->user()->role == 'admin') {
            Vacunatorio::create($request->validated());

            return redirect()->route('vacunatorios.index');
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
            $vacunatorio = Vacunatorio::findOrFail($id);
            $centros= Centro::all();
            $medicos= Medico::all();

            return view('vacunatorios.edit', compact('vacunatorio','centros', 'medicos'));
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
    public function update(editarVacunatoriosRequest $request, $id)
    {
        if (auth()->user()->role == 'admin') {
            $vacunatorio = Vacunatorio::findOrFail($id);
            $vacunatorio->update($request->validated());

            return redirect()->route('vacunatorios.index');
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
            $vacunatorio = Vacunatorio::findOrFail($id);

            $vacunatorio->delete();

            return redirect()->route('vacunatorios.index');
        } else {
            return redirect('/error-rol');
        }
    }

/*
    public function datosVacunados(guardarCentrosRequest $request)
    {
        if (auth()->user()->role == 'admin') {
            Centro::create($request->validated());

            return redirect()->route('centros.index');
        } else {
            return redirect('/error-rol');
        }
    }

*/
public function vervacunados($id)
{

    $vacunados = DB::table('dosis')
    ->join('vacunados', 'dosis.DNI', '=', 'vacunados.DNI')
    ->join('users', 'dosis.Id_usuario', '=', 'users.id')
    ->join('enfermeros', 'users.id', '=', 'enfermeros.user_id')
    ->join('vacunas', 'dosis.tipo_vacuna', '=', 'vacunas.id')
    ->where('dosis.Id_vacunatorio', $id)
    ->select('vacunados.DNI AS DOC','vacunados.apelnom AS vacunado_AN','vacunados.grupo_riesgo AS GR','vacunas.nombre AS vacuna','users.apelnom AS enfermero','vacunas.created_at AS aplicacion','enfermeros.telefono AS contacto')
    ->orderBy('DOC','ASC')
    ->orderBy('enfermero','DESC')
    ->get();
     
    return view('vacunatorios.listaVacunados', compact('vacunados','id'));

}

public function buscarVacunatorio()
{
    $vacunatorios = Vacunatorio::all();
    return view('vacunatorios.listaVacunatorio', compact('vacunatorios'));
}

}
