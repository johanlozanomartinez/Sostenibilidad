<?php

namespace App\Http\Controllers;

use App\Models\Enfermedades;
use Illuminate\Http\Request;
use DB;




class EnfermedadesController extends Controller
{
  
    public function index()
    {
           //LISTAMOS LAS UNIDADES PLAGAS
        //esto deberia ir en el create//
        $ListaUnidad = DB::table('unidad')->select('id_unidad','nombre_representante','nombre_finca',
        'vereda','celular','ingresos','Egresos')
        ->get(); $faculties= DB::table('faculties')->select('id','name')
        ->get();
        return view('enfermedades/create',['ListaUnidad' => $ListaUnidad],['faculties'=>$faculties]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
        $enfermedades = DB::table('enfermedades')->select('enfermedades.id','enfermedades.valor_referencia','enfermedades.promedio',
        'enfermedades.desempeño','enfermedades.faculty_id','enfermedades.career_id','unidad.id_unidad AS IdUnidad',
        'unidad.nombre_representante AS NombreFinca','careers.name AS NombreCarrera','faculties.name AS NombreFacultad')
        ->join('careers','careers.id','=','enfermedades.career_id')//relacion 1.tabla relacionda  2. relacion PK 3. = Comparcion 4.tabla  & identificacion FK
        ->join('faculties','faculties.id','=','enfermedades.faculty_id')//relacion 1.tabla relacionda  2. relacion PK 3. = Comparcion 4.tabla  & identificacion FK
        ->join('unidad','unidad.id_unidad','=','enfermedades.id_unidad')//relacion 1.tabla relacionda  2. relacion PK 3. = Comparcion 4.tabla  & identificacion FK
        ->get();
        return view('enfermedades.index', ['enfermedades' => $enfermedades]);


    }

    public function store(Request $request)
    {
    
        $enfermedades = new Enfermedades();

        $enfermedades->id_unidad = request('id_unidad');
        $enfermedades->faculty_id = request('faculty_id');
        $enfermedades->career_id = request('career_id');
        $enfermedades->valor_referencia = request('valor_referencia');
        $enfermedades->promedio = request('promedio');

        //$plagasl->name = request('name');

       // $semilla_local= request('semilla_local');


        $prome= request('promedio');



        $text= request('career_id');
  
         if($text==1){
            if($prome==0){
                $desemp=0;
            }elseif($prome<10){
                $desemp=5;
            }elseif($prome<20){
                $desemp=4;
            }elseif($prome<40){
                $desemp=3;
            }elseif($prome<50){
                $desemp=2;
            }elseif($prome>=50){
                $desemp=1;
                }
         }if($text==2){
            if($prome==0){
                $desemp=0;
            }elseif($prome<50){
                $desemp=5;
            }elseif($prome<100){
                $desemp=4;
            }elseif($prome<150){
                $desemp=3;
            }elseif($prome<200){
                $desemp=2;
            }elseif($prome>=200){
                $desemp=1;
                }
       }if($text==3){
        if($prome==0){
            $desemp=0;
        }elseif($prome<50){
            $desemp=5;
        }elseif($prome<100){
            $desemp=4;
        }elseif($prome<200){
            $desemp=3;
        }elseif($prome<300){
            $desemp=2;
        }elseif($prome>=300){
            $desemp=1;
            }
   }if($text==4){
    if($prome==0){
        $desemp=0;
    }elseif($prome<15){
        $desemp=5;
    }elseif($prome<25){
        $desemp=4;
    }elseif($prome<35){
        $desemp=3;
    }elseif($prome<50){
        $desemp=2;
    }elseif($prome>=50){
        $desemp=1;
        }
}if($text==5){
    if($prome==0){
        $desemp=0;
    }elseif($prome<15){
        $desemp=5;
    }elseif($prome<25){
        $desemp=4;
    }elseif($prome<35){
        $desemp=3;
    }elseif($prome<50){
        $desemp=2;
    }elseif($prome>=50){
        $desemp=1;
        }
}if($text==6){
    if($prome==0){
        $desemp=0;
    }elseif($prome<15){
        $desemp=5;
    }elseif($prome<25){
        $desemp=4;
    }elseif($prome<35){
        $desemp=3;
    }elseif($prome<50){
        $desemp=2;
    }elseif($prome>=50){
        $desemp=1;
        }
}if($text==7){
    if($prome==0){
        $desemp=0;
    }elseif($prome<15){
        $desemp=5;
    }elseif($prome<25){
        $desemp=4;
    }elseif($prome<35){
        $desemp=3;
    }elseif($prome<50){
        $desemp=2;
    }elseif($prome>=50){
        $desemp=1;
        }
}if($text==8){
    if($prome==0){
        $desemp=0;
    }elseif($prome<15){
        $desemp=5;
    }elseif($prome<25){
        $desemp=4;
    }elseif($prome<35){
        $desemp=3;
    }elseif($prome<50){
        $desemp=2;
    }elseif($prome>=50){
        $desemp=1;
        }
}if($text==9){
    if($prome==0){
        $desemp=0;
    }elseif($prome<50){
        $desemp=5;
    }elseif($prome<100){
        $desemp=4;
    }elseif($prome<200){
        $desemp=3;
    }elseif($prome<300){
        $desemp=2;
    }elseif($prome>=300){
        $desemp=1;
        }
}if($text==10){
    if($prome==0){
        $desemp=0;
    }elseif($prome<15){
        $desemp=5;
    }elseif($prome<25){
        $desemp=4;
    }elseif($prome<35){
        $desemp=3;
    }elseif($prome<50){
        $desemp=2;
    }elseif($prome>=50){
        $desemp=1;
        }
}if($text==11){
    if($prome==0){
        $desemp=0;
    }elseif($prome<15){
        $desemp=5;
    }elseif($prome<25){
        $desemp=4;
    }elseif($prome<35){
        $desemp=3;
    }elseif($prome<50){
        $desemp=2;
    }elseif($prome>=50){
        $desemp=1;
        }
}if($text==12){
    if($prome==0){
        $desemp=0;
    }elseif($prome<15){
        $desemp=5;
    }elseif($prome<25){
        $desemp=4;
    }elseif($prome<35){
        $desemp=3;
    }elseif($prome<50){
        $desemp=2;
    }elseif($prome>=50){
        $desemp=1;
        }
}if($text==13){
    if($prome==0){
        $desemp=0;
    }elseif($prome<15){
        $desemp=5;
    }elseif($prome<25){
        $desemp=4;
    }elseif($prome<35){
        $desemp=3;
    }elseif($prome<50){
        $desemp=2;
    }elseif($prome>=50){
        $desemp=1;
        }
}if($text==14){
    if($prome==0){
        $desemp=0;
    }elseif($prome<30){
        $desemp=5;
    }elseif($prome<60){
        $desemp=4;
    }elseif($prome<100){
        $desemp=3;
    }elseif($prome<140){
        $desemp=2;
    }elseif($prome>=140){
        $desemp=1;
        }
}if($text==15){
    if($prome==0){
        $desemp=0;
    }elseif($prome<15){
        $desemp=5;
    }elseif($prome<25){
        $desemp=4;
    }elseif($prome<35){
        $desemp=3;
    }elseif($prome<50){
        $desemp=2;
    }elseif($prome>=50){
        $desemp=1;
        }
}if($text==16){
    if($prome==0){
        $desemp=0;
    }elseif($prome<15){
        $desemp=5;
    }elseif($prome<25){
        $desemp=4;
    }elseif($prome<35){
        $desemp=3;
    }elseif($prome<50){
        $desemp=2;
    }elseif($prome>=50){
        $desemp=1;
        }
}if($text==17){
    if($prome==0){
        $desemp=0;
    }elseif($prome<15){
        $desemp=5;
    }elseif($prome<25){
        $desemp=4;
    }elseif($prome<35){
        $desemp=3;
    }elseif($prome<50){
        $desemp=2;
    }elseif($prome>=50){
        $desemp=1;
        }
}
if($text==18){
    if($prome==0){
        $desemp=0;
    }elseif($prome<15){
        $desemp=5;
    }elseif($prome<25){
        $desemp=4;
    }elseif($prome<35){
        $desemp=3;
    }elseif($prome<50){
        $desemp=2;
    }elseif($prome>=50){
        $desemp=1;
        }
}if($text==19){
    if($prome==0){
        $desemp=0;
    }elseif($prome<15){
        $desemp=5;
    }elseif($prome<25){
        $desemp=4;
    }elseif($prome<35){
        $desemp=3;
    }elseif($prome<50){
        $desemp=2;
    }elseif($prome>=50){
        $desemp=1;
        }
}





        $enfermedades->desempeño = $desemp;
        $enfermedades->save();

        ///SI QUEREMOS QUE NOS RETORNE EL BOTON GUARDAR 
        return redirect('/enfermedades/create');
    
    }



    public function show(Enfermedades $enfermedades)
    {
        //
    }

    public function edit($id)
    {
     


        $ListaUnidad = DB::table('unidad')->select('id_unidad','nombre_representante','nombre_finca',
        'vereda','celular','ingresos','Egresos')
        ->get(); $faculties= DB::table('faculties')->select('id','name')
        ->get();
        return view('enfermedades.edit',['Enfermedades'=>Enfermedades::findOrFail($id),
        'ListaUnidad'=>$ListaUnidad,'faculties'=>$faculties]);
    }


    public function update(Request  $request ,$id)
    {
        $enfermedades= Enfermedades::findOrFail($id);
        $enfermedades->id_unidad= request('id_unidad');
        $enfermedades->faculty_id= request('faculty_id');
        $enfermedades->career_id= request('career_id');
        $enfermedades->valor_referencia= request('valor_referencia');
        $enfermedades->promedio= request('promedio');
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
                $enfermedades->desempeño = $desemp;
        $enfermedades->update();

        return redirect('/enfermedades/create');    


    }

    public function destroy(Enfermedades $enfermedades)
    {
        //
    }
}
