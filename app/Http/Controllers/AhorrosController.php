<?php

namespace App\Http\Controllers;

use App\Models\Ahorros;
use Illuminate\Http\Request;
use DB;

class AhorrosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //



    
        $ahorros = DB::table('ahorros')->select('ahorros.id_ahorros','ahorros.sin_prestamo','ahorros.con_prestamo','ahorros.total','ahorros.costo_cubierto','ahorros.desempeño','unidad.id_unidad AS IdUnidad','unidad.nombre_representante AS NombreFinca')
        ->join('unidad','unidad.id_unidad','=','ahorros.id_unidad')//relacion 1.tabla relacionda  2. relacion PK 3. = Comparcion 4.tabla  & identificacion FK
        ->get();
        return view('ahorros.index', ['ahorros' => $ahorros]);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ListaUnidad = DB::table('unidad')->select('id_unidad','nombre_representante','nombre_finca','vereda','celular','ingresos','Egresos')->get();
        return view('ahorros.create', ['ListaUnidad' => $ListaUnidad]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $ahorros = new Ahorros();


        $egreso =  DB::table('unidad')->select('Egresos')->where('id_unidad','=', request('id_unidad'))->get()->pluck('Egresos');

        $valor_egreso= $egreso[0];


       
        $sin_pres = request('sin_prestamo');
        $con_pres = request('con_prestamo'); 


        $total= $valor_egreso*-1;

        $costo_cubierto=$con_pres/$total;
        


        $partici= $costo_cubierto*100;


    
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


       
        $ahorros->sin_prestamo = request('sin_prestamo');
        $ahorros->con_prestamo = request('con_prestamo');
        $ahorros->total =$total;
        $ahorros->costo_cubierto = $partici;

        $ahorros->desempeño = $desemp;

        $ahorros->id_unidad = request('id_unidad');

        $ahorros->save();

        ///SI QUEREMOS QUE NOS RETORNE EL BOTON GUARDAR 


        return redirect('/ahorros');





        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ahorros  $ahorros
     * @return \Illuminate\Http\Response
     */
    public function show(Ahorros $ahorros)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ahorros  $ahorros
     * @return \Illuminate\Http\Response
     */
    public function edit(Ahorros $ahorros)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ahorros  $ahorros
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ahorros $ahorros)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ahorros  $ahorros
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ahorros $ahorros)
    {
        //
    }
}
