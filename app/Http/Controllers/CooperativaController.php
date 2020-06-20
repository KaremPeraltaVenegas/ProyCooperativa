<?php

namespace App\Http\Controllers;

use App\Cooperativa;
use Illuminate\Http\Request;

class CooperativaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return Cooperativa::all();
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
        return Cooperativa::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cooperativa  $cooperativa
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $cooperativa =  Cooperativa::find($id);

        if (!$cooperativa) {

            return $this->respondNotFound();
        }

        return $cooperativa;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cooperativa  $cooperativa
     * @return \Illuminate\Http\Response
     */
    public function edit(Cooperativa $cooperativa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cooperativa  $cooperativa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cooperativa $cooperativa)
    {
        $cooperativa = Cooperativa::find($request->input("id"));

        $cooperativa->nombre = $request->input("nombre");
        $cooperativa->fecha_inscripcion = $request->input("fecha_inscripcion");
        $cooperativa->numero_orden = $request->input("numero_orden");
        $cooperativa->save();

        return $cooperativa;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cooperativa  $cooperativa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cooperativa $cooperativa)
    {
        //
    }

    public function reporte()
    {
        return Cooperativa::all()->load("productors");
    }
}
