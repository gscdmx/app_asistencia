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
    
    ///////////////////////////////////////////////PREGUNTAS///////////////////////////////////////////////////////////////////////////////////////

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

//////////////////////////////////////////////////ENTREVISTAS///////////////////////////////////////////////////////////////////////////////////////////////
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
    


/////////////////////////////////////////////////////AGENDA RJG ///////////////////////////////////////////////////////////////////




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
                    ->where('tb_agendas.id_user',\Auth::user()->id)
                    ->get();

         // dd($consultas );
      // return json_encode($consultas); 
      return view('consulta_agenda',compact('consultas'));

}


//////////////////////////////////////////////////////LISTA//////////////////////////////////////////////////////////////////

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
                 DB::raw('DATE_ADD(tb_listas.created_at, INTERVAL -6 HOUR) as fecha_real')
                 
                 ,"tb_listas.created_at as fecha_servidor")
                 ->whereBetween('tb_listas.fecha', [$fecha_actual, $fecha_actual])
                    ->get();
                 
        
        return json_encode($datos);
    }
    

    public function save_cuestionario_lista(Request $request){
        
        //$lista =$request->except('_token');
        
        //$lista['id_user']=\Auth::user()->id;


        //$asistencia =
        
        //\App\tbLista::create($lista);
        
        /* $validator = Validator::make($request->all(), [
                 'archivo' => 'required'
             ]);

        if ($validator->fails()) {

           $messages = $validator->messages();
        
           return Redirect::to('/lista')->withInput()->withErrors($validator);

         }else if ($validator->passes()){*/
            
       

         if($request['archivo']!=null){
        //$extension_archivo = $request['archivo']->getClientOriginalExtension(); // getting image extension
        $jpg_nombre = rand(11111,99999).'.jpg'; // renameing image
        $destinationPath = 'uploads/';//
        }else{
        $jpg_nombre=null;

        }
        /*fin existe el documento*/
             
               DB::table('tb_listas')->insert([

                 'id_user' =>\Auth::user()->id,
                 'id_cuadrante' => $request['id_cuadrante'],
                 'turno' => $request['turno'], 
                 'fecha' => $request['fecha'],
                 'hora_i' => $request['hora_i'],
                 'num_elementos' => $request['num_elementos'],
                 'num_patrullas' => $request['num_patrullas'],         
                 'jefe_sector' => $request['jefe_sector'],
                 'jefe_cuadrante' => $request['jefe_cuadrante'],                                                                          
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







}