<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

use Validator;
use Illuminate\Support\Facades\Redirect;

use Excel;

use App\Exports\CuestionarioExport;
use App\Exports\PreguntasExport;
use App\Exports\EntrevistasMpExport;
use App\Exports\AgendaExport;
use App\Exports\ListaExport;
use App\Exports\MiAgendaExport;
use App\Exports\SenderosExport;
use App\Exports\SenderoSeguroExport;
use App\Exports\VisitaCoordinacionExport;



use Image;

use Input;

use Storage;

class cuestionariosController extends Controller
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
    




     public function index()
    {   
        
        
        $timezone = new \DateTimeZone('America/Mexico_City');
        $date = new \DateTime();
        $date->setTimeZone($timezone); 
        $fecha_actual=$date->format('Y-m-d');
        
         
            $existe_registro= DB::table('tb_listas')
             ->where("tb_listas.user_registro",\Auth::user()->id)
                   ->where("tb_listas.fecha",$fecha_actual)
                   ->first();
      

  
      
               
    }
    
    public function seguridad(){

       $mis_cuadrantes= \App\catCuadrantes::select('cat_cuadrantes.id','cat_cuadrantes.cuadrante')
                        ->join('users','users.name','=','cat_cuadrantes.ct')
                        ->where('users.id',\Auth::user()->id)
                        ->get();

        
        return view('cuestionarios.cuestionario_seguridad',compact('mis_cuadrantes'));
       
       
    }
    
    public function save_cuestionario_seguridad(Request $request){
        
        $preguntas =$request->except('_token');
        
        $preguntas['id_user']=\Auth::user()->id;
        
        \App\tbCuestionarios::create($preguntas);
        
          $mensaje = array('mensaje'=>'Registro  Éxitoso!', 'color'=> 'success');
          return Redirect::to('/cuestionario')->with('mensaje', $mensaje);
        
    }
    
    public function excel_cuestionarioseguridad(){
        
        
        return Excel::download(new  CuestionarioExport, 'CUESTIONARIO VISITAS DOMICILIARIAS.xlsx');
      
        
    }
    
    ///////////////////////////////////////////////PREGUNTAS///////////////////////////

     public function preguntas(){


       $mis_cuadrantes= \App\catCuadrantes::select('cat_cuadrantes.id','cat_cuadrantes.cuadrante')
                        ->join('users','users.name','=','cat_cuadrantes.ct')
                        ->where('users.id',\Auth::user()->id)
                        ->get();

        
        return view('preguntas.cuestionario_preguntas',compact('mis_cuadrantes'));
       

       
    }
    
  
public function regiones(){

       $mis_regiones= \App\catDelegaciones::select('cat_delegaciones.delegacion','cat_delegaciones.region')
                        ->join('cat_coord_territorials','cat_coord_territorials.id_alcaldia','=','cat_delegaciones.ct')
                        ->join('users','users.name','=','cat_delegaciones.ct')
                        ->where('users.id',\Auth::user()->id)
                        ->get();

        
        return view('preguntas.cuestionario_preguntas',compact('mis_regiones'));
       

       
    }

    public function save_cuestionario_preguntas(Request $request){
        
        $preguntas =$request->except('_token');
        
        $preguntas['id_user']=\Auth::user()->id;
        
        \App\tbPreguntas::create($preguntas);
        
          $mensaje = array('mensaje'=>'Registro  Éxitoso!', 'color'=> 'success');
          return Redirect::to('/preguntas')->with('mensaje', $mensaje);
        
    }
    
    public function excel_cuestionariopreguntas(){
        
        
        return Excel::download(new  PreguntasExport, 'RED DE CONTACTO CIUDADANO.xlsx');
      
        
    }
    


    


 public function view_listado_preguntas()
    {   
       /* $consultas = \App\tbPreguntas::select("tb_preguntas.*","cat_coord_territorials.ct2","cat_coord_territorials.sector","cat_delegaciones.delegacion")
        //,"cat_cuadrantes.ct","cat_cuadrantes.cuadrante","cat_delegaciones.delegacion","cat_delegaciones.region"
                    ->leftjoin('users','users.id','=','tb_preguntas.id_user') 
                    ->leftjoin('cat_coord_territorials','cat_coord_territorials.ct2','=','users.name')
                   // ->leftjoin('cat_cuadrantes','cat_cuadrantes.cuadrante','=','users.name')
                    ->leftjoin('cat_delegaciones','cat_delegaciones.delegacion','=','users.name')
                   ->where('tb_preguntas.id_user',\Auth::user()->id)
                   ->get();*/

         $consultas = \App\tbPreguntas::select("tb_preguntas.*","cat_delegaciones.delegacion","cat_delegaciones.region","cat_coord_territorials.ct2","cat_coord_territorials.sector","cat_cuadrantes.cuadrante")
                    ->leftjoin('users','users.id','=','tb_preguntas.id_user',"cat_coord_territorials.ct2")
                    ->leftjoin('cat_coord_territorials','cat_coord_territorials.ct2','=','users.name')
                     ->leftjoin('cat_delegaciones','cat_delegaciones.id','=','cat_coord_territorials.id_alcaldia')
                     ->leftjoin('cat_cuadrantes','cat_cuadrantes.id','=','tb_preguntas.id_cuadrante')
                     //->leftjoin('cat_cuadrantes','cat_cuadrantes.ct','=','cat_coord_territorials.ct2')
                    ->where('tb_preguntas.id_user',\Auth::user()->id)
                    ->get();

         // dd($consultas );
      // return json_encode($consultas); 
      return view('consulta_preguntas',compact('consultas'));
    }


      //public function excel_pregunta()
   // {   

    //   return Excel::download(new MiformatodevisitasExport, 'Mi Formato de Visitas.xlsx');
   // }

//////////////////////////////////////////////////ENTREVISTAS////////////////////////////////////////
 public function entrevistas(){


       $mis_cuadrantes= \App\catCuadrantes::select('cat_cuadrantes.id','cat_cuadrantes.cuadrante')
                        ->join('users','users.name','=','cat_cuadrantes.ct')
                        ->where('users.id',\Auth::user()->id)
                        ->get();

        
        return view('entrevistamp.cuestionario_mp',compact('mis_cuadrantes'));
       

       
    }



 public function save_cuestionario_entrevistas(Request $request){
        
        $entrevistas =$request->except('_token');
        
        $entrevistas['id_user']=\Auth::user()->id;
        
        \App\tbMinisterio::create($entrevistas);
        
          $mensaje = array('mensaje'=>'Registro  Éxitoso!', 'color'=> 'success');
          return Redirect::to('/entrevistas')->with('mensaje', $mensaje);
        
    }



public function excel_cuestionarioentrevistas(){
      
        
        return Excel::download(new  EntrevistasMpExport, 'ENTREVISTA MP.xlsx');
      
        
    }
    


/////////////////////////////////////////////////////AGENDA RJG /////////////////////////////////////




  public function agenda(){


       $mis_cuadrantes= \App\catCuadrantes::select('cat_cuadrantes.id','cat_cuadrantes.cuadrante')
                        ->join('users','users.name','=','cat_cuadrantes.ct')
                        ->where('users.id',\Auth::user()->id)
                        ->get();

        
        return view('agenda.cuestionario_agenda',compact('mis_cuadrantes'));
       

       
    }
    
  
public function regioness(){

       $mis_regiones= \App\catDelegaciones::select('cat_delegaciones.delegacion','cat_delegaciones.region')
                        ->join('cat_coord_territorials','cat_coord_territorials.id_alcaldia','=','cat_delegaciones.ct')
                        ->join('users','users.name','=','cat_delegaciones.ct')
                        ->where('users.id',\Auth::user()->id)
                        ->get();

        
        return view('agenda.cuestionario_agenda',compact('mis_regiones'));
       

       
    }
       

       


    public function save_cuestionario_agenda(Request $request){
        
        $agenda =$request->except('_token');
        
        $agenda['id_user']=\Auth::user()->id;
        
        \App\tbAgenda::create($agenda);
        
          $mensaje = array('mensaje'=>'Registro  Éxitoso!', 'color'=> 'success');
          return Redirect::to('/agenda')->with('mensaje', $mensaje);
        
    }
    
    public function excel_cuestionarioagenda(){
        
        
        return Excel::download(new  AgendaExport, 'AGENDA DE LAS RJG.xlsx');
      
        
    }
    

 


 public function view_listado_agendas()
    {   
      


 $consultas = \App\tbAgenda::select("tb_agendas.*","cat_delegaciones.delegacion","cat_delegaciones.region","cat_coord_territorials.ct2","cat_coord_territorials.sector","cat_cuadrantes.cuadrante")
                    ->leftjoin('users','users.id','=','tb_agendas.id_user',"cat_coord_territorials.ct2")
                    ->leftjoin('cat_coord_territorials','cat_coord_territorials.ct2','=','users.name')
                     ->leftjoin('cat_delegaciones','cat_delegaciones.id','=','cat_coord_territorials.id_alcaldia')
                     ->leftjoin('cat_cuadrantes','cat_cuadrantes.id','=','tb_agendas.id_cuadrante')
                     //->leftjoin('cat_cuadrantes','cat_cuadrantes.ct','=','cat_coord_territorials.ct2')
                     ->where("tb_agendas.status",true)
                    ->where('tb_agendas.id_user',\Auth::user()->id)
                    ->get();

         // dd($consultas );
      // return json_encode($consultas); 
      return view('consulta_agenda',compact('consultas'));

}


public function excel_agenda(){
        
        
        return Excel::download(new  MiAgendaExport, 'MI AGENDA.xlsx');
      
        
    }
    


    public function update_tabla_agenda($id) {
    $update_tabla_agenda = update_tabla_agenda::find($id);
    $update_tabla_agenda->delete();

     return view('/agenda');  
}




public function update($id) {
    
    cuestionario::destroy($id);
     return view('/agenda');
}



  //primera forma
  public function eliminar_registroAgenda(Request $request){

  //dd($request['id_registro']);

  /////////////////////////////////////////AQUI HACES EL UPDATE

    \App\tbAgenda::where('id', $request['id_registro'])
              ->update(['status' => false]);


  $mensaje = array('mensaje'=>'Eliminaciòn con Éxito!', 'color'=> 'success');
  return Redirect::to('/getlistadoagenda')->with('mensaje', $mensaje);

  }


//segunda forma

  public function eliminar_registroAgenda2opcion($id){

  //dd($id);

  /////////////////////////////////////////AQUI HACES EL UPDATE

    //UPDATE

  $mensaje = array('mensaje'=>'Eliminaciòn con Éxito!', 'color'=> 'success');
  return Redirect::to('/getlistadoagenda')->with('mensaje', $mensaje);

  }


//////////////////////////////////////////PASE DE////////////LISTA///////////////////////////////////////////////

    public function lista(){


       $mis_cuadrantes= \App\catCuadrantes::select('cat_cuadrantes.id','cat_cuadrantes.cuadrante')
                        ->join('users','users.name','=','cat_cuadrantes.ct')
                        ->where('users.id',\Auth::user()->id)
                        ->get();

        
        return view('lista.cuestionario_lista',compact('mis_cuadrantes'));
       

       
    }
    
  
public function regionest(){

       $mis_regiones= \App\catDelegaciones::select('cat_delegaciones.delegacion','cat_delegaciones.region')
                        ->join('cat_coord_territorials','cat_coord_territorials.id_alcaldia','=','cat_delegaciones.ct')
                        ->join('users','users.name','=','cat_delegaciones.ct')
                        ->where('users.id',\Auth::user()->id)
                        ->get();

        
        return view('lista.cuestionario_lista',compact('mis_regiones'));
       

       
    }



     public function fecha_real_captura()
    {
        
        
        $timezone = new \DateTimeZone('America/Mexico_City');
        $date = new \DateTime();
        $date->setTimeZone($timezone); 
        $fecha_actual=$date->format('Y-m-d');
        
       
        
        
                 $datos = \App\tbLista::select(
                 DB::raw('DATE_ADD(tb_listas.created_at, INTERVAL -1 HOUR) as fecha_real')
                 
                 ,"tb_listas.created_at as fecha_servidor")
                 ->whereBetween('tb_listas.fecha', [$fecha_actual, $fecha_actual])
                    ->get();
                 
        
        return json_encode($datos);
    }
    

    public function save_cuestionario_lista(Request $request){
        
       
       

         if($request['archivo']!=null){
        //$extension_archivo = $request['archivo']->getClientOriginalExtension(); // getting image extension
        $jpg_nombre = rand(11111,99999).'.jpg'; // renameing image
        $destinationPath = 'uploads/';//
        }else{
        $jpg_nombre=null;

        }
        /*fin existe el documento*/
             
               $inserto = \App\tbLista::create([ 

                 'id_user' =>\Auth::user()->id,
                 'id_cuadrante' => $request['id_cuadrante'],
                 'turno' => $request['turno'], 
                 'fecha' => $request['fecha'],
                 'hora_i' => $request['hora_i'],
                 'num_elementos' => $request['num_elementos'],
                 'num_patrullas' => $request['num_patrullas'],         
                 'jefe_sector' => $request['jefe_sector'],
                 'jefe_cuadrante' => $request['jefe_cuadrante'],                                                                                  
                 'hora_f' => $request['hora_f'],
                 'direccion' => $request['direccion'],
                 'archivo_imagen' => $jpg_nombre
               ]);



        
        //GUARDAR ARCHIVO SI EXISTE  
        $destinationPath = 'uploads/';     
        if($request['archivo']!=null){
            $request['archivo']->move($destinationPath,$jpg_nombre);
        }
               
               
                  $mensaje = array('mensaje'=>'Registro  Éxitoso!', 'color'=> 'success');
          return Redirect::to('/lista')->with('mensaje', $mensaje);
        
         
             
         
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

    
    public function excel_cuestionariolista(){
        
        
        return Excel::download(new  ListaExport, 'PASE DE LISTA SSC.xlsx');
      
        
    }
    


    


 public function view_listado_lista()
    {   
       /* $consultas = \App\tbPreguntas::select("tb_preguntas.*","cat_coord_territorials.ct2","cat_coord_territorials.sector","cat_delegaciones.delegacion")
        //,"cat_cuadrantes.ct","cat_cuadrantes.cuadrante","cat_delegaciones.delegacion","cat_delegaciones.region"
                    ->leftjoin('users','users.id','=','tb_preguntas.id_user') 
                    ->leftjoin('cat_coord_territorials','cat_coord_territorials.ct2','=','users.name')
                   // ->leftjoin('cat_cuadrantes','cat_cuadrantes.cuadrante','=','users.name')
                    ->leftjoin('cat_delegaciones','cat_delegaciones.delegacion','=','users.name')
                   ->where('tb_preguntas.id_user',\Auth::user()->id)
                   ->get();*/

         $consultas = \App\tbLista::select("tb_listas.*","cat_delegaciones.delegacion","cat_delegaciones.region","cat_coord_territorials.ct2","cat_coord_territorials.sector","cat_cuadrantes.cuadrante")
                    ->leftjoin('users','users.id','=','tb_listas.id_user',"cat_coord_territorials.ct2")
                    ->leftjoin('cat_coord_territorials','cat_coord_territorials.ct2','=','users.name')
                     ->leftjoin('cat_delegaciones','cat_delegaciones.id','=','cat_coord_territorials.id_alcaldia')
                     ->leftjoin('cat_cuadrantes','cat_cuadrantes.id','=','tb_listas.id_cuadrante')
                     //->leftjoin('cat_cuadrantes','cat_cuadrantes.ct','=','cat_coord_territorials.ct2')
                    ->where('tb_listas.id_user',\Auth::user()->id)
                    ->get();

         // dd($consultas );
      // return json_encode($consultas); 
      return view('consulta_lista',compact('consultas'));
    }


      //public function excel_pregunta()
   // {   

    //   return Excel::download(new MiformatodevisitasExport, 'Mi Formato de Visitas.xlsx');
   // }



//public function store(Request $request)
//{


///////////1

  // ruta de las imagenes guardadas
  //$ruta = public_path().'/paselista/';

  // recogida del form
  //$imagenOriginal = $request->file('avatar');

  // crear instancia de imagen
  //$imagen = Image::make($imagenOriginal);

  // generar un nombre aleatorio para la imagen
  //$temp_name = $this->random_string() . '.' . $imagenOriginal->getClientOriginalExtension();

  //$imagen->resize(300,300);

  // guardar imagen
  // save( [ruta], [calidad])
  //$imagen->save($ruta . $temp_name, 100);


  //$personaje = new Personaje;
  //$personaje->filename = $temp_name;
  //$personaje->save();

  ///return redirect('personajes/create');

/////////////////////2

 /* $file = Input::file('archivo');
  $image = \Image::make(\Input::file('archivo'));
  $path = public_path().'/paselista/';
  $image->save(path.$file->getClientOriginalName());
  $image->resize(200,200);
  $image->save($path.'pase_lista_'.$file->getClientOriginalName());*/




  /////////////////////3

  //$img = $request->file('urlImg')

//}


//protected function random_string()
//{
  //  $key = '';
    //$keys = array_merge( range('a','z'), range(0,9) );

   //for($i=0; $i<10; $i++)
    //{
      //  $key .= $keys[array_rand($keys)];
   // }

    //return $key;
//}
/////////////////////////////////////////////////SENDERO SEGURO VESPERTINO ////////////////////////////////////////////

public function sendero(){


       $mis_cuadrantes= \App\catCuadrantes::select('cat_cuadrantes.id','cat_cuadrantes.cuadrante')
                        ->join('users','users.name','=','cat_cuadrantes.ct')
                        ->where('users.id',\Auth::user()->id)
                        ->get();

        
        return view('sendero.cuestionario_sendero',compact('mis_cuadrantes'));
       

       
    }
    
  
public function regiones_sendero(){

       $mis_regiones= \App\catDelegaciones::select('cat_delegaciones.delegacion','cat_delegaciones.region')
                        ->join('cat_coord_territorials','cat_coord_territorials.id_alcaldia','=','cat_delegaciones.ct')
                        ->join('users','users.name','=','cat_delegaciones.ct')
                        ->where('users.id',\Auth::user()->id)
                        ->get();

        
        return view('sendero.cuestionario_sendero',compact('mis_regiones'));
       

       
    }
          
   
    public function save_cuestionario_sendero(Request $request){
    
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
           return Redirect::to('/sendero')->withInput()->withErrors($validator);

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
            

            if($request['senderoseguro']==null){
                $array_senderoseguro="SIN DATO";
            }else{
                $array_senderoseguro = $request['senderoseguro'];
            }



            if($request['archivo']!=null){
            $imagen_nombre=rand(11111,99999).'.jpg';
            $destinationPath='alcaldias';
              }else{
              $imagen_nombre=null;
               
              }

           
         }

            
            if ($request['se_realizo_mesa']=='si') {
              $inserto = \App\sendero::create([ 
             
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
                   'senderoseguro' => $array_senderoseguro,
                   'user_registro'=> \Auth::user()->id
                
                 ]);
                 
                 
                 if($request['archivo']!=null){
                 $request['archivo']->move($destinationPath,$imagen_nombre);
            }

            }else{
                
                
              $inserto = \App\sendero::create([
               
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
                  'senderoseguro' => 'No se realizo',
                  'user_registro'=> \Auth::user()->id
                
               
             ]);          
                      
          

         }

                 $mensaje = array('mensaje'=>'Asistencia Sendero Seguro Éxitosa !', 'color'=> 'success');
                 return Redirect::to('/sendero')->with('mensaje', $mensaje);

    }


    public function view_listado_sendero()
    {   
        $senderos = DB::table('senderos')->select("senderos.*","cat_coord_territorials.ct2","cat_coord_territorials.sector")
                    ->leftjoin('users','users.id','=','senderos.user_registro') 
                    ->leftjoin('cat_coord_territorials','cat_coord_territorials.ct2','=','users.name')
                   ->where('senderos.user_registro',\Auth::user()->id)
                   ->get();


        return view('consulta_sendero',compact('senderos'));
    }
  



      public function excel_sendero()
   {   

      return Excel::download(new SenderosExport, 'SENDEROS SEGUROS RJG.xlsx');
    }



 public function excel_cuestionariosendero(){
        
        
        return Excel::download(new  SenderoSeguroExport, 'SENDERO SEGURO EN CDMX.xlsx');
      
        
    }


/////////////////////////VISISTAS EN COORDINACIÓN

     public function visista_coordinador(){


       $mis_cuadrantes= \App\catCuadrantes::select('cat_cuadrantes.id','cat_cuadrantes.cuadrante')
                        ->join('users','users.name','=','cat_cuadrantes.ct')
                        ->where('users.id',\Auth::user()->id)
                        ->get();

        
        return view('asiscoordinador.cuestionario_asistenciacoordinador',compact('mis_cuadrantes'));
       

       
    }
    
  
public function regionn(){

       $mis_regiones= \App\catDelegaciones::select('cat_delegaciones.delegacion','cat_delegaciones.region')
                        ->join('cat_coord_territorials','cat_coord_territorials.id_alcaldia','=','cat_delegaciones.ct')
                        ->join('users','users.name','=','cat_delegaciones.ct')
                        ->where('users.id',\Auth::user()->id)
                        ->get();

        
        return view('asiscoordinador.cuestionario_asistenciacoordinador',compact('mis_regiones'));
       

       
    }
       

       


    public function save_cuestionario_visitas_coordinador(Request $request){
        
        $visitas =$request->except('_token');
        
        $visitas['id_user']=\Auth::user()->id;
        
        \App\pasecoordinador::create($visitas);
        
          $mensaje = array('mensaje'=>'Registro  Éxitoso!', 'color'=> 'success');
          return Redirect::to('/visitas_coordinador')->with('mensaje', $mensaje);
        
    }
    
    public function excel_cuestionariovisitas_coordinador(){
        
        
        return Excel::download(new  AgendaExport, 'AGENDA DE LAS RJG.xlsx');
      
        
    }
    

 


 public function view_listado_visitas_coordinador()
    {   
      
 $visitas = \App\pasecoordinador::select("pasecoordinadors.*","cat_delegaciones.delegacion","cat_delegaciones.region","cat_coord_territorials.ct2","cat_coord_territorials.sector","cat_cuadrantes.cuadrante")
                    ->leftjoin('users','users.id','=','pasecoordinadors.id_user',"cat_coord_territorials.ct2")
                    ->leftjoin('cat_coord_territorials','cat_coord_territorials.ct2','=','users.name')
                     ->leftjoin('cat_delegaciones','cat_delegaciones.id','=','cat_coord_territorials.id_alcaldia')
                     ->leftjoin('cat_cuadrantes','cat_cuadrantes.id','=','pasecoordinadors.id_cuadrante')
                     //->leftjoin('cat_cuadrantes','cat_cuadrantes.ct','=','cat_coord_territorials.ct2')
                    ->where('pasecoordinadors.id_user',\Auth::user()->id)
                    ->get();

         // dd($visitas );
      // return json_encode($visitas); 
      return view('consulta_visistacoordinacion',compact('visitas'));

 

    }


public function excel_visitas_coordinador(){
        
        
        return Excel::download(new  VisitaCoordinacionExport, 'VISITAS EN CGGSCyPJ.xlsx');
      
        
    }
    




}