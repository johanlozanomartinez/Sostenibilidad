<?php

namespace App\Http\Controllers;

use App\Career as AppCareer;
use App\Models\Students;
use App\Career;
use App\Models\Plagas;
use DB;






use Illuminate\Http\Request;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {




        //LISTAMOS LAS UNIDADES PLAGAS
        //esto deberia ir en el create//
        $ListaUnidad = DB::table('unidad')->select('id_unidad','nombre_representante','nombre_finca',
        'vereda','celular','ingresos','Egresos')
        ->get(); $faculties= DB::table('faculties')->select('id','name')
        ->get();
        return view('plagas/create',['ListaUnidad' => $ListaUnidad],['faculties'=>$faculties]);


        }





    public function create()
    {
    
        


        $plagas = DB::table('students')->select('students.id','students.valor_referencia','students.promedio',
        'students.desempeño','students.faculty_id','students.career_id','unidad.id_unidad AS IdUnidad',
        'unidad.nombre_representante AS NombreFinca')
        ->join('unidad','unidad.id_unidad','=','students.id_unidad')//relacion 1.tabla relacionda  2. relacion PK 3. = Comparcion 4.tabla  & identificacion FK
        ->get();
        return view('plagas', ['students' => $plagas]);


        
    }

    public function store(Request $request)
    {
        $plagas = new Plagas();


        

        $prome= request('promedio');





//ingresos 15000000    Egresos 14000000   FN1000000 VPN 843.882 VPN% 7
//DESEMPEÑO DISPONIBILIDAD//
       if($prome==0){
        $desemp=0;
        }elseif ($prome>50){
            $desemp=1;
        }elseif ($prome>40){
            $desemp=2;

        }elseif($prome>20){
            $desemp=3;

        }elseif($prome<10){
            $desemp=4;

        }elseif($prome<=10){
            $desemp=5;
        }   





            
  
        $plagas->id_unidad = request('id_unidad');
        $plagas->faculty_id = request('faculty_id');
        $plagas->career_id = request('career_id');

        $plagas->promedio = request('valor_referencia');
        $plagas->promedio = request('promedio');
        $plagas->desempeño = $desemp;






        $plagas->save();

        ///SI QUEREMOS QUE NOS RETORNE EL BOTON GUARDAR 
        return redirect('/enfermedades/create');
    
    }










    public function getCareers(Request $request){

        if ($request->ajax()) {
            
            //$careers = AppCareer::where('faculty_id', $request->faculty_id)->get();

            $creaers = DB::table('careers')->select('id','name')->where('faculty_id', $request->faculty_id)
            ->get();

            foreach ($creaers as $career) {
                $careersArray[$career->id] = $career->name;
            }

            return response()->json($careersArray);
        }
    }
    

    
    public function show(Students $students)
    {
        //
    }

  
    public function edit(Students $students)
    {
        //
    }


    public function update(Request $request, Students $students)
    {
        //
    }

   
    public function destroy(Students $students)
    {
        //
    }
}
