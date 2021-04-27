<?php

namespace App\Http\Controllers;

use App\Models\Cobertura;
use Illuminate\Http\Request;
use DB;


class CoberturaController extends Controller
{
 

    
    public function index()
    {
    





      

        $cobertura = DB::table('cobertura')->select('cobertura.id_cobertura','cobertura.agricola','cobertura.pecuaria','cobertura.forestal',
        'cobertura.totalarea','cobertura.coberturaAgricola','cobertura.coberturaPecuaria','cobertura.coberturaForestal',
        'cobertura.ponderadoAgricola','cobertura.ponderadoPecuaria','cobertura.ponderadoForestal','cobertura.coberturaVegetal','cobertura.Desempeño',
        'unidad.id_unidad AS IdUnidad',  'unidad.nombre_representante AS NombreFinca')

        ->join('unidad','unidad.id_unidad','=','cobertura.id_unidad')//relacion 1.tabla relacionda  2. relacion PK 3. = Comparcion 4.tabla  & identificacion FK
        ->get();
        return view('cobertura.index', ['cobertura' => $cobertura]);
    }

 
    public function create()
    {   
        $ListaUnidad = DB::table('unidad')->select('id_unidad','nombre_representante','nombre_finca','vereda','celular')->get();
        return view('cobertura.create', ['ListaUnidad' => $ListaUnidad]);
    }

   
    public function store(Request $request)
    {

        $cobertura = new Cobertura();


        $a_agricola= request('agricola');
        $a_pecuaria= request('pecuaria');
        $a_forestal= request('forestal');

        $totalareas= $a_agricola + $a_pecuaria + $a_forestal;




        $c_agricola= request('coberturaAgricola');
        $c_pecuaria= request('coberturaPecuaria');
        $c_forestal= request('coberturaForestal');




        $ponAgricula= $c_agricola * $a_agricola/ $totalareas;
        $ponPecuaria= $c_pecuaria * $a_pecuaria/ $totalareas;
        $ponForestal=  $c_forestal* $a_forestal/ $totalareas;



        $c_velgetal=$ponAgricula+$ponPecuaria+$ponForestal;






//ingresos 15000000    Egresos 14000000   FN1000000 VPN 843.882 VPN% 7

       if( $c_velgetal<10){
            $desemp=1;
        }elseif ( $c_velgetal<30){
            $desemp=2;
        }elseif( $c_velgetal<50){
            $desemp=3;
        }elseif( $c_velgetal<70){
         $desemp=4;
        }elseif( $c_velgetal>=70){
            $desemp=5;
        }



        


        $cobertura->agricola = request('agricola');
        $cobertura->pecuaria = request('pecuaria');
        $cobertura->forestal = request('forestal');
        $cobertura->totalarea = $totalareas;

        $cobertura->coberturaAgricola = request('coberturaAgricola');
        $cobertura->coberturaPecuaria = request('coberturaPecuaria');
        $cobertura->coberturaForestal = request('coberturaForestal');


        $cobertura->ponderadoAgricola = $ponAgricula;
        $cobertura->ponderadoPecuaria =  $ponPecuaria;
        $cobertura->ponderadoForestal =  $ponForestal;


        $cobertura->coberturaVegetal =  $c_velgetal;
        $cobertura->Desempeño = $desemp;


        
        $cobertura->id_unidad = request('id_unidad');

        $cobertura->save();

        ///SI QUEREMOS QUE NOS RETORNE EL BOTON GUARDAR 
        return redirect('/cobertura');
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
