<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

use Validator;
use Illuminate\Support\Facades\Redirect;

use Excel;

use App\Exports\CuestionarioExport;
use App\Exports\PreguntasExport;

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
    
    ////////////////

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
        
        
        return Excel::download(new  PreguntasExport, 'FORMATO DE RED DE CONTACTO CIUDADANO.xlsx');
      
        
    }
    


    


 public function view_listado_preguntas()
    {   
        $consultas = \App\tbPreguntas::select("tb_preguntas.*","cat_coord_territorials.ct2","cat_coord_territorials.sector")
        //,"cat_cuadrantes.ct","cat_cuadrantes.cuadrante","cat_delegaciones.delegacion","cat_delegaciones.region"
                    ->leftjoin('users','users.id','=','tb_preguntas.id_user') 
                    ->leftjoin('cat_coord_territorials','cat_coord_territorials.ct2','=','users.name')
                    ->leftjoin('cat_cuadrantes','cat_cuadrantes.cuadrante','=','users.name')
                    ->leftjoin('cat_delegaciones','cat_delegaciones.delegacion','=','users.name')
                   ->where('tb_preguntas.id_user',\Auth::user()->id)
                   ->get();

         // dd($consultas ); 
        return view('consulta_preguntas',compact('consultas'));
    }


      //public function excel_pregunta()
   // {   

    //   return Excel::download(new MiformatodevisitasExport, 'Mi Formato de Visitas.xlsx');
   // }


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
        
        
        return Excel::download(new  EntrevistasMpExport, 'FORMATO DE Entrevistas MP.xlsx');
      
        
    }
    





}