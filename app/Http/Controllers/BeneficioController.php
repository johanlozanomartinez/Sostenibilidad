<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

use App\Models\Beneficio;


class BeneficioController extends Controller
{
    public function index()
    {
        //



        $beneficio = DB::table('beneficio')->select('beneficio.id_beneficio','beneficio.vpningresos','beneficio.vpnegresos','beneficio.BC','beneficio.Desempeño','unidad.id_unidad AS IdUnidad','unidad.nombre_representante AS NombreFinca','beneficio.ingresos','beneficio.Egresos')
        ->join('unidad','unidad.id_unidad','=','beneficio.id_unidad')//relacion 1.tabla relacionda  2. relacion PK 3. = Comparcion 4.tabla  & identificacion FK
        ->get();
        return view('beneficio.index', ['beneficio' => $beneficio]);
    }

 
    public function create()
    {   
        $ListaUnidad = DB::table('unidad')->select('id_unidad','nombre_representante','nombre_finca','vereda','celular','ingresos','Egresos')->get();
        return view('beneficio.create', ['ListaUnidad' => $ListaUnidad]);
    }

   
    public function store(Request $request)
    {

        $beneficio = new Beneficio();

        $ingreso =  DB::table('unidad')->select('ingresos')->where('id_unidad','=', request('id_unidad'))->get()->pluck('ingresos');
        $egreso =  DB::table('unidad')->select('Egresos')->where('id_unidad','=', request('id_unidad'))->get()->pluck('Egresos');



        $beneficio_ingreo= $ingreso[0];
        $beneficio_egreso= $egreso[0];

        $vpn_ingreso= $beneficio_ingreo/(1+0.1850);
        $vpn_egresos= $beneficio_egreso/(1+0.1850);
        $bc_vpn= $vpn_ingreso/$vpn_egresos;

//ingresos 15000000    Egresos 14000000   FN1000000 VPN 843.882 VPN% 7

       if($bc_vpn<1){
            $desemp=1;
        }elseif ($bc_vpn<1.1){
            $desemp=2;
        }elseif($bc_vpn<1.25){
            $desemp=3;
        }elseif($bc_vpn<1.33){
         $desemp=4;
        }elseif($bc_vpn>=1.33){
            $desemp=5;
        }


       


        $beneficio->ingresos =  $ingreso[0];
        $beneficio->Egresos = $egreso[0];
        $beneficio->vpningresos = $vpn_ingreso;
        $beneficio->vpnegresos = $vpn_egresos;
        $beneficio->BC = $bc_vpn;
        $beneficio->Desempeño = $desemp;
        $beneficio->id_unidad = request('id_unidad');

        $beneficio->save();

        ///SI QUEREMOS QUE NOS RETORNE EL BOTON GUARDAR 
        return redirect('/beneficio');
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
