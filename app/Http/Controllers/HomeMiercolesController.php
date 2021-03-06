<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

use Validator;
use Illuminate\Support\Facades\Redirect;
//excel nueva version
use App\Exports\Asistencias_miercolesExport;
use App\Exports\Reporteperiodo_miercolesExport;
use App\Exports\Faltantes_miercolesExport;
use Maatwebsite\Excel\Facades\Excel;
//use Excel;







class HomeMiercolesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        
        
        $timezone = new \DateTimeZone('America/Mexico_City');
        $date = new \DateTime();
        $date->setTimeZone($timezone); 
        $fecha_actual=$date->format('Y-m-d');
        
         
            $existe_registro=\App\tb_asistencias_miercoles::select("tb_asistencias_miercoles.*")
             ->where("tb_asistencias_miercoles.user_registro",\Auth::user()->id)
                   ->where("tb_asistencias_miercoles.fecha",$fecha_actual)
                   ->first();
                   
        if($existe_registro){
            
           return view('home_limite');
            
        }else{
            
              $alcaldias = \App\catDelegaciones::All();
             return view('home_miercoles',compact('alcaldias'));
            
        }

  
      
               
    }

    public function getCtAlcaldia($id){

        $cts = \App\catCoordTerritorial::select("cat_coord_territorials.*")
                   ->where("cat_coord_territorials.id_alcaldia",$id)
                   ->get();

        return json_encode($cts);

    }

    public function guardar_asistencia_miercoles(Request $request){
      


      $hora_i_compuesta=$request['hora_inicio'].":".$request['minutos_i'];
      $hora_f_compuesta=$request['hora_termino'].":".$request['minutos_t'];



        $validator = Validator::make($request->all(), [
                 'fecha' => 'required',
                 'hora_inicio' => 'required',
                 'minutos_i' => 'required',
                 'hora_termino' => 'required',
                 'minutos_t' => 'required',
                 'se_realizo_mesa' => 'required'
             ]);



        if ($validator->fails()) {

           $messages = $validator->messages();
           return Redirect::to('/asistencia_miercoles')->withInput()->withErrors($validator);

         }else if ($validator->passes()){

            if($request['jg']==null){
                $array_jg="SIN DATO";
            }else{
                $array_jg = implode(",",$request['jg']);
            }


            if($request['mp']==null){
                $array_mp="SIN DATO";
            }else{
                $array_mp = implode(",",$request['mp']);
            }



            if($request['jsp']==null){
                $array_jsp="SIN DATO";
            }else{
                $array_jsp = implode(",",$request['jsp']);
            }



            if($request['jspi']==null){
                $array_jspi="SIN DATO";
            }else{
                $array_jspi = implode(",",$request['jspi']);
            }



            if($request['jc']==null){
                $array_jc="SIN DATO";
            }else{
                $array_jc = implode(",",$request['jc']);
            }

             if($request['ml']==null){
                $array_ml="SIN DATO";
            }else{
                $array_ml = implode(",",$request['ml']);
            }



            if($request['otros']==null){
                $array_ot="SIN DATO";
            }else{
                $array_ot = implode(",",$request['otros']);
            }
            
            
             if($request['representante_alcaldia']==null){
                $array_ra="SIN DATO";
            }else{
                $array_ra = implode(",",$request['representante_alcaldia']);
            }

               if($request['ins']==null){
                $array_ins="SIN DATO";
            }else{
                $array_ins = implode(",",$request['ins']);
            }
            
            if($request['vecino']==null){
                $array_vecino="SIN DATO";
            }else{
                $array_vecino = $request['vecino'];
            }
            

            if($request['calle']==null){
                $array_calle="SIN DATO";
            }else{
                $array_calle = $request['calle'];
            }




            if($request['archivo']!=null){
            $imagen_nombre=rand(11111,99999).'.jpg';
            $destinationPath='alcaldias';
              }else{
              $imagen_nombre=null;
               
              }




           
         }

            
            if ($request['se_realizo_mesa']=='si') {
              $inserto = \App\tb_asistencias_miercoles::create([ 
             
                 'id_ct' => $request['ct'],
                 'se_realizo' => $request['se_realizo_mesa'], 
                 'no_motivo' => $request['motivo'],

                 'fecha' => $request['fecha'],
                 'hora_i' =>$hora_i_compuesta,
                 'hora_f' => $hora_f_compuesta,
                 //'hora_i' => $request['hora1'],
                 //'hora_f' => $request['hora2'],
                       
                   'jg' => $array_jg,
                   'mp' => $array_mp,
                   'jsp' => $array_jsp,
                   'jspi' => $array_jspi,
                   'jc' => $array_jc,
                   'ml' => $array_ml,
                   'otro' => $array_ot,
                   'representante_alcaldia'=>$array_ra,
                   'ins' => $array_ins,
                   'vecino' => $array_vecino,
                 
                   'archivo_imagen' => $imagen_nombre,
                   'calle' => $array_calle,
                   'user_registro'=> \Auth::user()->id
                
                 ]);
                 
                 
                 if($request['archivo']!=null){
                 $request['archivo']->move($destinationPath,$imagen_nombre);
            }

            }else{
                
                
                 $inserto = \App\tb_asistencias_miercoles::create([ 
              
                 'id_ct' => $request['ct'],
                 'se_realizo' => $request['se_realizo_mesa'], 
                 'no_motivo' => $request['motivo'],

                 'fecha' => $request['fecha'],
                 'hora_i' =>$hora_i_compuesta,
                        //'minutos_i' => $request['minutos_i'],
                 'hora_f' => $hora_f_compuesta,
                 //'hora_i' => $request['hora1'],
                 //'hora_f' => $request['hora2'],
                       
                  'jg' => 'No se realizo',
                  'mp' => 'No se realizo',
                  'jsp' => 'No se realizo',
                  'jspi' => 'No se realizo',
                  'jc' => 'No se realizo',
                  'ml' => 'No se realizo',
                  'otro' => 'No se realizo',
                  'representante_alcaldia'=>'No se realizo',
                  'ins' => 'No se realizo',
                  'vecino' => 'No se realizo',
                  'archivo_imagen' => $imagen_nombre,
                  'calle' => 'No se realizo',
                  'user_registro'=> \Auth::user()->id
                
               
             ]);
             
            

               
          

         }

                 $mensaje = array('mensaje'=>'Asistencia Vespertina Éxitosa !', 'color'=> 'success');
                 return Redirect::to('/asistencia_miercoles/')->with('mensaje', $mensaje);


    }
    
    
      public function fecha_real_captura()
    {
        
        
        $timezone = new \DateTimeZone('America/Mexico_City');
        $date = new \DateTime();
        $date->setTimeZone($timezone); 
        $fecha_actual=$date->format('Y-m-d');
        
       
        
        
                 $datos = \App\tbAsistencia::select(
                 DB::raw('DATE_ADD(tb_asistencias_miercoles.created_at, INTERVAL -1 HOUR) as fecha_real')
                 
                 ,"tb_asistencias.created_at as fecha_servidor")
                 ->whereBetween('tb_asistencias_miercoles.fecha', [$fecha_actual, $fecha_actual])
                    ->get();
                 
        
        return json_encode($datos);
    }
    
    
    
         public function reportes_miercoles()
    {
        
        
        return view('reporte_fecha_miercoles');
        
    }


public function obtener_excel_miercoles(Request $request)
    {
      $fecha1=$request['fecha'];
      $fecha2=$request['fecha2'];


       return Excel::download(new Reporteperiodo_miercolesExport($fecha1, $fecha2), 'GV POR PERIÓDO.xlsx');
         
    

    }











     public function vista_faltantes_miercoles()
    {   
   
        return view('faltantes_miercoles');
    }


  public function faltantes_miercoles(Request $request)
    {
        
        
        $fecha1=$request['fecha'];
        $fecha2=$request['fecha2'];




        return Excel::download(new Faltantes_miercolesExport($fecha1, $fecha2), 'REPORTE GV FALTANTES MIERCOLES.xlsx');
       
                        
    }
    
    
  
    
    
               
    public function grafica_miercoles()
    {
        
        
        return view('graficas_asistencia_miercoles');
        
    }
    
    
    public function datos_grafica_miercoles($fecha1,$fecha2){
        
        
        
        
        $timezone = new \DateTimeZone('America/Mexico_City');
        $date = new \DateTime();
        $date->setTimeZone($timezone); 
        $fecha_actual=$date->format('Y-m-d');
        
        
        if($fecha1==null||$fecha2==null){
            $fecha1=$fecha_actual;
            $fecha2=$fecha_actual;
        }
        
        
        
        //TITULAR
        
        $datos1 = DB::table('tb_asistencias_miercoles')
          ->whereBetween('tb_asistencias_miercoles.fecha', [$fecha1,$fecha2])
          ->where("tb_asistencias_miercoles.jg","titular")
          ->count(DB::raw('DISTINCT user_registro'));
        $datos2 = DB::table('tb_asistencias_miercoles')
          ->whereBetween('tb_asistencias_miercoles.fecha', [$fecha1,$fecha2])
          ->where("tb_asistencias_miercoles.mp","titular")
          ->count(DB::raw('DISTINCT user_registro'));
        $datos3 = DB::table('tb_asistencias_miercoles')
          ->whereBetween('tb_asistencias_miercoles.fecha', [$fecha1,$fecha2])
          ->where("tb_asistencias_miercoles.jsp","titular")
          ->count(DB::raw('DISTINCT user_registro'));
        $datos4 = DB::table('tb_asistencias_miercoles')
          ->whereBetween('tb_asistencias_miercoles.fecha', [$fecha1,$fecha2])
          ->where("tb_asistencias_miercoles.jspi","titular")
          ->count(DB::raw('DISTINCT user_registro'));
        $datos5 = DB::table('tb_asistencias_miercoles')
          ->whereBetween('tb_asistencias_miercoles.fecha', [$fecha1,$fecha2])
          ->where("tb_asistencias_miercoles.jc","titular")
          ->count(DB::raw('DISTINCT user_registro'));
        $datos6 = DB::table('tb_asistencias_miercoles')
          ->whereBetween('tb_asistencias_miercoles.fecha', [$fecha1,$fecha2])
          ->where("tb_asistencias_miercoles.ml","titular")
          ->count(DB::raw('DISTINCT user_registro'));
        $datos7 = DB::table('tb_asistencias_miercoles')
          ->whereBetween('tb_asistencias_miercoles.fecha', [$fecha1,$fecha2])
          ->where("tb_asistencias_miercoles.representante_alcaldia","titular")
          ->count(DB::raw('DISTINCT user_registro'));
        $datos8 = DB::table('tb_asistencias_miercoles')
          ->whereBetween('tb_asistencias_miercoles.fecha', [$fecha1,$fecha2])
          ->where("tb_asistencias_miercoles.ins","titular")
          ->count(DB::raw('DISTINCT user_registro'));
          
          
        //SUPLENTE
        
        $datos1_s = DB::table('tb_asistencias_miercoles')
          ->whereBetween('tb_asistencias_miercoles.fecha', [$fecha1,$fecha2])
          ->where("tb_asistencias_miercoles.jg","suplente")
          ->count(DB::raw('DISTINCT user_registro'));
        $datos2_s = DB::table('tb_asistencias_miercoles')
          ->whereBetween('tb_asistencias_miercoles.fecha', [$fecha1,$fecha2])
          ->where("tb_asistencias_miercoles.mp","suplente")
          ->count(DB::raw('DISTINCT user_registro'));
        $datos3_s = DB::table('tb_asistencias_miercoles')
          ->whereBetween('tb_asistencias_miercoles.fecha', [$fecha1,$fecha2])
          ->where("tb_asistencias_miercoles.jsp","suplente")
          ->count(DB::raw('DISTINCT user_registro'));
        $datos4_s = DB::table('tb_asistencias_miercoles')
          ->whereBetween('tb_asistencias_miercoles.fecha', [$fecha1,$fecha2])
          ->where("tb_asistencias_miercoles.jspi","suplente")
          ->count(DB::raw('DISTINCT user_registro'));
        $datos5_s = DB::table('tb_asistencias_miercoles')
          ->whereBetween('tb_asistencias_miercoles.fecha', [$fecha1,$fecha2])
          ->where("tb_asistencias_miercoles.jc","suplente")
          ->count(DB::raw('DISTINCT user_registro'));
        $datos6_s = DB::table('tb_asistencias_miercoles')
          ->whereBetween('tb_asistencias_miercoles.fecha', [$fecha1,$fecha2])
          ->where("tb_asistencias_miercoles.ml","suplente")
          ->count(DB::raw('DISTINCT user_registro'));
        $datos7_s = DB::table('tb_asistencias_miercoles')
          ->whereBetween('tb_asistencias_miercoles.fecha', [$fecha1,$fecha2])
          ->where("tb_asistencias_miercoles.representante_alcaldia","suplente")
          ->count(DB::raw('DISTINCT user_registro'));
        $datos8_s = DB::table('tb_asistencias_miercoles')
          ->whereBetween('tb_asistencias_miercoles.fecha', [$fecha1,$fecha2])
          ->where("tb_asistencias_miercoles.ins","suplente")
          ->count(DB::raw('DISTINCT user_registro'));
          
          
          
       //AMBOS
        
        $datos1_ambos = DB::table('tb_asistencias_miercoles')
          ->whereBetween('tb_asistencias_miercoles.fecha', [$fecha1,$fecha2])
          ->where("tb_asistencias_miercoles.jg","titular,suplente")
          ->count(DB::raw('DISTINCT user_registro'));
        $datos2_ambos = DB::table('tb_asistencias_miercoles')
          ->whereBetween('tb_asistencias_miercoles.fecha', [$fecha1,$fecha2])
          ->where("tb_asistencias_miercoles.mp","titular,suplente")
          ->count(DB::raw('DISTINCT user_registro'));
        $datos3_ambos = DB::table('tb_asistencias_miercoles')
          ->whereBetween('tb_asistencias_miercoles.fecha', [$fecha1,$fecha2])
          ->where("tb_asistencias_miercoles.jsp","titular,suplente")
          ->count(DB::raw('DISTINCT user_registro'));
        $datos4_ambos = DB::table('tb_asistencias_miercoles')
          ->whereBetween('tb_asistencias_miercoles.fecha', [$fecha1,$fecha2])
          ->where("tb_asistencias_miercoles.jspi","titular,suplente")
          ->count(DB::raw('DISTINCT user_registro'));
        $datos5_ambos = DB::table('tb_asistencias_miercoles')
          ->whereBetween('tb_asistencias_miercoles.fecha', [$fecha1,$fecha2])
          ->where("tb_asistencias_miercoles.jc","titular,suplente")
          ->count(DB::raw('DISTINCT user_registro'));
        $datos6_ambos = DB::table('tb_asistencias_miercoles')
          ->whereBetween('tb_asistencias_miercoles.fecha', [$fecha1,$fecha2])
          ->where("tb_asistencias_miercoles.ml","titular,suplente")
          ->count(DB::raw('DISTINCT user_registro'));
        $datos7_ambos = DB::table('tb_asistencias_miercoles')
          ->whereBetween('tb_asistencias_miercoles.fecha', [$fecha1,$fecha2])
          ->where("tb_asistencias_miercoles.representante_alcaldia","titular,suplente")
          ->count(DB::raw('DISTINCT user_registro'));
          
        $datos8_ambos = DB::table('tb_asistencias_miercoles')
          ->whereBetween('tb_asistencias_miercoles.fecha', [$fecha1,$fecha2])
          ->where("tb_asistencias_miercoles.ins","titular,suplente")
          ->count(DB::raw('DISTINCT user_registro'));
          
         
        
               //NO ASISTIO
        
        $datos1_na = DB::table('tb_asistencias_miercoles')
          ->whereBetween('tb_asistencias_miercoles.fecha', [$fecha1,$fecha2])
         // ->where("tb_asistencias_miercoles.jg","No asistió")
           ->whereIn('tb_asistencias_miercoles.jg', array("No asistió", "SIN DATO"))
          
          
         
          ->count(DB::raw('DISTINCT user_registro'));
        $datos2_na = DB::table('tb_asistencias_miercoles')
          ->whereBetween('tb_asistencias_miercoles.fecha', [$fecha1,$fecha2])
         //->where("tb_asistencias_miercoles.mp","No asistió")
         ->whereIn('tb_asistencias_miercoles.mp', array("No asistió", "SIN DATO"))
          
          ->count(DB::raw('DISTINCT user_registro'));
        $datos3_na = DB::table('tb_asistencias_miercoles')
          ->whereBetween('tb_asistencias_miercoles.fecha', [$fecha1,$fecha2])
          //->where("tb_asistencias_miercoles.jsp","No asistió")
          ->whereIn('tb_asistencias_miercoles.jsp', array("No asistió", "SIN DATO"))
          
          ->count(DB::raw('DISTINCT user_registro'));
        $datos4_na = DB::table('tb_asistencias_miercoles')
          ->whereBetween('tb_asistencias_miercoles.fecha', [$fecha1,$fecha2])
          //->where("tb_asistencias_miercoles.jspi","No asistió")
          ->whereIn('tb_asistencias_miercoles.jspi', array("No asistió", "SIN DATO"))
         
          ->count(DB::raw('DISTINCT user_registro'));
        $datos5_na = DB::table('tb_asistencias_miercoles')
          ->whereBetween('tb_asistencias_miercoles.fecha', [$fecha1,$fecha2])
          //->where("tb_asistencias_miercoles.jc","No asistió")
          ->whereIn('tb_asistencias_miercoles.jc', array("No asistió", "SIN DATO"))
         
          ->count(DB::raw('DISTINCT user_registro'));
        $datos6_na = DB::table('tb_asistencias_miercoles')
          ->whereBetween('tb_asistencias_miercoles.fecha', [$fecha1,$fecha2])
          //->where("tb_asistencias_miercoles.ml","No asistió")
          ->whereIn('tb_asistencias_miercoles.ml', array("No asistió", "SIN DATO"))
         
          ->count(DB::raw('DISTINCT user_registro'));
        $datos7_na = DB::table('tb_asistencias_miercoles')
          ->whereBetween('tb_asistencias_miercoles.fecha', [$fecha1,$fecha2])
          //->where("tb_asistencias_miercoles.representante_alcaldia","No asistió")
           ->whereIn('tb_asistencias_miercoles.representante_alcaldia', array("No asistió", "SIN DATO"))
           
           
          ->count(DB::raw('DISTINCT user_registro'));
        $datos8_na = DB::table('tb_asistencias_miercoles')
          ->whereBetween('tb_asistencias_miercoles.fecha', [$fecha1,$fecha2])
          //->where("tb_asistencias_miercoles.ins","No asistió")
           ->whereIn('tb_asistencias_miercoles.ins', array("No asistió", "SIN DATO"))
         
          ->count(DB::raw('DISTINCT user_registro'));
          
          
          
          
          
          
        
                    $array= array($datos1,$datos2,$datos3,$datos4,$datos5,$datos6,$datos7,$datos8);
                    $array2= array($datos1_s,$datos2_s,$datos3_s,$datos4_s,$datos5_s,$datos6_s,$datos7_s,$datos8_s);
                    $array3= array($datos1_na,$datos2_na,$datos3_na,$datos4_na,$datos5_na,$datos6_na,$datos7_na,$datos8_na);
                    $array4= array($datos1_ambos,$datos2_ambos,$datos3_ambos,$datos4_ambos,$datos5_ambos,$datos6_ambos,$datos7_ambos,$datos8_ambos);
                    
                    
                    $array_general=array($array,$array2,$array3,$array4);
                    
                
                    
         return json_encode($array_general);
    }
    
     
     public function grafica_alcaldia_miercoles()
    {   
        
       $alcaldias = \App\catDelegaciones::All();
        return view('grafica_alcaldia_miercoles',compact('alcaldias'));
    }
    
    
     public function datos_grafica_alc_miercoles($fecha1,$fecha2,$alc){
         
           $coordinaciones = DB::table('cat_delegaciones')
           ->select('cat_coord_territorials.ct2')
           ->leftjoin('cat_coord_territorials','cat_coord_territorials.id_alcaldia','=','cat_delegaciones.id')
           ->where('cat_delegaciones.delegacion',$alc)
           ->get();
           
         
         //opciones
          $array1= array();//jg
          $array2= array();//mp
          $array3= array();//jsp
          $array4= array();//jspi
          $array5= array();//jc
          $array6= array();//ml
          $array7= array();//representante_alcaldia
          $array8= array();//ins
          
          $array_coor=array();
         
         foreach($coordinaciones as $coordinacion){
             
             
           $array_coor[]=$coordinacion->ct2;
             
             
           $array1[] = DB::table('tb_asistencias_miercoles')
           ->select('tb_asistencias_miercoles.*',"cat_coord_territorials.ct2",'cat_delegaciones.delegacion')
           ->leftjoin('users','users.id','=','tb_asistencias_miercoles.user_registro') 
           ->leftjoin('cat_coord_territorials','cat_coord_territorials.ct2','=','users.name')
           ->leftjoin('cat_delegaciones','cat_delegaciones.id','=','cat_coord_territorials.id_alcaldia')
           
           ->whereBetween('tb_asistencias_miercoles.fecha', [$fecha1,$fecha2])
           ->where('cat_delegaciones.delegacion',$alc)
           ->whereIn('tb_asistencias_miercoles.jg', array("titular","titular,suplente"))
           ->where('cat_coord_territorials.ct2',$coordinacion->ct2)
           ->count('tb_asistencias_miercoles.fecha');
           
           
           $array2[] = DB::table('tb_asistencias_miercoles')
           ->select('tb_asistencias_miercoles.*',"cat_coord_territorials.ct2",'cat_delegaciones.delegacion')
           ->leftjoin('users','users.id','=','tb_asistencias_miercoles.user_registro') 
           ->leftjoin('cat_coord_territorials','cat_coord_territorials.ct2','=','users.name')
           ->leftjoin('cat_delegaciones','cat_delegaciones.id','=','cat_coord_territorials.id_alcaldia')
           
           ->whereBetween('tb_asistencias_miercoles.fecha', [$fecha1,$fecha2])
           ->where('cat_delegaciones.delegacion',$alc)
           ->whereIn('tb_asistencias_miercoles.mp', array("titular","titular,suplente"))
           ->where('cat_coord_territorials.ct2',$coordinacion->ct2)
           ->count('tb_asistencias_miercoles.fecha');
           
           
           $array3[] = DB::table('tb_asistencias_miercoles')
           ->select('tb_asistencias_miercoles.*',"cat_coord_territorials.ct2",'cat_delegaciones.delegacion')
           ->leftjoin('users','users.id','=','tb_asistencias_miercoles.user_registro') 
           ->leftjoin('cat_coord_territorials','cat_coord_territorials.ct2','=','users.name')
           ->leftjoin('cat_delegaciones','cat_delegaciones.id','=','cat_coord_territorials.id_alcaldia')
           
           ->whereBetween('tb_asistencias_miercoles.fecha', [$fecha1,$fecha2])
           ->where('cat_delegaciones.delegacion',$alc)
           ->whereIn('tb_asistencias_miercoles.jsp', array("titular","titular,suplente"))
           ->where('cat_coord_territorials.ct2',$coordinacion->ct2)
           ->count('tb_asistencias_miercoles.fecha');
           
           
           $array4[] = DB::table('tb_asistencias_miercoles')
           ->select('tb_asistencias_miercoles.*',"cat_coord_territorials.ct2",'cat_delegaciones.delegacion')
           ->leftjoin('users','users.id','=','tb_asistencias_miercoles.user_registro') 
           ->leftjoin('cat_coord_territorials','cat_coord_territorials.ct2','=','users.name')
           ->leftjoin('cat_delegaciones','cat_delegaciones.id','=','cat_coord_territorials.id_alcaldia')
           
           ->whereBetween('tb_asistencias_miercoles.fecha', [$fecha1,$fecha2])
           ->where('cat_delegaciones.delegacion',$alc)
           ->whereIn('tb_asistencias_miercoles.jspi', array("titular","titular,suplente"))
           ->where('cat_coord_territorials.ct2',$coordinacion->ct2)
           ->count('tb_asistencias_miercoles.fecha');
           
           
           $array5[] = DB::table('tb_asistencias_miercoles')
           ->select('tb_asistencias_miercoles.*',"cat_coord_territorials.ct2",'cat_delegaciones.delegacion')
           ->leftjoin('users','users.id','=','tb_asistencias_miercoles.user_registro') 
           ->leftjoin('cat_coord_territorials','cat_coord_territorials.ct2','=','users.name')
           ->leftjoin('cat_delegaciones','cat_delegaciones.id','=','cat_coord_territorials.id_alcaldia')
           
           ->whereBetween('tb_asistencias_miercoles.fecha', [$fecha1,$fecha2])
           ->where('cat_delegaciones.delegacion',$alc)
           ->whereIn('tb_asistencias_miercoles.jc', array("titular","titular,suplente"))
           ->where('cat_coord_territorials.ct2',$coordinacion->ct2)
           ->count('tb_asistencias_miercoles.fecha');
           
           
           $array6[] = DB::table('tb_asistencias_miercoles')
           ->select('tb_asistencias_miercoles.*',"cat_coord_territorials.ct2",'cat_delegaciones.delegacion')
           ->leftjoin('users','users.id','=','tb_asistencias_miercoles.user_registro') 
           ->leftjoin('cat_coord_territorials','cat_coord_territorials.ct2','=','users.name')
           ->leftjoin('cat_delegaciones','cat_delegaciones.id','=','cat_coord_territorials.id_alcaldia')
           
           ->whereBetween('tb_asistencias_miercoles.fecha', [$fecha1,$fecha2])
           ->where('cat_delegaciones.delegacion',$alc)
           ->whereIn('tb_asistencias_miercoles.ml', array("titular","titular,suplente"))
           ->where('cat_coord_territorials.ct2',$coordinacion->ct2)
           ->count('tb_asistencias_miercoles.fecha');
           
           
           $array7[] = DB::table('tb_asistencias_miercoles')
           ->select('tb_asistencias_miercoles.*',"cat_coord_territorials.ct2",'cat_delegaciones.delegacion')
           ->leftjoin('users','users.id','=','tb_asistencias_miercoles.user_registro') 
           ->leftjoin('cat_coord_territorials','cat_coord_territorials.ct2','=','users.name')
           ->leftjoin('cat_delegaciones','cat_delegaciones.id','=','cat_coord_territorials.id_alcaldia')
           
           ->whereBetween('tb_asistencias_miercoles.fecha', [$fecha1,$fecha2])
           ->where('cat_delegaciones.delegacion',$alc)
           ->whereIn('tb_asistencias_miercoles.representante_alcaldia', array("titular","titular,suplente"))
           ->where('cat_coord_territorials.ct2',$coordinacion->ct2)
           ->count('tb_asistencias_miercoles.fecha');
           
            $array8[] = DB::table('tb_asistencias_miercoles')
           ->select('tb_asistencias_miercoles.*',"cat_coord_territorials.ct2",'cat_delegaciones.delegacion')
           ->leftjoin('users','users.id','=','tb_asistencias_miercoles.user_registro') 
           ->leftjoin('cat_coord_territorials','cat_coord_territorials.ct2','=','users.name')
           ->leftjoin('cat_delegaciones','cat_delegaciones.id','=','cat_coord_territorials.id_alcaldia')
           
           ->whereBetween('tb_asistencias_miercoles.fecha', [$fecha1,$fecha2])
           ->where('cat_delegaciones.delegacion',$alc)
           ->whereIn('tb_asistencias_miercoles.ins', array("titular","titular,suplente"))
           ->where('cat_coord_territorials.ct2',$coordinacion->ct2)
           ->count('tb_asistencias_miercoles.fecha');
             
             
             
         }
         
         
         $array_general=array($array1,$array2,$array3,$array4,$array5,$array6,$array7,$array8);
         
         
       
         
         $array_global=array($array_general,$array_coor);
          
          return json_encode($array_global);
         
     }
  

    
    
   
     
     
    public function view_listado_asistencias_miercoles()
    {   
        $asistencias = DB::table('tb_asistencias_miercoles')->select("tb_asistencias_miercoles.*","cat_coord_territorials.ct2","cat_coord_territorials.sector")
                    ->leftjoin('users','users.id','=','tb_asistencias_miercoles.user_registro') 
                    ->leftjoin('cat_coord_territorials','cat_coord_territorials.ct2','=','users.name')
                   ->where('tb_asistencias_miercoles.user_registro',\Auth::user()->id)
                   ->get();


        return view('consulta_asistencia_miercoles',compact('asistencias'));
    }
    
    
    public function excel_asistencias_miercoles()
    {   


            return Excel::download(new Asistencias_miercolesExport, 'asistencias_miercoles.xlsx');

        
    }
  
  
  
 
    
  
   public function grafica_alcaldia_miercoles_vecino()
    {   
        
       $alcaldias = \App\catDelegaciones::All();
        return view('grafica_alcaldia_miercoles_vecino',compact('alcaldias'));
    }
    
  
    public function datos_grafica_alc_miercoles_vecino($fecha1,$fecha2,$alc){
         
           $coordinaciones = DB::table('cat_delegaciones')->select('cat_coord_territorials.ct2')
           ->leftjoin('cat_coord_territorials','cat_coord_territorials.id_alcaldia','=','cat_delegaciones.id')
           ->where('cat_delegaciones.delegacion',$alc)
           ->get();
           


           
         //  return json_encode($datos1);
         
         //opciones
          $array1= array();//vecino
        
          $array_coor=array();
         
         foreach($coordinaciones as $coordinacion){
             
             
           $array_coor[]=$coordinacion->ct2;
            
          
          
              $array1[] = DB::table('tb_asistencias_miercoles')
           ->select('tb_asistencias_miercoles.*',"cat_coord_territorials.ct2",'cat_delegaciones.delegacion')
           ->leftjoin('users','users.id','=','tb_asistencias_miercoles.user_registro') 
           ->leftjoin('cat_coord_territorials','cat_coord_territorials.ct2','=','users.name')
           ->leftjoin('cat_delegaciones','cat_delegaciones.id','=','cat_coord_territorials.id_alcaldia')
           
           ->whereBetween('tb_asistencias_miercoles.fecha', [$fecha1,$fecha2])
           ->where('cat_delegaciones.delegacion',$alc)
           ->whereIn('tb_asistencias_miercoles.vecino')
           ->where('cat_coord_territorials.ct2',$coordinacion->ct2)
           ->count('tb_asistencias_miercoles.fecha');
         }
         
         
         $array_general=array($array1);
         
        return json_encode($array_general);
     }

    public function query_ejemplo($fecha1,$fecha2,$alc){
           
          
           $coordinaciones = DB::table('cat_delegaciones')
           ->select('cat_coord_territorials.ct2')
           ->leftjoin('cat_coord_territorials','cat_coord_territorials.id_alcaldia','=','cat_delegaciones.id')
           ->where('cat_delegaciones.delegacion',$alc)
           ->get();
        
         
          $array1= array();//vecino
          
          
           $array_coor=array();
         
      
         foreach($coordinaciones as $coordinacion){
             
          
         $array_coor[]=$coordinacion->ct2;
           
        $array1[] = DB::table('tb_asistencias_miercoles')
               
                
              
                ->leftjoin('users','users.id','=','tb_asistencias_miercoles.user_registro') 
                ->leftjoin('cat_coord_territorials','cat_coord_territorials.ct2','=','users.name')
                ->leftjoin('cat_delegaciones','cat_delegaciones.id','=','cat_coord_territorials.id_alcaldia') 
              
                ->whereBetween('tb_asistencias_miercoles.fecha', [$fecha1,$fecha2])
               
                ->where('cat_delegaciones.delegacion',$alc)
               
                ->where('cat_coord_territorials.ct2',$coordinacion->ct2)
               
                ->sum('tb_asistencias_miercoles.vecino');
         }
         
        
         $result_array = array();
       

          foreach ($array1 as $each_number) {
              $result_array[] = (int) $each_number;
          }
         
       
          $array_general=array( $array_coor,$result_array);
         
         return json_encode($array_general);
        

        
         
      }


  
     public function registro_admin_miercoles()
    {   
        
             $users = \App\user::All();
             return view('home_registro_admin_miercoles',compact('users'));
    }
  
 public function guardarAsistenciaAdmin_miercoles(Request $request){


        $validator = Validator::make($request->all(), [
                 'fecha' => 'required',
                 'hora1' => 'required',
                 'hora2' => 'required',
                 'se_realizo_mesa' => 'required'
             ]);



        if ($validator->fails()) {

           $messages = $validator->messages();
           // send back to the page with the input data and errors
           return Redirect::to('/home')->withInput()->withErrors($validator);

         }else if ($validator->passes()){


            if($request['jg']==null){
                $array_jg="SIN DATO";
            }else{
                $array_jg = implode(",",$request['jg']);
            }


            if($request['mp']==null){
                $array_mp="SIN DATO";
            }else{
                $array_mp = implode(",",$request['mp']);
            }



            if($request['jsp']==null){
                $array_jsp="SIN DATO";
            }else{
                $array_jsp = implode(",",$request['jsp']);
            }



            if($request['jspi']==null){
                $array_jspi="SIN DATO";
            }else{
                $array_jspi = implode(",",$request['jspi']);
            }



            if($request['jc']==null){
                $array_jc="SIN DATO";
            }else{
                $array_jc = implode(",",$request['jc']);
            }

             if($request['ml']==null){
                $array_ml="SIN DATO";
            }else{
                $array_ml = implode(",",$request['ml']);
            }



            if($request['otros']==null){
                $array_ot="SIN DATO";
            }else{
                $array_ot = implode(",",$request['otros']);
            }
            
            
             if($request['representante_alcaldia']==null){
                $array_ra="SIN DATO";
            }else{
                $array_ra = implode(",",$request['representante_alcaldia']);
            }

               if($request['ins']==null){
                $array_ins="SIN DATO";
            }else{
                $array_ins = implode(",",$request['ins']);
            }
            
             if($request['vecino']==null){
                $array_vecino="SIN DATO";
            }else{
                $array_vecino = $request['vecino'];
            }
              
              if($request['archivo']!=null){
            $imagen_nombre=rand(11111,99999).'.jpg';
            $destinationPath='alcaldias';
              }else{
              $imagen_nombre=null;
               
              }

          
            
            if ($request['se_realizo_mesa']=='si') {
                
            DB::table('tb_asistencias_miercoles')->insert([  
                       'id_ct' => $request['ct'],
                       'se_realizo' => $request['se_realizo_mesa'], 
                       'no_motivo' => $request['motivo'],

                       'fecha' => $request['fecha'],
                       'hora_i' => $request['hora1'],
                       'hora_f' => $request['hora2'],
                       
                       'jg' => $array_jg,
                       'mp' => $array_mp,
                       'jsp' => $array_jsp,
                       'jspi' => $array_jspi,
                       'jc' => $array_jc,
                       'ml' => $array_ml,
                       'otro' => $array_ot,
                       'representante_alcaldia'=>$array_ra,
                       'ins' => $array_ins,
                       'vecino' => $array_vecino,
                       //'reunionjg' => $array_reunionjg,
                       'archivo_imagen' => $imagen_nombre,
                       'user_registro'=> $request['user']
                    ]); 

            if($request['archivo']!=null){
                 $request['archivo']->move($destinationPath,$imagen_nombre);
            }

            }else{
                DB::table('tb_asistencias_miercoles')->insert([  
                        'id_ct' => $request['ct'],
                        'se_realizo' => $request['se_realizo_mesa'], 
                        'no_motivo' => $request['motivo'],
                        
                        'fecha' => $request['fecha'],
                        'hora_i' => $request['hora1'],
                        'hora_f' => $request['hora2'],
                       
                        'jg' => 'No se realizo',
                        'mp' => 'No se realizo',
                        'jsp' => 'No se realizo',
                        'jspi' => 'No se realizo',
                        'jc' => 'No se realizo',
                        'ml' => 'No se realizo',
                        'otro' => 'No se realizo',
                        'representante_alcaldia'=>'No se realizo',
                        'ins' => 'No se realizo',
                        'vecino' => 'No se realizo',
                        //'reunionjg' => 'No se realizo',
                        'archivo_imagen' => $imagen_nombre,
                        'user_registro'=> $request['user']
                     ]); 


            }



                 $mensaje = array('mensaje'=>'Asistencia Vespertina Éxitosa!', 'color'=> 'success');
                 return Redirect::to('/asistencia_admin_miercoles/')->with('mensaje', $mensaje);
         }
         
 }
 







 }

  
  
  
  


