<?php

namespace App\Http\Controllers;

use App\Models\Agua;
use Illuminate\Http\Request;
use DB;

class AguaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        



        $agua = DB::table('agua')->select('agua.id_agua','agua.disponibilidad_agua','agua.capacidad_recarga','agua.desempeño_disponibilidad','agua.desempeño_capacidad','agua.promedio_desempeño','unidad.id_unidad AS IdUnidad','unidad.nombre_representante AS NombreFinca')
        ->join('unidad','unidad.id_unidad','=','agua.id_unidad')//relacion 1.tabla relacionda  2. relacion PK 3. = Comparcion 4.tabla  & identificacion FK
        ->get();
        return view('agua.index', ['agua' => $agua]);
    }

 
    public function create()
    {   
        $ListaUnidad = DB::table('unidad')->select('id_unidad','nombre_representante','nombre_finca','vereda','celular')->get();
        return view('agua.create', ['ListaUnidad' => $ListaUnidad]);
    }

   
    public function store(Request $request)
    {

        $agua = new Agua();

        $disponiblidad_agua= request('disponibilidad_agua');
        $capacidad_recarga= request('capacidad_recarga');


        $agua_desempeño= request('promedio_desempeño');





//ingresos 15000000    Egresos 14000000   FN1000000 VPN 843.882 VPN% 7
//DESEMPEÑO DISPONIBILIDAD//
       if($disponiblidad_agua<62){
        $desempeño_disponiblidad=1;
        }elseif ($disponiblidad_agua<125){
            $desempeño_disponiblidad=2;

        }elseif($disponiblidad_agua<187){
            $desempeño_disponiblidad=3;

        }elseif($disponiblidad_agua<250){
            $desempeño_disponiblidad=4;

        }elseif($disponiblidad_agua>=250){
            $desempeño_disponiblidad=5;
        }   


        //DESEMPEÑO CAPACIDAD//
       if($capacidad_recarga<8){
        $agua_capacidad=1;
        
        }elseif ($capacidad_recarga<17){
            $agua_capacidad=2;

        }elseif($capacidad_recarga<25){
          $agua_capacidad=3;
            

        }elseif($capacidad_recarga<35){
            $agua_capacidad=4;

        }elseif($capacidad_recarga>=35){
            $agua_capacidad=5;
        }   


        $promedio=$desempeño_disponiblidad+$agua_capacidad;
        $result_promedio=$promedio/2;

        $agua->disponibilidad_agua = request('disponibilidad_agua');
        $agua->capacidad_recarga = request('capacidad_recarga');
        $agua->desempeño_disponibilidad = $desempeño_disponiblidad;
        $agua->desempeño_capacidad = $agua_capacidad;
        $agua->promedio_desempeño = $result_promedio;
        $agua->id_unidad = request('id_unidad');

        $agua->save();

        ///SI QUEREMOS QUE NOS RETORNE EL BOTON GUARDAR 
        return redirect('/agua');
    }

  
    public function show($id)
    {
        //
    }

  
    public function edit($id)
    {
        //
    }

  
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
