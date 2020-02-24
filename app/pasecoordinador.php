<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pasecoordinador extends Model
{
    
    protected $fillable = [
            'id_user',
            'region',
            'id_cuadrante',
            'nombre',
            'fecha',
            'hora_i',
            'procedencia',  
            'asunto',
            'telefono',             
            'direccion',
            'correo'
            
                                         
            ];



}
