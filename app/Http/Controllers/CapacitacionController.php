<?php

namespace App\Http\Controllers;

use App\Models\Capacitacion;
use Illuminate\Http\Request;
use DB;

class CapacitacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    
    
        $capacitacion = DB::table('capacitacions')->select('capacitacions.id_capacitacion','capacitacions.capacitacion','capacitacions.desempeño','unidad.id_unidad AS IdUnidad','unidad.nombre_representante AS NombreFinca')
        ->join('unidad','unidad.id_unidad','=','capacitacions.id_unidad')//relacion 1.tabla relacionda  2. relacion PK 3. = Comparcion 4.tabla  & identificacion FK
        ->get();
        return view('capacitacion.index', ['capacitacions' => $capacitacion]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ListaUnidad = DB::table('unidad')->select('id_unidad','nombre_representante','nombre_finca','vereda','celular','ingresos','Egresos')->get();
        return view('capacitacion.create', ['ListaUnidad' => $ListaUnidad]);
    }

    public function store(Request $request)
    {
        $capacitacion = new Capacitacion();


        $partici= request('capacitacion');


 
       if($partici<3){
        $desemp=1;
    }elseif ($partici<5){
        $desemp=2;
    }elseif($partici<7){
        $desemp=3;
    }elseif($partici<10){
        $desemp=4;
    }elseif($partici>=10){
        $desemp=5;
    }


       
        $capacitacion->capacitacion = request('capacitacion');
        $capacitacion->desempeño = $desemp;

        $capacitacion->id_unidad = request('id_unidad');

        $capacitacion->save();

        ///SI QUEREMOS QUE NOS RETORNE EL BOTON GUARDAR 


        return redirect('/capacitacion');




    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Capacitacion  $capacitacion
     * @return \Illuminate\Http\Response
     */
    public function show(Capacitacion $capacitacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Capacitacion  $capacitacion
     * @return \Illuminate\Http\Response
     */
    public function edit(Capacitacion $capacitacion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Capacitacion  $capacitacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Capacitacion $capacitacion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Capacitacion  $capacitacion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Capacitacion $capacitacion)
    {
        //
    }
}
