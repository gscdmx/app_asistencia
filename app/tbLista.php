<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbLista extends Model
{
    //

    protected $fillable = [
            'id_user',
            'region',////
            'id_cuadrante',////
            'turno',////
            'fecha',///
            'hora_i',///
            'num_elementos',  ///       
            'num_patrullas',///
            'jefe_sector',  ///            
            'jefe_cuadrante', //
            'archivo_imagen'
                                         
            ];


}
