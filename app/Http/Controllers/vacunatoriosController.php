<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vacunatorio;
use App\Models\Centro;
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

            return view('vacunatorios.create', compact('centros'));
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

            return view('vacunatorios.edit', compact('vacunatorio','centros'));
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
}
