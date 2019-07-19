<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbPreguntas extends Model
{
    //
    protected $fillable = [
            'id_user',
            'region',////
            'id_cuadrante',////
            'nombre_rjg',////
            'fecha',///
            'hora_i',///
            'hora_f',///
            'calle',  ///       //'direccion',
            'numero',///
            'colonia',  ///            
            'servicio_policia', //si/no 
            'acudio',////      //si/no  //'hace_cuanto',
            'conoce_jc',  //si/no
            'conoce_app',//si/no //'contestaron'
            'llamarjefe_respondio',//si/no//'veces_en_llamar'
            'acudio_jefe',  //si/no //'atencion',
            'tiempo_acudio', //'tiempo_contestar',
            'nombre',
            'telefono', //'comentarios',
            'firma'          //'califica_seguridad_calle',                                       
            ];

}
