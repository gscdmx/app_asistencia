<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

use Validator;
use Illuminate\Support\Facades\Redirect;

use Excel;

use App\Exports\CuestionarioExport;

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
    
    
    
    
    

}