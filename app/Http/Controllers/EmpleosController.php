<?php

namespace App\Http\Controllers;

use App\Models\Empleos;
use DB;
use Illuminate\Http\Request;

class EmpleosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        



        $empleos = DB::table('empleos')->select('empleos.id_empleos','empleos.empleo_familias','empleos.empleo_externos','empleos.total_empleos','empleos.empleoFamiliar','empleos.desempeño','unidad.id_unidad AS IdUnidad','unidad.nombre_representante AS NombreFinca')
        ->join('unidad','unidad.id_unidad','=','empleos.id_unidad')//relacion 1.tabla relacionda  2. relacion PK 3. = Comparcion 4.tabla  & identificacion FK
        ->get();
        return view('empleos.index', ['empleos' => $empleos]);
        
      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    
        $ListaEmpleos = DB::table('unidad')->select('id_unidad','nombre_representante','nombre_finca','vereda','celular','ingresos','Egresos')->get();
        return view('empleos.create', ['ListaEmpleos' => $ListaEmpleos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $empleos = new Empleos();


        $empleo_familias= request('empleo_familias');
        $empleo_externos= request('empleo_externos');


        $totalempleos=$empleo_familias+$empleo_externos;

        $indices=$empleo_familias/$totalempleos;

        $subtotal=$indices*100;




        
 
       if($subtotal<20){
        $desemp=1;
    }elseif ($subtotal<40){
        $desemp=2;
    }elseif($subtotal<60){
        $desemp=3;
    }elseif($subtotal<80){
        $desemp=4;
    }elseif($subtotal>=80){
        $desemp=5;
    }


       
        $empleos->empleo_familias = request('empleo_familias');
        $empleos->empleo_externos = request('empleo_externos');
        $empleos->total_empleos = $totalempleos;
        $empleos->empleoFamiliar = $subtotal;  
        $empleos->desempeño = $desemp;

        $empleos->id_unidad = request('id_unidad');

        $empleos->save();

        ///SI QUEREMOS QUE NOS RETORNE EL BOTON GUARDAR 
        return redirect('/empleos');



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Empleos  $empleos
     * @return \Illuminate\Http\Response
     */
    public function show(Empleos $empleos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Empleos  $empleos
     * @return \Illuminate\Http\Response
     */
    public function edit(Empleos $empleos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Empleos  $empleos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Empleos $empleos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Empleos  $empleos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Empleos $empleos)
    {
        //
    }
}
