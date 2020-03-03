<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;

use Maatwebsite\Excel\Concerns\WithHeadings;

use DB;


class SenderosExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
          return  DB::table('senderos')->select("senderos.id","cat_delegaciones.delegacion","cat_coord_territorials.ct2","cat_coord_territorials.sector","senderos.se_realizo","senderos.no_motivo","senderos.fecha","senderos.hora_i","senderos.hora_f","senderos.jg","senderos.mp","senderos.jsp","senderos.jspi","senderos.jc","senderos.ml","senderos.otro","senderos.ins","senderos.representante_alcaldia","senderos.archivo_imagen","senderos.vecino","senderos.created_at")
                    ->leftjoin('users','users.id','=','senderos.user_registro') 
                    ->leftjoin('cat_coord_territorials','cat_coord_territorials.ct2','=','users.name')
                    ->leftjoin('cat_delegaciones','cat_delegaciones.id','=','cat_coord_territorials.id_alcaldia') 
                   ->where('senderos.user_registro',\Auth::user()->id)
                   
                   ->get();
    }

      public function headings(): array
    {

          return [
            'ID',
            'ALCALDÍA',
            'C.T',
            'SECTOR',
            'SE REALIZÓ REUNIÓN SENDERO SEGURO',
            'NO MOTIVO',
            'FECHA REUNIÓN SENDERO SEGURO',
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
            'PRESENTA IMAGEN',
            'NÚMERO DE ASISTENTES',
            'FECHA DE CAPTURA'
            
            
        ];


    }

}
