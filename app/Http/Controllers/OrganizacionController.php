<?php

namespace App\Http\Controllers;

use App\Models\Organizacion;
use Illuminate\Http\Request;
use DB;

class OrganizacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        

        $organizacion = DB::table('organizacions')->select('organizacions.id_participacion','organizacions.asociacion_municipio','organizacions.asociacion_participa','organizacions.participacion','organizacions.desempeño','unidad.id_unidad AS IdUnidad','unidad.nombre_representante AS NombreFinca')
        ->join('unidad','unidad.id_unidad','=','organizacions.id_unidad')//relacion 1.tabla relacionda  2. relacion PK 3. = Comparcion 4.tabla  & identificacion FK
        ->get();
        return view('organizacion.index', ['organizacions' => $organizacion]);



     
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ListaUnidad = DB::table('unidad')->select('id_unidad','nombre_representante','nombre_finca','vereda','celular','ingresos','Egresos')->get();
        return view('organizacion.create', ['ListaUnidad' => $ListaUnidad]);



    }

    public function store(Request $request)
    {
    
        $organizacion = new Organizacion();


        $asociacion_municipio= request('asociacion_municipio');
        $asociacion_participa= request('asociacion_participa');



        $int=$asociacion_participa/$asociacion_municipio;
        $partici= $int*100;





        
 
       if($partici<20){
        $desemp=1;
    }elseif ($partici<40){
        $desemp=2;
    }elseif($partici<60){
        $desemp=3;
    }elseif($partici<80){
        $desemp=4;
    }elseif($partici>=80){
        $desemp=5;
    }


       
        $organizacion->asociacion_municipio = request('asociacion_municipio');
        $organizacion->asociacion_participa = request('asociacion_participa');
        $organizacion->participacion = $partici;
        $organizacion->desempeño = $desemp;

        $organizacion->id_unidad = request('id_unidad');

        $organizacion->save();

        ///SI QUEREMOS QUE NOS RETORNE EL BOTON GUARDAR 
        return redirect('/organizacion');

    }

    public function show(Organizacion $organizacion)
    {
        //
    }

    
    public function edit(Organizacion $organizacion)
    {
        //
    }

    public function update(Request $request, Organizacion $organizacion)
    {
        //
    }

    public function destroy(Organizacion $organizacion)
    {
        //
    }
}
