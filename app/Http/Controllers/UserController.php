<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

use Validator;
use Illuminate\Support\Facades\Redirect;

use Excel;



class UserController extends Controller
{
   
    public function nuevo_usuario()
    {   
        $permisos= DB::table('cat_permisos')->get();
        return view('auth.users.nuevo_usuario',compact('permisos'));
    }
    
     public function save_usuario(Request $request)
    {
        //


        $validator = Validator::make($request->all(), [
                 'user' => 'required',    
                 //'email' => 'required',
                 'password'=> 'required|min:3|confirmed',
                 
             ]);

              if ($validator->fails()) {

                 $messages = $validator->messages();
                 return Redirect::to('/nuevoUsuario')->withInput()->withErrors($validator);

               }else if ($validator->passes()){

                  $permisos= serialize($request['permisos']);

                  $inserto = \App\User::create([  
                         'name' => $request['user'],
                         'email' => $request['email'],
                         'password' => bcrypt($request['password']),
                         'permisos' => $permisos,
                       ]); 

                       $mensaje = array('mensaje'=>'Registro de usuario éxitoso', 'color'=> 'success');
                       return Redirect::to('/nuevoUsuario')->with('mensaje', $mensaje);
               }






    }
    
    public function listadoUsuario()
    {   

       $usuarios = \App\user::All();
        return view('auth.users.listado_usuarios',compact('usuarios'));
    }
    
    public function editar_usuario($id)
    { 
        $datos_usuario = \App\user::select("users.*")
                   ->where("users.id",$id)
                   ->first();
                   
        $permisos= DB::table('cat_permisos')->get();
         
           if (($datos_usuario->permisos=='N;')||($datos_usuario->permisos==null)) {
                $permisos_actuales = array("0");
              }else{
                  $permisos_actuales =  unserialize($datos_usuario->permisos);
              }


         return view('auth.users.editar_usuario',compact('datos_usuario','permisos','permisos_actuales'));
        
    }
    
     public function save_edicion__usuario($id,Request $request)
    {
        
         $validator = Validator::make($request->all(), [
                 'user' => 'required',    
                 //'email' => 'required',
                // 'password'=> 'required|min:3|confirmed',
                 
             ]);
             
             
             
              if ($validator->fails()) {

                 $messages = $validator->messages();
                 return Redirect::to('/edicionUsuario'."/".$id)->withInput()->withErrors($validator);

               }else if ($validator->passes()){
                   
                   
                $actualizar= \App\user::find($id);
                    
                if ($request['password']==''||$request['password']==null) {
                $password=$actualizar->password;
                }else{
                 $password= bcrypt($request['password']);
                }
                
                 $permisos= serialize($request['permisos']);
                
            $actualizar->fill(
             [
             'name' => $request['user'],
             'email' => $request['email'],
             'password' => $password,
             'permisos' => $permisos,


             ]);  
             $actualizar->save();
               
               
                       $mensaje = array('mensaje'=>'Edición de usuario éxitosa', 'color'=> 'success');
                       return Redirect::to('/edicionUsuario'."/".$id)->with('mensaje', $mensaje);
                   
                   
                   
               }
                   
    
        
    }
    
    






   
}