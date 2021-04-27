<?php

namespace App\Http\Controllers;

use App\Models\Alimentarias;
use Illuminate\Http\Request;
use DB;

class AlimentariasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    
    
        $alimentarias = DB::table('alimentarias')->select('alimentarias.id_alimentarias','alimentarias.valor_alimentos','alimentarias.no_alimentos','alimentarias.valor','alimentarias.provenientes','alimentarias.desempeño','unidad.id_unidad AS IdUnidad','unidad.nombre_representante AS NombreFinca')
        ->join('unidad','unidad.id_unidad','=','alimentarias.id_unidad')//relacion 1.tabla relacionda  2. relacion PK 3. = Comparcion 4.tabla  & identificacion FK
        ->get();
        return view('alimentarias.index', ['alimentarias' => $alimentarias]);


        
     
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        

        $ListaUnidad = DB::table('unidad')->select('id_unidad','nombre_representante','nombre_finca','vereda','celular','ingresos','Egresos')->get();
        return view('alimentarias.create', ['ListaUnidad' => $ListaUnidad]);




    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    
        
        
        
        $alimentarias = new Alimentarias();



       
        $valor_alimentos = request('valor_alimentos');
        $no_alimentos = request('no_alimentos'); 

        $consumidos= $valor_alimentos+$no_alimentos;


        $costo_cubierto=$valor_alimentos/$consumidos;
        $partici= $costo_cubierto*100;


    
    if($partici<20){
        $desemp=1;
    }elseif ($partici<30){
        $desemp=2;
    }elseif($partici<40){
        $desemp=3;
    }elseif($partici<60){
        $desemp=4;
    }elseif($partici>=60){
        $desemp=5;
    }


       
        $alimentarias->valor_alimentos = request('valor_alimentos');
        $alimentarias->no_alimentos = request('no_alimentos');
        $alimentarias->valor =$consumidos;
        $alimentarias->provenientes = $partici;
        $alimentarias->desempeño = $desemp;

        $alimentarias->id_unidad = request('id_unidad');

        $alimentarias->save();

        ///SI QUEREMOS QUE NOS RETORNE EL BOTON GUARDAR 


        return redirect('/alimentarias');


    }

    public function show(Alimentarias $alimentarias)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Alimentarias  $alimentarias
     * @return \Illuminate\Http\Response
     */
    public function edit(Alimentarias $alimentarias)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Alimentarias  $alimentarias
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Alimentarias $alimentarias)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Alimentarias  $alimentarias
     * @return \Illuminate\Http\Response
     */
    public function destroy(Alimentarias $alimentarias)
    {
        //
    }
}
