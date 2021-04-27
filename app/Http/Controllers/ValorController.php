<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Valor;


class ValorController extends Controller
{
    
    public function index()
    {
        //



        $valor = DB::table('valor')->select('valor.id_valor','valor.ingresos','valor.Egresos','valor.FNC','valor.VPN','valor.Porsentaje','valor.Desempeño','unidad.id_unidad AS IdUnidad','unidad.nombre_representante AS NombreFinca')
        ->join('unidad','unidad.id_unidad','=','valor.id_unidad')//relacion 1.tabla relacionda  2. relacion PK 3. = Comparcion 4.tabla  & identificacion FK
        ->get();
        return view('valor.index', ['valor' => $valor]);
    }

 
    public function create()
    {   
        $ListaUnidad = DB::table('unidad')->select('id_unidad','nombre_representante','nombre_finca','vereda','celular','ingresos','Egresos')->get();
        return view('valor.create', ['ListaUnidad' => $ListaUnidad]);
    }

   
    public function store(Request $request)
    {

        $valor = new Valor();


        $ingreso =  DB::table('unidad')->select('ingresos')->where('id_unidad','=', request('id_unidad'))->get()->pluck('ingresos');
        $egreso =  DB::table('unidad')->select('Egresos')->where('id_unidad','=', request('id_unidad'))->get()->pluck('Egresos');

        $valor_ingreo= $ingreso[0];
        $valor_egreso= $egreso[0];
        $valor_VPN = request('VPN');

//ingresos 15000000    Egresos 14000000   FN1000000 VPN 843.882 VPN% 7



        $fnc=$valor_ingreo-$valor_egreso;
        $vpm=$fnc/(1+0.1850);
        
        $Porsen= $vpm/($valor_egreso/( 1+ 0.1850));
        $Porsenta=$Porsen*100;

 
 
       if($Porsenta<5){
            $desemp=1;
        }elseif ($Porsenta<10){
            $desemp=2;
        }elseif($Porsenta<20){
            $desemp=3;
        }elseif($Porsenta<30){
            $desemp=4;
        }elseif($Porsenta<50){
            $desemp=5;
        }





        $valor->ingresos = $ingreso[0];
        $valor->Egresos = $egreso[0];
        $valor->FNC = $fnc;
        $valor->VPN = $vpm;
        $valor->Porsentaje = $Porsenta;
        $valor->Desempeño = $desemp;
        $valor->id_unidad = request('id_unidad');

        $valor->save();

        ///SI QUEREMOS QUE NOS RETORNE EL BOTON GUARDAR 
        return redirect('/valor');
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
