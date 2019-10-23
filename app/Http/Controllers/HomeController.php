<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

use Validator;
use Illuminate\Support\Facades\Redirect;


use App\Exports\AsistenciasExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\Reporte_fechaExport;
use App\Exports\FaltantesExport;
use App\Exports\Reportes_periodosExport;

use Maatwebsite\Excel\Concerns\WithDrawings;
use Maatwebsite\Excel\Concerns\WithEvents;



use PhpOffice\PhpSpreadsheet\Worksheet\BaseDrawing;






class HomeController extends Controller
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
        
     
        
         $existe_registro = \App\tbAsistencia::select("tb_asistencias.*")
                   ->where("tb_asistencias.user_registro",\Auth::user()->id)
                   ->where("tb_asistencias.fecha",$fecha_actual)
                   ->first();
                   
        if($existe_registro){
            
           return view('home_limite');
            
        }else{
            
              $alcaldias = \App\catDelegaciones::All();
             return view('home',compact('alcaldias'));
            
        }

  
 
    }

    public function getCtAlcaldia($id){

        $cts = \App\catCoordTerritorial::select("cat_coord_territorials.*")
                   ->where("cat_coord_territorials.id_alcaldia",$id)
                   ->get();

        return json_encode($cts);

    }

    public function guardarAsistencia(Request $request){


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
            
            
             if($request['reunionjg']==null){
               $array_reunionjg="SIN DATO";
            }else{
                $array_reunionjg = $request['reunionjg'];
                
            }
            

            



            
            if ($request['se_realizo_mesa']=='si') {
               $inserto = \App\tbAsistencia::create([ 
                       //'id' => 100, 
                       'id_ct' => $request['ct'],
                       'se_realizo' => $request['se_realizo_mesa'], 
                       'no_motivo' => $request['motivo'],

                       'fecha' => $request['fecha'],
                       'hora_i' =>$hora_i_compuesta,
                      // 'minutos_i' => $request['minutos_i'],
                       'hora_f' => $hora_f_compuesta,
                     //  'minutos_t' => $request['minutos_t'],
                       
                       'jg' => $array_jg,
                       'mp' => $array_mp,
                       'jsp' => $array_jsp,
                       'jspi' => $array_jspi,
                       'jc' => $array_jc,
                       'ml' => $array_ml,
                       'otro' => $array_ot,
                       'representante_alcaldia'=>$array_ra,
                       'ins' => $array_ins,
                       'reunionjg' => $array_reunionjg,
                      // 'hora_inicio'=> $array_hora_inicio,
                       'user_registro'=> \Auth::user()->id
                    ]); 

            }else{
                $inserto = \App\tbAsistencia::create([  
                        //'id' => 100, 
                        'id_ct' => $request['ct'],
                        'se_realizo' => $request['se_realizo_mesa'], 
                        'no_motivo' => $request['motivo'],
                        
                        'fecha' => $request['fecha'],
                        'hora_i' =>$hora_i_compuesta,
                        //'minutos_i' => $request['minutos_i'],
                        'hora_f' => $hora_f_compuesta,
                        //'minutos_t' => $request['minutos_t'],
                       
                        'jg' => 'Reunión con JG',
                        'mp' => 'Reunión con JG',
                        'jsp' => 'Reunión con JG',
                        'jspi' => 'Reunión con JG',
                        'jc' => 'Reunión con JG',
                        'ml' => 'Reunión con JG',
                        'otro' => 'Reunión con JG',
                        'representante_alcaldia'=>'Reunión con JG',
                        'ins' => 'Reunión con JG',
                        'reunionjg' => 'Reunión con JG',
                        //'hora_inicio' => 'Reunión con JG',
                        'user_registro'=> \Auth::user()->id
                     ]); 


            }



                 $mensaje = array('mensaje'=>'¡Asistencia Matutina Éxitosa!', 'color'=> 'success');
                 return Redirect::to('/home/')->with('mensaje', $mensaje);
         }







    }



    public function view_listado_asistencias()
    {   
        $asistencias = \App\tbAsistencia::select("tb_asistencias.*","cat_coord_territorials.ct2","cat_coord_territorials.sector")
                    ->leftjoin('users','users.id','=','tb_asistencias.user_registro') 
                    ->leftjoin('cat_coord_territorials','cat_coord_territorials.ct2','=','users.name')
                   ->where('tb_asistencias.user_registro',\Auth::user()->id)
                   ->get();


        return view('consulta_asistencia',compact('asistencias'));
    }


      public function excel_asistencias()
    {   

       return Excel::download(new AsistenciasExport, 'asistencias.xlsx');
    }


      public function excel_asistencias_por_fecha()
    {   
        
       $timezone = new \DateTimeZone('America/Mexico_City');
       $date = new \DateTime();
       $date->setTimeZone($timezone); 
       $fecha_actual=$date->format('Y-m-d');


          return Excel::download(new Reporte_fechaExport($fecha_actual), 'REPORTE DIARIO GM ASISTENCIA.xlsx');
    }


    
          public function excel_asistencias_por_fecha_al()
               {   
        
               Excel::create(' Excel', function($excel) {

                $excel->sheet('excel', function($sheet) {
                    
                    
                    
        $timezone = new \DateTimeZone('America/Mexico_City');
        $date = new \DateTime();
        $date->setTimeZone($timezone); 
        $fecha_actual=$date->format('Y-m-d');

              

                    $datos = \App\tbAsistencia::select("tb_asistencias.id","cat_delegaciones.delegacion","tb_asistencias.se_realizo","tb_asistencias.no_motivo","tb_asistencias.fecha","tb_asistencias.hora_i","tb_asistencias.hora_f","tb_asistencias.jg","tb_asistencias.mp","tb_asistencias.jsp","tb_asistencias.jspi","tb_asistencias.jc","tb_asistencias.ml","tb_asistencias.otro",'tb_asistencias.representante_alcaldia',"tb_asistencias.ins","tb_asistencias.reunionjg")
                      ->leftjoin('users','users.id','=','tb_asistencias.user_registro') 
                    ->join('cat_delegaciones','cat_delegaciones.delegacion','=','users.name')
                    ->whereBetween('tb_asistencias.fecha', [$fecha_actual, $fecha_actual])
                   ->get();



                    $sheet->fromArray($datos);

                });

            })->create('xlsx');



        
    }
    
    
    
    /*  public function fecha_real_captura()
    {
        
        
        $timezone = new \DateTimeZone('America/Mexico_City');
        $date = new \DateTime();
        $date->setTimeZone($timezone); 
        $fecha_actual=$date->format('Y-m-d');
        
       
        
        
                 $datos = \App\tbAsistencia::select(
                 DB::raw('DATE_ADD(tb_asistencias.created_at, INTERVAL -6 HOUR) as fecha_real')
                 
                 ,"tb_asistencias.created_at as fecha_servidor")
                 ->whereBetween('tb_asistencias.fecha', [$fecha_actual, $fecha_actual])
                    ->get();
        
        return json_encode($datos);
    }*/
    
    
      public function reportes()
    {
        
        
        return view('reporte_fecha');
        
    }







      public function obtener_excel(Request $request)
    {

      $fecha1=$request['fecha'];
      $fecha2=$request['fecha2'];


         return Excel::download(new Reportes_periodosExport($fecha1, $fecha2), 'REPORTE GM POR PERIÓDO.xlsx');

    }
    
    
       public function grafica()
    {
        
        
        return view('graficas_asistencia');
        
    }
    
    
    public function datos_grafica($fecha1,$fecha2){
        
        
        
        
         $timezone = new \DateTimeZone('America/Mexico_City');
        $date = new \DateTime();
        $date->setTimeZone($timezone); 
        $fecha_actual=$date->format('Y-m-d');
        
        
        if($fecha1==null||$fecha2==null){
            $fecha1=$fecha_actual;
            $fecha2=$fecha_actual;
        }
        
        
        
        //TITULAR
        
        $datos1 = DB::table('tb_asistencias')
          ->whereBetween('tb_asistencias.fecha', [$fecha1,$fecha2])
          ->where("tb_asistencias.jg","titular")
          ->count(DB::raw('DISTINCT user_registro'));
        $datos2 = DB::table('tb_asistencias')
          ->whereBetween('tb_asistencias.fecha', [$fecha1,$fecha2])
          ->where("tb_asistencias.mp","titular")
          ->count(DB::raw('DISTINCT user_registro'));
        $datos3 = DB::table('tb_asistencias')
          ->whereBetween('tb_asistencias.fecha', [$fecha1,$fecha2])
          ->where("tb_asistencias.jsp","titular")
          ->count(DB::raw('DISTINCT user_registro'));
        $datos4 = DB::table('tb_asistencias')
          ->whereBetween('tb_asistencias.fecha', [$fecha1,$fecha2])
          ->where("tb_asistencias.jspi","titular")
          ->count(DB::raw('DISTINCT user_registro'));
        $datos5 = DB::table('tb_asistencias')
          ->whereBetween('tb_asistencias.fecha', [$fecha1,$fecha2])
          ->where("tb_asistencias.jc","titular")
          ->count(DB::raw('DISTINCT user_registro'));
        $datos6 = DB::table('tb_asistencias')
          ->whereBetween('tb_asistencias.fecha', [$fecha1,$fecha2])
          ->where("tb_asistencias.ml","titular")
          ->count(DB::raw('DISTINCT user_registro'));
        $datos7 = DB::table('tb_asistencias')
          ->whereBetween('tb_asistencias.fecha', [$fecha1,$fecha2])
          ->where("tb_asistencias.representante_alcaldia","titular")
          ->count(DB::raw('DISTINCT user_registro'));
        $datos8 = DB::table('tb_asistencias')
          ->whereBetween('tb_asistencias.fecha', [$fecha1,$fecha2])
          ->where("tb_asistencias.ins","titular")
          ->count(DB::raw('DISTINCT user_registro'));
          
          
        //SUPLENTE
        
        $datos1_s = DB::table('tb_asistencias')
          ->whereBetween('tb_asistencias.fecha', [$fecha1,$fecha2])
          ->where("tb_asistencias.jg","suplente")
          ->count(DB::raw('DISTINCT user_registro'));
        $datos2_s = DB::table('tb_asistencias')
          ->whereBetween('tb_asistencias.fecha', [$fecha1,$fecha2])
          ->where("tb_asistencias.mp","suplente")
          ->count(DB::raw('DISTINCT user_registro'));
        $datos3_s = DB::table('tb_asistencias')
          ->whereBetween('tb_asistencias.fecha', [$fecha1,$fecha2])
          ->where("tb_asistencias.jsp","suplente")
          ->count(DB::raw('DISTINCT user_registro'));
        $datos4_s = DB::table('tb_asistencias')
          ->whereBetween('tb_asistencias.fecha', [$fecha1,$fecha2])
          ->where("tb_asistencias.jspi","suplente")
          ->count(DB::raw('DISTINCT user_registro'));
        $datos5_s = DB::table('tb_asistencias')
          ->whereBetween('tb_asistencias.fecha', [$fecha1,$fecha2])
          ->where("tb_asistencias.jc","suplente")
          ->count(DB::raw('DISTINCT user_registro'));
        $datos6_s = DB::table('tb_asistencias')
          ->whereBetween('tb_asistencias.fecha', [$fecha1,$fecha2])
          ->where("tb_asistencias.ml","suplente")
          ->count(DB::raw('DISTINCT user_registro'));
        $datos7_s = DB::table('tb_asistencias')
          ->whereBetween('tb_asistencias.fecha', [$fecha1,$fecha2])
          ->where("tb_asistencias.representante_alcaldia","suplente")
          ->count(DB::raw('DISTINCT user_registro'));
        $datos8_s = DB::table('tb_asistencias')
          ->whereBetween('tb_asistencias.fecha', [$fecha1,$fecha2])
          ->where("tb_asistencias.ins","suplente")
          ->count(DB::raw('DISTINCT user_registro'));
          
          
          
       //AMBOS
        
        $datos1_ambos = DB::table('tb_asistencias')
          ->whereBetween('tb_asistencias.fecha', [$fecha1,$fecha2])
          ->where("tb_asistencias.jg","titular,suplente")
          ->count(DB::raw('DISTINCT user_registro'));
        $datos2_ambos = DB::table('tb_asistencias')
          ->whereBetween('tb_asistencias.fecha', [$fecha1,$fecha2])
          ->where("tb_asistencias.mp","titular,suplente")
          ->count(DB::raw('DISTINCT user_registro'));
        $datos3_ambos = DB::table('tb_asistencias')
          ->whereBetween('tb_asistencias.fecha', [$fecha1,$fecha2])
          ->where("tb_asistencias.jsp","titular,suplente")
          ->count(DB::raw('DISTINCT user_registro'));
        $datos4_ambos = DB::table('tb_asistencias')
          ->whereBetween('tb_asistencias.fecha', [$fecha1,$fecha2])
          ->where("tb_asistencias.jspi","titular,suplente")
          ->count(DB::raw('DISTINCT user_registro'));
        $datos5_ambos = DB::table('tb_asistencias')
          ->whereBetween('tb_asistencias.fecha', [$fecha1,$fecha2])
          ->where("tb_asistencias.jc","titular,suplente")
          ->count(DB::raw('DISTINCT user_registro'));
        $datos6_ambos = DB::table('tb_asistencias')
          ->whereBetween('tb_asistencias.fecha', [$fecha1,$fecha2])
          ->where("tb_asistencias.ml","titular,suplente")
          ->count(DB::raw('DISTINCT user_registro'));
        $datos7_ambos = DB::table('tb_asistencias')
          ->whereBetween('tb_asistencias.fecha', [$fecha1,$fecha2])
          ->where("tb_asistencias.representante_alcaldia","titular,suplente")
          ->count(DB::raw('DISTINCT user_registro'));
          
        $datos8_ambos = DB::table('tb_asistencias')
          ->whereBetween('tb_asistencias.fecha', [$fecha1,$fecha2])
          ->where("tb_asistencias.ins","titular,suplente")
          ->count(DB::raw('DISTINCT user_registro'));
          
         
        
               //NO ASISTIO
        
        $datos1_na = DB::table('tb_asistencias')
          ->whereBetween('tb_asistencias.fecha', [$fecha1,$fecha2])
         // ->where("tb_asistencias.jg","No asistió")
           ->whereIn('tb_asistencias.jg', array("No asistió", "SIN DATO"))
          
          
         
          ->count(DB::raw('DISTINCT user_registro'));
        $datos2_na = DB::table('tb_asistencias')
          ->whereBetween('tb_asistencias.fecha', [$fecha1,$fecha2])
         //->where("tb_asistencias.mp","No asistió")
         ->whereIn('tb_asistencias.mp', array("No asistió", "SIN DATO"))
          
          ->count(DB::raw('DISTINCT user_registro'));
        $datos3_na = DB::table('tb_asistencias')
          ->whereBetween('tb_asistencias.fecha', [$fecha1,$fecha2])
          //->where("tb_asistencias.jsp","No asistió")
          ->whereIn('tb_asistencias.jsp', array("No asistió", "SIN DATO"))
          
          ->count(DB::raw('DISTINCT user_registro'));
        $datos4_na = DB::table('tb_asistencias')
          ->whereBetween('tb_asistencias.fecha', [$fecha1,$fecha2])
          //->where("tb_asistencias.jspi","No asistió")
          ->whereIn('tb_asistencias.jspi', array("No asistió", "SIN DATO"))
         
          ->count(DB::raw('DISTINCT user_registro'));
        $datos5_na = DB::table('tb_asistencias')
          ->whereBetween('tb_asistencias.fecha', [$fecha1,$fecha2])
          //->where("tb_asistencias.jc","No asistió")
          ->whereIn('tb_asistencias.jc', array("No asistió", "SIN DATO"))
         
          ->count(DB::raw('DISTINCT user_registro'));
        $datos6_na = DB::table('tb_asistencias')
          ->whereBetween('tb_asistencias.fecha', [$fecha1,$fecha2])
          //->where("tb_asistencias.ml","No asistió")
          ->whereIn('tb_asistencias.ml', array("No asistió", "SIN DATO"))
         
          ->count(DB::raw('DISTINCT user_registro'));
        $datos7_na = DB::table('tb_asistencias')
          ->whereBetween('tb_asistencias.fecha', [$fecha1,$fecha2])
          //->where("tb_asistencias.representante_alcaldia","No asistió")
           ->whereIn('tb_asistencias.representante_alcaldia', array("No asistió", "SIN DATO"))
           
           
          ->count(DB::raw('DISTINCT user_registro'));
        $datos8_na = DB::table('tb_asistencias')
          ->whereBetween('tb_asistencias.fecha', [$fecha1,$fecha2])
          //->where("tb_asistencias.ins","No asistió")
           ->whereIn('tb_asistencias.ins', array("No asistió", "SIN DATO"))
         
          ->count(DB::raw('DISTINCT user_registro'));
          
          
          
          
          
          
        
                    $array= array($datos1,$datos2,$datos3,$datos4,$datos5,$datos6,$datos7,$datos8);
                    $array2= array($datos1_s,$datos2_s,$datos3_s,$datos4_s,$datos5_s,$datos6_s,$datos7_s,$datos8_s);
                    $array3= array($datos1_na,$datos2_na,$datos3_na,$datos4_na,$datos5_na,$datos6_na,$datos7_na,$datos8_na);
                    $array4= array($datos1_ambos,$datos2_ambos,$datos3_ambos,$datos4_ambos,$datos5_ambos,$datos6_ambos,$datos7_ambos,$datos8_ambos);
                    
                    
                    $array_general=array($array,$array2,$array3,$array4);
                    
                
                    
         return json_encode($array_general);
    }
    
    
    
    public function vista_faltantes()
    {   
   
        return view('faltantes');
    }



    
    public function faltantes(Request $request)
    {
        
        
        $fecha1=$request['fecha'];
        $fecha2=$request['fecha2'];


         return Excel::download(new FaltantesExport($fecha1, $fecha2), 'REPORTE GM FALTANTES.xlsx');

       
    }
    
    
     public function graficaDelegaciones()
    {   
        
       $alcaldias = \App\catDelegaciones::All();
        return view('grafica_delegaciones',compact('alcaldias'));
    }
    
    
    
    
    
    
     public function datos_grafica_alc($fecha1,$fecha2,$alc){
         
           $coordinaciones = DB::table('cat_delegaciones')
           ->select('cat_coord_territorials.ct2')
           ->leftjoin('cat_coord_territorials','cat_coord_territorials.id_alcaldia','=','cat_delegaciones.id')
           ->where('cat_delegaciones.delegacion',$alc)
           ->get();
           
           
         //  return json_encode($datos1);
         
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
             
             
           $array1[] = DB::table('tb_asistencias')
           ->select('tb_asistencias.*',"cat_coord_territorials.ct2",'cat_delegaciones.delegacion')
           ->leftjoin('users','users.id','=','tb_asistencias.user_registro') 
           ->leftjoin('cat_coord_territorials','cat_coord_territorials.ct2','=','users.name')
           ->leftjoin('cat_delegaciones','cat_delegaciones.id','=','cat_coord_territorials.id_alcaldia')
           
           ->whereBetween('tb_asistencias.fecha', [$fecha1,$fecha2])
           ->where('cat_delegaciones.delegacion',$alc)
           ->whereIn('tb_asistencias.jg', array("titular","titular,suplente"))
           ->where('cat_coord_territorials.ct2',$coordinacion->ct2)
           ->count('tb_asistencias.fecha');
           
           
           $array2[] = DB::table('tb_asistencias')
           ->select('tb_asistencias.*',"cat_coord_territorials.ct2",'cat_delegaciones.delegacion')
           ->leftjoin('users','users.id','=','tb_asistencias.user_registro') 
           ->leftjoin('cat_coord_territorials','cat_coord_territorials.ct2','=','users.name')
           ->leftjoin('cat_delegaciones','cat_delegaciones.id','=','cat_coord_territorials.id_alcaldia')
           
           ->whereBetween('tb_asistencias.fecha', [$fecha1,$fecha2])
           ->where('cat_delegaciones.delegacion',$alc)
           ->whereIn('tb_asistencias.mp', array("titular","titular,suplente"))
           ->where('cat_coord_territorials.ct2',$coordinacion->ct2)
           ->count('tb_asistencias.fecha');
           
           
           $array3[] = DB::table('tb_asistencias')
           ->select('tb_asistencias.*',"cat_coord_territorials.ct2",'cat_delegaciones.delegacion')
           ->leftjoin('users','users.id','=','tb_asistencias.user_registro') 
           ->leftjoin('cat_coord_territorials','cat_coord_territorials.ct2','=','users.name')
           ->leftjoin('cat_delegaciones','cat_delegaciones.id','=','cat_coord_territorials.id_alcaldia')
           
           ->whereBetween('tb_asistencias.fecha', [$fecha1,$fecha2])
           ->where('cat_delegaciones.delegacion',$alc)
           ->whereIn('tb_asistencias.jsp', array("titular","titular,suplente"))
           ->where('cat_coord_territorials.ct2',$coordinacion->ct2)
           ->count('tb_asistencias.fecha');
           
           
           $array4[] = DB::table('tb_asistencias')
           ->select('tb_asistencias.*',"cat_coord_territorials.ct2",'cat_delegaciones.delegacion')
           ->leftjoin('users','users.id','=','tb_asistencias.user_registro') 
           ->leftjoin('cat_coord_territorials','cat_coord_territorials.ct2','=','users.name')
           ->leftjoin('cat_delegaciones','cat_delegaciones.id','=','cat_coord_territorials.id_alcaldia')
           
           ->whereBetween('tb_asistencias.fecha', [$fecha1,$fecha2])
           ->where('cat_delegaciones.delegacion',$alc)
           ->whereIn('tb_asistencias.jspi', array("titular","titular,suplente"))
           ->where('cat_coord_territorials.ct2',$coordinacion->ct2)
           ->count('tb_asistencias.fecha');
           
           
           $array5[] = DB::table('tb_asistencias')
           ->select('tb_asistencias.*',"cat_coord_territorials.ct2",'cat_delegaciones.delegacion')
           ->leftjoin('users','users.id','=','tb_asistencias.user_registro') 
           ->leftjoin('cat_coord_territorials','cat_coord_territorials.ct2','=','users.name')
           ->leftjoin('cat_delegaciones','cat_delegaciones.id','=','cat_coord_territorials.id_alcaldia')
           
           ->whereBetween('tb_asistencias.fecha', [$fecha1,$fecha2])
           ->where('cat_delegaciones.delegacion',$alc)
           ->whereIn('tb_asistencias.jc', array("titular","titular,suplente"))
           ->where('cat_coord_territorials.ct2',$coordinacion->ct2)
           ->count('tb_asistencias.fecha');
           
           
           $array6[] = DB::table('tb_asistencias')
           ->select('tb_asistencias.*',"cat_coord_territorials.ct2",'cat_delegaciones.delegacion')
           ->leftjoin('users','users.id','=','tb_asistencias.user_registro') 
           ->leftjoin('cat_coord_territorials','cat_coord_territorials.ct2','=','users.name')
           ->leftjoin('cat_delegaciones','cat_delegaciones.id','=','cat_coord_territorials.id_alcaldia')
           
           ->whereBetween('tb_asistencias.fecha', [$fecha1,$fecha2])
           ->where('cat_delegaciones.delegacion',$alc)
           ->whereIn('tb_asistencias.ml', array("titular","titular,suplente"))
           ->where('cat_coord_territorials.ct2',$coordinacion->ct2)
           ->count('tb_asistencias.fecha');
           
           
           $array7[] = DB::table('tb_asistencias')
           ->select('tb_asistencias.*',"cat_coord_territorials.ct2",'cat_delegaciones.delegacion')
           ->leftjoin('users','users.id','=','tb_asistencias.user_registro') 
           ->leftjoin('cat_coord_territorials','cat_coord_territorials.ct2','=','users.name')
           ->leftjoin('cat_delegaciones','cat_delegaciones.id','=','cat_coord_territorials.id_alcaldia')
           
           ->whereBetween('tb_asistencias.fecha', [$fecha1,$fecha2])
           ->where('cat_delegaciones.delegacion',$alc)
           ->whereIn('tb_asistencias.representante_alcaldia', array("titular","titular,suplente"))
           ->where('cat_coord_territorials.ct2',$coordinacion->ct2)
           ->count('tb_asistencias.fecha');
           
            $array8[] = DB::table('tb_asistencias')
           ->select('tb_asistencias.*',"cat_coord_territorials.ct2",'cat_delegaciones.delegacion')
           ->leftjoin('users','users.id','=','tb_asistencias.user_registro') 
           ->leftjoin('cat_coord_territorials','cat_coord_territorials.ct2','=','users.name')
           ->leftjoin('cat_delegaciones','cat_delegaciones.id','=','cat_coord_territorials.id_alcaldia')
           
           ->whereBetween('tb_asistencias.fecha', [$fecha1,$fecha2])
           ->where('cat_delegaciones.delegacion',$alc)
           ->whereIn('tb_asistencias.ins', array("titular","titular,suplente"))
           ->where('cat_coord_territorials.ct2',$coordinacion->ct2)
           ->count('tb_asistencias.fecha');
             
             
             
         }
         
         
         $array_general=array($array1,$array2,$array3,$array4,$array5,$array6,$array7,$array8);
         
         
       
         
         $array_global=array($array_general,$array_coor);
          
          return json_encode($array_global);
         
     }
     
     
       
     public function registro_admin()
    {   
        
             $users = \App\user::All();
             return view('home_registro_admin',compact('users'));
    }
  
 public function guardarAsistenciaAdmin(Request $request){


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

            if($request['reunionjg']==null){
               $array_reunionjg="SIN DATO";
            }else{
                $array_reunionjg = $request['reunionjg'];
                
            }


            
            if ($request['se_realizo_mesa']=='si') {
               $inserto = \App\tbAsistencia::create([  
                       'id_ct' => $request['ct'],
                       'se_realizo' => $request['se_realizo_mesa'], 
                       'no_motivo' => $request['motivo'],

                       'fecha' => $request['fecha'],
                       'hora_i' => $request['hora1'],
                       'hora_f' => $request['hora2'],
                       
                       'jg' => $array_jg,
                       'mp' =>  $array_mp,
                       'jsp' =>  $array_jsp,
                       'jspi' => $array_jspi,
                       'jc' => $array_jc,
                       'ml' => $array_ml,
                       'otro' => $array_ot,
                       'representante_alcaldia'=>$array_ra,
                       'ins' => $array_ins,
                       'reunionjg' => $array_reunionjg,
                       'user_registro'=> $request['user']
                    ]); 

            }else{
                $inserto = \App\tbAsistencia::create([  
                        'id_ct' => $request['ct'],
                        'se_realizo' => $request['se_realizo_mesa'], 
                        'no_motivo' => $request['motivo'],
                        
                        'fecha' => $request['fecha'],
                        'hora_i' => $request['hora1'],
                        'hora_f' => $request['hora2'],
                       
                        'jg' => 'Reunión con JG',
                        'mp' => 'Reunión con JG',
                        'jsp' => 'Reunión con JG',
                        'jspi' => 'Reunión con JG',
                        'jc' => 'Reunión con JG',
                        'ml' => 'Reunión con JG',
                        'otro' => 'Reunión con JG',
                        'representante_alcaldia'=>'Reunión con JG',
                        'ins' => 'Reunión con JG',
                        'reunionjg' => 'Reunión con JG',
                        'user_registro'=> $request['user']
                     ]); 


            }



                 $mensaje = array('mensaje'=>'Registro Éxitoso!', 'color'=> 'success');
                 return Redirect::to('/guardar_asistencia_admin')->with('mensaje', $mensaje);
         }
         
 }
 
 



  
 public function guardarUsuarioPdf(Request $request){


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
   
             if($request['reunionjg']==null){
               $array_reunionjg="SIN DATO";
            }else{
                $array_reunionjg = $request['reunionjg'];
                
            }
            
            if ($request['se_realizo_mesa']=='si') {
               $inserto = \App\tbAsistencia::create([  
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
                       'reunionjg' => $array_reunionjg,
                       'user_registro'=> $request['user']
                    ]); 

            }else{
                $inserto = \App\tbAsistencia::create([  
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
                        'reunionjg' => $array_reunionjg,
                        'user_registro'=> $request['user']
                     ]); 


            }



                 $mensaje = array('mensaje'=>'Registro  Éxitoso!', 'color'=> 'success');
                 return Redirect::to('/asistencia_admin/')->with('mensaje', $mensaje);
         }






    }

public function vistasubirpdf_admin(){
   
    
     {   
        
             $users = \App\user::All();
             $alcaldias = \App\catDelegaciones::All();
             return view('admin_pdf',compact('users','alcaldias'));
    }
    
    
}


public function guardar_pdf_admin(Request $request){
    
  
  
    //validaciones
     $validator = Validator::make($request->all(), [
                 'archivo' => 'required'
             ]);



        if ($validator->fails()) {

           $messages = $validator->messages();
        
           return Redirect::to('/adminpdfView')->withInput()->withErrors($validator);

         }else if ($validator->passes()){
            
            
            
         /*si existe el documento*/
        if($request['archivo']!=null){
        //$extension_archivo = $request['archivo']->getClientOriginalExtension(); // getting image extension
        $pdf_nombre = rand(11111,99999).'.pdf'; // renameing image
        $destinationPath = 'uploads/';//
        }else{
        $pdf_nombre=null;

        }
        /*fin existe el documento*/
             
               DB::table('tb_pdf')->insert([
                 'id_user' => $request['user'],
                 'id_alc' => $request['alcaldia'],
                 'descripcion' => $request['descripcion'],
                 'archivo_pdf' => $pdf_nombre
               ]);
        
        //GUARDAR ARCHIVO SI EXISTE       
        if($request['archivo']!=null){
            $request['archivo']->move($destinationPath,$pdf_nombre);
        }
               
               
                  $mensaje = array('mensaje'=>'Envio de Archivo Éxitoso!', 'color'=> 'success');
                 return Redirect::to('/adminpdfView/')->with('mensaje', $mensaje);
         
             
         }
         
    
}


 public function usuario_pdf()
    {   
            $get_alc_user=DB::table('cat_delegaciones')->select('cat_delegaciones.id') 
                        ->join('cat_coord_territorials','cat_coord_territorials.id_alcaldia','=','cat_delegaciones.id')
                         ->where('cat_coord_territorials.ct2',\Auth::user()->name)->first();
               if($get_alc_user!=null || $get_alc_user!='') {
               
                  $pdfs = DB::table('tb_pdf')->select('*')
                   ->where('id_user',\Auth::user()->id)
                   ->orWhere('id_alc',$get_alc_user->id)
                   ->get();
               }else{
                  
                   
                   $pdfs = DB::table('tb_pdf')->select('*')
                   
                 
                   ->get();
                   
               } 
                   
                
           // return json_encode($get_alc_user->delegacion);         
                         
          
             return view('usuario_pdf',compact('pdfs'));
    }
    
    



    
    
     public function get_mapa_file()
    {   
             return view('mapas_externos.Mapa');
    }

    
    public function mapa()
    {   
             return view('mapa');
    }
    
        public function misvinculos()
    {   
             return view('vinculos');
    }

     public function mismapas()
    {   
             
              $coord=DB::table('cat_coord_territorials')->select('cat_coord_territorials.ct2')->get();
             return view('mapas',compact('coord'));
    }





}
