<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbAgenda extends Model
{
    //
    protected $fillable = [
            'id_user',
            'region',////
            'id_cuadrante',////
            'fecha',///
            'hora_i',///
            'hora_f',///
            'duracion',
            'nombre_activad'

                                                  
            ];
}
