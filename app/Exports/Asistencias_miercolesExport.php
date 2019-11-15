<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;

use Maatwebsite\Excel\Concerns\WithHeadings;

use DB;


class Asistencias_miercolesExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
          return  DB::table('tb_asistencias_miercoles')->select("tb_asistencias_miercoles.id","cat_delegaciones.delegacion","cat_coord_territorials.ct2","cat_coord_territorials.sector","tb_asistencias_miercoles.se_realizo","tb_asistencias_miercoles.no_motivo","tb_asistencias_miercoles.fecha","tb_asistencias_miercoles.hora_i","tb_asistencias_miercoles.hora_f","tb_asistencias_miercoles.jg","tb_asistencias_miercoles.mp","tb_asistencias_miercoles.jsp","tb_asistencias_miercoles.jspi","tb_asistencias_miercoles.jc","tb_asistencias_miercoles.ml","tb_asistencias_miercoles.otro","tb_asistencias_miercoles.representante_alcaldia","tb_asistencias_miercoles.ins","tb_asistencias_miercoles.vecino","tb_asistencias_miercoles.archivo_imagen","tb_asistencias_miercoles.calle")
                    ->leftjoin('users','users.id','=','tb_asistencias_miercoles.user_registro') 
                    ->leftjoin('cat_coord_territorials','cat_coord_territorials.ct2','=','users.name')
                    ->leftjoin('cat_delegaciones','cat_delegaciones.id','=','cat_coord_territorials.id_alcaldia') 
                   ->where('tb_asistencias_miercoles.user_registro',\Auth::user()->id)
                   
                   ->get();
    }

      public function headings(): array
    {

          return [
            'ID',
            'ALCALDÍA',
            'C.T',
            'SECTOR',
            'SE REALIZÓ GABINETE VESPERTINO',
            'NO MOTIVO',
            'FECHA GV',
            'HORA DE INICIO',
            'HORA DE TERMINO',
            'REPRESENTANTE DE LA JEFA DE GOBIERNO',
            'MINISTERIO PÚBLICO',
            'JEFE DE SECTOR DE POLICÍA',
            'PDI POLICÍA DE INVESTIGACIÓN',
            'JUEZ CÍVICO',
            'MÉDICO LEGISTA',
            'OTRO PARTICIPANTE',
            'PDI DE INTELIGENCIA SOCIAL',
            'REPRESENTANTE DE ALCALDÍA',
            'NÚMERO DE VECINOS',
            'PRESENTA IMAGEN',
            '¿LA REUNIÓN FUE DEL PROGRAMA MI CALLE?'
            
        ];


    }

}
