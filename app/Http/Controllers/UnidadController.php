<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Unidad;

class UnidadController extends Controller
{

    public function index()
    {
    
        $unidad = DB::table('unidad')->select('unidad.id_unidad','unidad.nombre_representante','unidad.nombre_finca','unidad.vereda','unidad.celular','unidad.ingresos','unidad.Egresos','municipio.id_municipio','municipio.municipio')
        ->join('municipio','municipio.id_municipio','=','unidad.municipio_id')
        ->get();
        return view('unidad.index', ['unidad' => $unidad]);  

        




    }

   
    public function create()
    {
        $municipio = DB::table('municipio')->select('id_municipio','municipio')->get();
        return view('unidad.create', ['municipio' => $municipio]);  
    }
    
    public function store(Request $request)
    {
        $unidad = new Unidad();
        $unidad->nombre_representante = request('nombre_representante');
        $unidad->nombre_finca = request('nombre_finca');
    //    $unidad->municipio = request('municipio');
        $unidad->vereda = request('vereda');
        $unidad->celular = request('celular');
        $unidad->ingresos = request('ingresos');
        $unidad->Egresos = request('Egresos');


        $unidad->municipio_id = request('municipio_id');
        
        $unidad->save();

        ///SI QUEREMOS QUE NOS RETORNE EL BOTON GUARDAR 
        return redirect('/unidad');

    }

   
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
