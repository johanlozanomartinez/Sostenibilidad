<?php

namespace App\Http\Controllers;

use App\Models\Riquezas;
use Illuminate\Http\Request;
use DB;

class RiquezasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //




        $riquezas = DB::table('riquezas')->select('riquezas.id_riquezas','riquezas.cantidad','riquezas.abundancia',
        'riquezas.log','riquezas.pi','riquezas.biodiversidad',
        'unidad.id_unidad AS IdUnidad','unidad.nombre_representante AS NombreFinca','especies.id_especies AS IdEspecies',
        'especies.nombre_especies AS Nombreespecies')
        ->join('unidad','unidad.id_unidad','=','riquezas.id_unidad')//relacion 1.tabla relacionda  2. relacion PK 3. = Comparcion 4.tabla  & identificacion FK 
        ->join('especies','especies.id_especies','=','riquezas.id_especies')//relacion 1.tabla relacionda  2. relacion PK 3. = Comparcion 4.tabla  & identificacion FK
        ->get();

        return view('riquezas.index', ['riquezas' => $riquezas]);



    }

    
    public function create()
    {
     
     
        $ListaUnidad = DB::table('unidad')->select('id_unidad','nombre_representante','nombre_finca',
        'vereda','celular','ingresos','Egresos')
        ->get();$especies= DB:: table('especies')->select('id_especies','nombre_especies')
        ->get();

        return view('riquezas.create', ['ListaUnidad' => $ListaUnidad],['especies'=>$especies]);





    }

 
    public function store(Request $request)
    {
        



        $riquezas = new Riquezas();
        $riquezas->cantidad = request('cantidad');

        $Total = DB::table('riquezas')->select(DB::raw('SUM(riquezas.cantidad) AS Sumatoria'))->get()->pluck('Sumatoria')->first();


        $valors= request('valor');
        $text= request('id_caracteristicas');


        
        $var=request('abundancia');
        $resultado= 8;
        //log($var,10.03);

        $pis=2;
        //$variable/log(2);

        $bio=$var*$pis;
        
   
        $riquezas->abundancia = request('cantidad')/$Total[0];
        $riquezas->log = $resultado;
        $riquezas->pi = $pis;
        $riquezas->biodiversidad= $bio;
        $riquezas->id_unidad = request('id_unidad');
        $riquezas->id_especies = request('id_especies');


        $riquezas->save();

        ///SI QUEREMOS QUE NOS RETORNE EL BOTON GUARDAR 
        return redirect('/riquezas');


        

     
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Riquezas  $riquezas
     * @return \Illuminate\Http\Response
     */
    public function show(Riquezas $riquezas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Riquezas  $riquezas
     * @return \Illuminate\Http\Response
     */
    public function edit(Riquezas $riquezas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Riquezas  $riquezas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Riquezas $riquezas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Riquezas  $riquezas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Riquezas $riquezas)
    {
        //
    }
}
