<?php

namespace App\Http\Controllers;

use App\Models\Dependencia;
use Illuminate\Http\Request;

use DB;

class DependenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        

    
        $dependencias = DB::table('dependencias')->select('dependencias.id_dependencias','dependencias.costo_interno','dependencias.costo_externo','dependencias.total','dependencias.dependencia','dependencias.desempeño','unidad.id_unidad AS IdUnidad','unidad.nombre_representante AS NombreFinca')
        ->join('unidad','unidad.id_unidad','=','dependencias.id_unidad')//relacion 1.tabla relacionda  2. relacion PK 3. = Comparcion 4.tabla  & identificacion FK
        ->get();
        return view('dependencias.index', ['dependencias' => $dependencias]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ListaUnidad = DB::table('unidad')->select('id_unidad','nombre_representante','nombre_finca','vereda','celular','ingresos','Egresos')->get();
        return view('dependencias.create', ['ListaUnidad' => $ListaUnidad]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dependencias = new Dependencia();

        $interno= request('costo_interno');
        $externo= request('costo_externo');


        $total= $interno+$externo;

        $dependencia=$externo/$total;

        $partici= $dependencia*100;


    
    if($partici<20){
        $desemp=5;
    }elseif ($partici<40){
        $desemp=4;
    }elseif($partici<60){
        $desemp=3;
    }elseif($partici<80){
        $desemp=2;
    }elseif($partici>=80){
        $desemp=1;
    }


       
        $dependencias->costo_interno = request('costo_interno');
        $dependencias->costo_externo = request('costo_externo');
        $dependencias->total =$total;
        $dependencias->dependencia = $partici;

        $dependencias->desempeño = $desemp;

        $dependencias->id_unidad = request('id_unidad');

        $dependencias->save();

        ///SI QUEREMOS QUE NOS RETORNE EL BOTON GUARDAR 


        return redirect('/dependencias');


    }

 
    public function show(Dependencia $dependencia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dependencia  $dependencia
     * @return \Illuminate\Http\Response
     */
    public function edit(Dependencia $dependencia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Dependencia  $dependencia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dependencia $dependencia)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dependencia  $dependencia
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dependencia $dependencia)
    {
        //
    }
}
