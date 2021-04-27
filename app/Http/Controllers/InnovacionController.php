<?php

namespace App\Http\Controllers;

use App\Models\Innovacion;
use Illuminate\Http\Request;
use DB;

class InnovacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //


        

        $innovacion = DB::table('innovacions')->select('innovacions.id_innovacion','innovacions.practicas','innovacions.desempeño','unidad.id_unidad AS IdUnidad','unidad.nombre_representante AS NombreFinca')
        ->join('unidad','unidad.id_unidad','=','innovacions.id_unidad')//relacion 1.tabla relacionda  2. relacion PK 3. = Comparcion 4.tabla  & identificacion FK
        ->get();
        return view('innovacion.index', ['innovacions' => $innovacion]);






    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ListaUnidad = DB::table('unidad')->select('id_unidad','nombre_representante','nombre_finca','vereda','celular','ingresos','Egresos')->get();
        return view('innovacion.create', ['ListaUnidad' => $ListaUnidad]);
    }

 
    public function store(Request $request)
    {
        $innovacion = new Innovacion();


        $partici= request('practicas');







        
 
       if($partici<1){
        $desemp=1;
    }elseif ($partici<3){
        $desemp=2;
    }elseif($partici<5){
        $desemp=3;
    }elseif($partici<7){
        $desemp=4;
    }elseif($partici>=7){
        $desemp=5;
    }


       
        $innovacion->practicas = request('practicas');
        $innovacion->desempeño = $desemp;

        $innovacion->id_unidad = request('id_unidad');

        $innovacion->save();

        ///SI QUEREMOS QUE NOS RETORNE EL BOTON GUARDAR 
        return redirect('/innovacion');



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Innovacion  $innovacion
     * @return \Illuminate\Http\Response
     */
    public function show(Innovacion $innovacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Innovacion  $innovacion
     * @return \Illuminate\Http\Response
     */
    public function edit(Innovacion $innovacion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Innovacion  $innovacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Innovacion $innovacion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Innovacion  $innovacion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Innovacion $innovacion)
    {
        //
    }
}
