<?php

namespace App\Http\Controllers;
use DB; 
use App\Models\Semillas;
use Illuminate\Http\Request;

class SemillasController extends Controller
{
    
    public function index()
    {
    
        
        $semillas = DB::table('semillas')->select('semillas.id_semillas','semillas.semilla_local'
        ,'semillas.semilla_comercial','semillas.total_semillas','semillas.indice_semillas'
        ,'semillas.desempeño','unidad.id_unidad AS IdUnidad','unidad.nombre_representante AS NombreFinca')
        ->join('unidad','unidad.id_unidad','=','semillas.id_unidad')//relacion 1.tabla relacionda  2. relacion PK 3. = Comparcion 4.tabla  & identificacion FK
        ->get();
        return view('semillas.index', ['semillas' => $semillas]);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ListaSemillas = DB::table('unidad')->select('id_unidad','nombre_representante','nombre_finca','vereda','celular','ingresos','Egresos')->get();
        return view('semillas.create', ['ListaSemillas' => $ListaSemillas]);
    }

    
    public function store(Request $request)
    {
        
        $semillas = new Semillas();


        $semilla_local= request('semilla_local');
        $semilla_comercial= request('semilla_comercial');


        $totalsemillas=$semilla_local+$semilla_comercial;

        $indicesemillas=$semilla_local/$semilla_comercial;


        
 
       if($semilla_local<5){
        $desemp=1;
    }elseif ($semilla_local<20){
        $desemp=2;
    }elseif($semilla_local<50){
        $desemp=3;
    }elseif($semilla_local<70){
        $desemp=4;
    }elseif($semilla_local>=70){
        $desemp=5;
    }

        $semillas->semilla_local = request('semilla_local');
        $semillas->semilla_comercial = request('semilla_comercial');
        $semillas->total_semillas = $totalsemillas;
        $semillas->indice_semillas = $indicesemillas;  
        $semillas->desempeño = $desemp;

        $semillas->id_unidad = request('id_unidad');

        $semillas->save();

        ///SI QUEREMOS QUE NOS RETORNE EL BOTON GUARDAR 
        return redirect('/semillas');





    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Semillas  $semillas
     * @return \Illuminate\Http\Response
     */
    public function show(Semillas $semillas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Semillas  $semillas
     * @return \Illuminate\Http\Response
     */
    public function edit(Semillas $semillas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Semillas  $semillas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Semillas $semillas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Semillas  $semillas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Semillas $semillas)
    {
        //
    }
}
