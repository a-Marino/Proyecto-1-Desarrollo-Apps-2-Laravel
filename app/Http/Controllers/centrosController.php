<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Centro;
use App\Http\Requests\guardarCentrosRequest;
use App\Http\Requests\editarCentrosRequest;


class centrosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $centros= Centro::all();
        return view('centros.index',compact('centros'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('centros.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(guardarCentrosRequest $request)
    {
        Centro::create($request->validated());

        return redirect()->route('centros.index');
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
        $centro = centro::findOrFail($id);

        return view('centros.edit', compact('centro'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(editarCentrosRequest $request, $id)
    {
        $centro = Centro::findOrFail($id);
        $centro->update($request->validated());

        return redirect()->route('centros.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $centro = centro::findOrFail($id);

        $centro->delete();

        return redirect()->route('centros.index');
    }
}
