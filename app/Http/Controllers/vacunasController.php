<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vacuna;
use App\Http\Requests\guardarVacunasRequest;
use App\Http\Requests\editarVacunasRequest;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class vacunasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vacunas = Vacuna::all();

        return view('vacunas.index', compact('vacunas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (auth()->user()->role == 'admin') {
            return view('vacunas.create');
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
    public function store(guardarVacunasRequest $request)
    {
        if (auth()->user()->role == 'admin') {
            Vacuna::create($request->validated());

            return redirect()->route('vacunas.index');
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
            $vacuna = Vacuna::findOrFail($id);

            return view('vacunas.edit', compact('vacuna'));
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
    public function update(editarVacunasRequest $request, $id)
    {
        if (auth()->user()->role == 'admin') {
            $vacuna = Vacuna::findOrFail($id);
            $vacuna->update($request->validated());

            return redirect()->route('vacunas.index');
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
            $vacuna = Vacuna::findOrFail($id);

            $vacuna->delete();

            return redirect()->route('vacunas.index');
        } else {
            return redirect('/error-rol');
        }
    }

}
