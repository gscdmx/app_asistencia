<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

use DB;

class PreguntasExport implements FromCollection,  WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        //

        return DB::table('tb_preguntas')->select("cat_delegaciones.delegacion","cat_delegaciones.region","cat_coord_territorials.sector","cat_coord_territorials.ct2","tb_preguntas.id_cuadrante","tb_preguntas.id","tb_preguntas.nombre_rjg","tb_preguntas.fecha","tb_preguntas.hora_i","tb_preguntas.hora_f","tb_preguntas.calle","tb_preguntas.numero","tb_preguntas.colonia","tb_preguntas.servicio_policia","tb_preguntas.acudio","tb_preguntas.conoce_jc","tb_preguntas.conoce_app","tb_preguntas.llamarjefe_respondio","tb_preguntas.acudio_jefe","tb_preguntas.tiempo_acudio","tb_preguntas.nombre","tb_preguntas.telefono","tb_preguntas.firma","tb_preguntas.created_at","tb_preguntas.updated_at")
                    ->leftjoin('users','users.id','=','tb_preguntas.id_user') 
                    ->leftjoin('cat_coord_territorials','cat_coord_territorials.ct2','=','users.name')
                    ->leftjoin('cat_delegaciones','cat_delegaciones.id','=','cat_coord_territorials.id_alcaldia') 
                    ->leftjoin('cat_cuadrantes','cat_cuadrantes.id','=','tb_preguntas.id_cuadrante')
                    ->get();
    }







public function headings(): array
    {
    	  	

        return [
            
            'ALCALDIA',	
            'REGION',	
            'SECTOR',//
            'COORDINACIÓN TERRITORIAL',//
            'CUADRANTE',
            'ID',  //  
            'NOMBRE DE RJG',	
            'FECHA DE ALTA',	
            'HORA DE INICIO',	
            'HORA DE TERMINO',	                
            'CALLE',	
            'NÚMERO',	
            'COLONIA',	
            '¿ALGUNA VEZ HA SOLICITADO EL SERVICIO DE LA POLICÍA?',	
            '¿ACUDIO?',	
            '¿CONOCE A SU JEFE DE CUADRANTE?',	
            '¿CONOCE LA APP MI POLICÍA?',	
            '¿AL LLAMAR AL JEFE DE CUADRANTE EN TIEMPO REAL, ¿RESPONDIÓ?',	
            '¿ACUDIO JEFE DE CUADRANTE?',	
            '¿EN CUÁNTO TIEMPO ACUDIÓ?',
            'NOMBRE',
            'NÚMERO DE TELEFONO',
            'VECINO ES PARTE DE LA RED VECINAL',
            'FECHA DE CAPTURA',
            'FECHA DE ACTUALIZACIÓN'
           
            
        ];
    }


}
