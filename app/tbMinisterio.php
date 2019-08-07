<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbMinisterio extends Model
{
     protected $fillable = [
            'id_user',
            'mp_visitado',
            'fecha',
            'hora_i',///
            'hora_f',
            'ciudadanos_esperando',
            'cuantos',
            'tiempo',
            'desalentando_policia',
            'desalentado_servidor',
            'trato'
            ];


}
