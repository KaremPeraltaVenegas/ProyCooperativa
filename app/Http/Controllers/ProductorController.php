<?php

namespace App\Http\Controllers;

use App\Cooperativa;
use App\Productor;
use Illuminate\Http\Request;

class ProductorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return Productor::all()->load("productor")->load("cooperativa");
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
        return Productor::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Productor  $productor
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $productor =  Productor::find($id)->load("productor")->load("cooperativa");

        if (!$productor) {

            return $this->respondNotFound();
        }

        return $productor;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Productor  $productor
     * @return \Illuminate\Http\Response
     */
    public function edit(Productor $productor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Productor  $productor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Productor $productor)
    {
        //
        $productorUpdated = Productor::find($request->input("id"));

        $productorUpdated->nombre = $request->input("nombre");
        $productorUpdated->apellido = $request->input("apellido");
        $productorUpdated->direccion = $request->input("direccion");
        $productorUpdated->dni = $request->input("dni");
        $productorUpdated->cooperativa_id = $request->input("cooperativa_id");
        $productorUpdated->productors_id = $request->input("productors_id");

        $productorUpdated->save();

        return $productorUpdated;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Productor  $productor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Productor $productor)
    {
        //
    }

    public function getProductoresLideres()
    {
        return Productor::where('productors_id', null)->get();
    }
}
