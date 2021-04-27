<?php

namespace App\Http\Controllers;

use App\Models\Calidades;
use Illuminate\Http\Request;
use DB;

class CalidadesController extends Controller
{
    
    public function index()
    {
        
        $calidades = DB::table('calidades')->select('calidades.id_calidades','calidades.valor','calidades.desempeño',
        'unidad.id_unidad AS IdUnidad','unidad.nombre_representante AS NombreFinca','caracteristicas.id_caracteristicas AS IdCaracteristicas',
        'caracteristicas.nombre_caracteristicas AS Nombrecaracteristicas')
        ->join('unidad','unidad.id_unidad','=','calidades.id_unidad')//relacion 1.tabla relacionda  2. relacion PK 3. = Comparcion 4.tabla  & identificacion FK 
        ->join('caracteristicas','caracteristicas.id_caracteristicas','=','calidades.id_caracteristicas')//relacion 1.tabla relacionda  2. relacion PK 3. = Comparcion 4.tabla  & identificacion FK
        ->get();

        return view('calidades.index', ['calidades' => $calidades]);


        

    }

    
    public function create()
    {
        $ListaUnidad = DB::table('unidad')->select('id_unidad','nombre_representante','nombre_finca',
        'vereda','celular','ingresos','Egresos')
        ->get();$carateristicas= DB:: table('caracteristicas')->select('id_caracteristicas','nombre_caracteristicas')
        ->get();

        return view('calidades.create', ['ListaUnidad' => $ListaUnidad],['caracteristicas'=>$carateristicas]);


    }

    public function store(Request $request)
    {
        

        $calidades = new Calidades();


        $valors= request('valor');
        $text= request('id_caracteristicas');

        
        //Arcilloso, Limoso, Arenoso
        if($text==1){
             $valor=1;
            }

            //Franco Arenoso
               if($text==2){
            $valor=2; 

        }//Franco Limoso
          if($text==3){
            $valor=3;
         
        }//Franco Arcilloso
         if($text==4){
              $valor=4; 
             }//Franco

           if($text==5){
             $valor=5 ;
            
        }

        //PH
        if($text==6){
            if($valors< 2.6){
             $valor=1;
            }elseif($valors<3.6){
             $valor=2;
            }elseif($valors<4.6){
             $valor=3;
            }elseif($valors<5.6){
             $valor=4;
            }elseif($valors>=5.6){
             $valor=5;
            }
 

            // MO(FRIO)
         }if($text==7){
             if($valors< 2){
                 $valor=1;
                }elseif($valors<4){
                 $valor=2;
                }elseif($valors<5){
                 $valor=3;
                }elseif($valors<8){
                 $valor=4;
                }elseif($valors>=8){
                 $valor=5;
                } 
         

        }//P(ppmm)
        if($text==8){
            if($valors< 5){
                $valor=1;
               }elseif($valors<10){
                $valor=2;
               }elseif($valors<15){
                $valor=3;
               }elseif($valors<25){
                $valor=4;
               }elseif($valors>=25){
                $valor=5;
               } 
        }//Al
        if($text==9){

            if($valors<1){
                $valor=5;
               }elseif($valors<1.5){
                $valor=4;
               }elseif($valors<1.7){
                $valor=3;
               }elseif($valors<2){
                $valor=2;
               }elseif($valors>=2){
                $valor=1;
               }

            }//Ca
            if($text==10){
                if($valors< 2){
                    $valor=1;
                   }elseif($valors<3){
                    $valor=2;
                   }elseif($valors<4){
                    $valor=3;
                   }elseif($valors<5){
                    $valor=4;
                   }elseif($valors>=5){
                    $valor=5;
                   } 
            }//Mg
            if($text==11){
                if($valors< 0.5){
                    $valor=1;
                   }elseif($valors<1){
                    $valor=2;
                   }elseif($valors<1.5){
                    $valor=3;
                   }elseif($valors<2){
                    $valor=4;
                   }elseif($valors>=2){
                    $valor=5;
                   } 

                   //K
                }if($text==12){
                    if($valors< 0.1){
                        $valor=1;
                       }elseif($valors<0.2){
                        $valor=2;
                       }elseif($valors<0.3){
                        $valor=3;
                       }elseif($valors<0.4){
                        $valor=4;
                       }elseif($valors>=0.4){
                        $valor=5;
                       } 
                       // NA REVISARLO......
                }if($text==13){
                    if($valors> 4){
                        $valor=1;
                       }elseif($valors>3){
                        $valor=2;
                       }elseif($valors>2){
                        $valor=3;
                       }elseif($valors>1){
                        $valor=4;
                       }elseif($valors<=1){
                        $valor=5;
                       } 
                     
                         //CICE
         }if($text==14){
            if($valors<5){
                $valor=1;
               }elseif($valors<10){
                $valor=2;
               }elseif($valors<20){
                $valor=3;
               }elseif($valors<25){
                $valor=4;
               }elseif($valors>=25){
                $valor=5;
               }

               //fe
            }if($text==15){
                if($valors< 20){
                    $valor=1;
                   }elseif($valors<40){
                    $valor=2;
                   }elseif($valors<50){
                    $valor=3;
                   }elseif($valors<60){
                    $valor=4;
                   }elseif($valors>=60){
                    $valor=5;
                   }
                    // MN
                 }if($text==16){
                    if($valors< 10){
                        $valor=1;
                       }elseif($valors<20){
                        $valor=2;
                       }elseif($valors<30){
                        $valor=3;
                       }elseif($valors<40){
                        $valor=4;
                       }elseif($valors>=40){
                        $valor=5;
                       }

                       //cu
                    }if($text==17){
                        if($valors< 1){
                            $valor=1;
                           }elseif($valors<2){
                            $valor=2;
                           }elseif($valors<3){
                            $valor=3;
                           }elseif($valors<4){
                            $valor=4;
                           }elseif($valors>=4){
                            $valor=5;
                           }

                         //zn
                        }if($text==18){
                            if($valors< 2){
                                $valor=1;
                               }elseif($valors<3){
                                $valor=2;
                               }elseif($valors<4){
                                $valor=3;
                               }elseif($valors<5){
                                $valor=4;
                               }elseif($valors>=5){
                                $valor=5;
                               }
                               
                         //ce
                        }if($text==19){
                            if($valors> 3){
                                $valor=1;
                               }elseif($valors>2){
                                $valor=2;
                               }elseif($valors>1){
                                $valor=3;
                               }elseif($valors>0){
                                $valor=4;
                               }elseif($valors<=0){
                                $valor=5;
                               }

                               //CA/MG
                            }if($text==20){
                                if($valors< 1){
                                    $valor=1;
                                   }elseif($valors<2){
                                   $valor=2;
                                   }elseif($valors<3){
                                    $valor=3;
                                   }elseif($valors<4){
                                    $valor=4;
                                   }elseif($valors>=5){
                                    $valor=5;
                                   }
                                        //CA/K
                            }if($text==21){
                                if($valors< 4){
                                    $valor=1;
                                   }elseif($valors<6){
                                    $valor=2;
                                   }elseif($valors<8){
                                    $valor=3;
                                   }elseif($valors<12){
                                    $valor=4;
                                   }elseif($valors>=12){
                                    $valor=5;
                                   }


                                 //MG/K
                                }if($text==22){
                                    if($valors< 4){
                                        $valor=1;
                                       }elseif($valors<5){
                                        $valor=2;
                                       }elseif($valors<6){
                                        $valor=3;
                                       }elseif($valors<7){
                                        $valor=4;
                                       }elseif($valors>=7){
                                        $valor=5;
                                       }

                                        //K/MG
                                }if($text==23){
                                    if($valors>=2){
                                        $valor=1;
                                       }elseif($valors>1.2){
                                        $valor=2;
                                       }elseif($valors>=1){
                                        $valor=3;
                                       }elseif($valors>0.3){
                                        $valor=4;
                                       }elseif($valors<=0.3){
                                        $valor=5;
                                       }


                                           //CA+MG/K
                                 }if($text=24){
                                    if($valors< 4){
                                        $valor=1;
                                       }elseif($valors<8){
                                        $valor=2;
                                       }elseif($valors<10){
                                        $valor=3;
                                       }elseif($valors<12){
                                        $valor=4;
                                       }elseif($valors>=12){
                                        $valor=5;
                                       }
                                    }



                                    



        /*
       
        
       
              
                           
                             
                                   
                                     
 


                                     */

      


       
        $calidades->valor = request('valor');
        $calidades->desempeño = $valor;
        $calidades->id_unidad = request('id_unidad');
        $calidades->id_caracteristicas = request('id_caracteristicas');


        $calidades->save();

        ///SI QUEREMOS QUE NOS RETORNE EL BOTON GUARDAR 
        return redirect('/calidades');


        
        //'id_calidades',
        //'valor',
        //'desempeño',
        //'id_unidad',
        //'id_caracteristicas',


    }

    
    public function show(Calidades $calidades)
    {
        
    }

    public function edit(Calidades $calidades)
    {
        
    }

   
    public function update(Request $request, Calidades $calidades)
    {
        
    }

   
    public function destroy(Calidades $calidades)
    {
        
    }
}
