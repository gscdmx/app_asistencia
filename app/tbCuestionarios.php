<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbCuestionarios extends Model
{
    //
         protected $fillable = [
            'id_user',
            'direccion',
            'colonia',
            'id_cuadrante',
            'servicio_policia',
            'hace_cuanto',
            'motivo',
            'medio_llamo_policia',
            'contestaron',
            'veces_en_llamar',
            'tiempo_contestar',
            'tiempo_llegada',
            'atencion',
            'resolvio_problema',
            'conoce_cuadrante',
            'conoce_jc',
            'califica_seguridad_calle',
            'realizo_denuncia',
            'descripcion_denuncia',
            'comentarios'
            ];
}
