<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbAsistencia extends Model
{
    
     protected $fillable = [
        'id_ct','no_motivo','jg','mp','jsp','jspi','jc','ml','se_realizo','fecha','hora_i','hora_f','otro','user_registro','representante_alcaldia','ins','vecino','reunionjg'
    ];
    
}
