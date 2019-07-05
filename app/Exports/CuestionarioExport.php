<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;


use Maatwebsite\Excel\Concerns\WithHeadings;

use DB;

class CuestionarioExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        
               return DB::table('tb_cuestionarios')->select("cat_delegaciones.delegacion","cat_coord_territorials.sector","cat_coord_territorials.ct2","cat_cuadrantes.cuadrante","tb_cuestionarios.id","tb_cuestionarios.direccion","tb_cuestionarios.colonia","tb_cuestionarios.servicio_policia","tb_cuestionarios.hace_cuanto","tb_cuestionarios.motivo","tb_cuestionarios.medio_llamo_policia","tb_cuestionarios.contestaron","tb_cuestionarios.veces_en_llamar","tb_cuestionarios.tiempo_contestar","tb_cuestionarios.tiempo_llegada","tb_cuestionarios.atencion","tb_cuestionarios.resolvio_problema","tb_cuestionarios.conoce_cuadrante","tb_cuestionarios.conoce_jc","tb_cuestionarios.califica_seguridad_calle","tb_cuestionarios.realizo_denuncia","tb_cuestionarios.descripcion_denuncia","tb_cuestionarios.comentarios","tb_cuestionarios.nombre","tb_cuestionarios.created_at","tb_cuestionarios.updated_at")
                    ->leftjoin('users','users.id','=','tb_cuestionarios.id_user') 
                    ->leftjoin('cat_coord_territorials','cat_coord_territorials.ct2','=','users.name')
                    ->leftjoin('cat_delegaciones','cat_delegaciones.id','=','cat_coord_territorials.id_alcaldia') 
                    ->leftjoin('cat_cuadrantes','cat_cuadrantes.id','=','tb_cuestionarios.id_cuadrante')
                    ->get();

    }



public function headings(): array
    {
    	  	

        return [
            
            'ALCALDIA',	
            'SECTOR',
            'COORDINACIÓN TERRITORIAL',
            'CUADRANTE',
            'ID',                    
            'DIRECCIÓN',
            'COLONIA',
            '1-¿HA SOLICITADO LOS SERVICIOS DE LA POLICÍA? SI/NO',
            '2-¿HACE CUÁNTO?',
            '3-¿POR QUÉ MOTIVO?',
            '4-¿POR QUÉ MEDIO LLAMASTE A LA POLICÍA? 911, APP MI POLICIA, BOTÓN DE AUXILIO, OTRA',
            '5-¿TE CONTESTARÓN? SI/NO',
            '6-¿CUÁNTAS VECES TUVISTE QUE LLAMAR PARA QUE TE CONTESTARÁN? 1,2,3,4 MÁS DE 5 VECES',
            '7-¿CUÁNTO TIEMPO (MINUTOS) SE TARDARÓN EN CONTESTAR?',
            '8-¿EN CUÁNTO TIEMPO LLEGO LA POLICÍA?',
            '9-LA ATENCIÓN QUE RECIBISTE FUE: MUY BUENA, BUENA, REGULAR, MALA, MUY MALA',
            '10-¿RESOLVIÓ EL PROBLEMA O LA URGENCIA QUÉ SE PRESENTÓ?',
            '11-¿CONOCE EL PROGRAMA DE CUADRANTES? SI/NO',
            '12-¿CONOCE AL JEFE DE CUADRANTE? SI/NO',
            '13-¿CÓMO CALIFICA LA SEGURIDAD ENTORNO A SU CALLE?',
            '14- SI SU RESPUESTA EN LA PREGUNTA 3 FUE UN "DELITO", RESPONDE LO SIGUIENTE, ¿REALIZÓ SU DENUNCIA?',
            'EN BASE A LA PREGUNTA 14, SI(¿CÓMO FUE LA ATENCIÓN EN EL MIISTERIO PÚBLICO?, NO(¿POR QUÉ?)',
            '15- COMENTARIOS:',
            'NOMBRE',
            'FECHA DE CAPTURA',
            'FECHA DE ACTUALIZACIÓN'
           
        ];
    }




}
