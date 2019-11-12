<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;

//use App\tbAsistencia;

use Maatwebsite\Excel\Concerns\WithHeadings;

use DB;


class AsistenciasExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        

    	 return DB::table('tb_asistencias')->select("tb_asistencias.id","cat_delegaciones.delegacion","cat_coord_territorials.ct2","cat_coord_territorials.sector","tb_asistencias.se_realizo","tb_asistencias.no_motivo","tb_asistencias.fecha","tb_asistencias.hora_i","tb_asistencias.hora_f","tb_asistencias.jg","tb_asistencias.mp","tb_asistencias.jsp","tb_asistencias.jspi","tb_asistencias.jc","tb_asistencias.ml","tb_asistencias.otro","tb_asistencias.ins","tb_asistencias.representante_alcaldia","tb_asistencias.reunionjg")
                    ->leftjoin('users','users.id','=','tb_asistencias.user_registro') 
                    ->leftjoin('cat_coord_territorials','cat_coord_territorials.ct2','=','users.name')
                    ->leftjoin('cat_delegaciones','cat_delegaciones.id','=','cat_coord_territorials.id_alcaldia') 
                   ->where('tb_asistencias.user_registro',\Auth::user()->id)
                    
                   ->get(); 
    }


    public function headings(): array
    {

        return [
            'ID',
            'ALCALDÍA',
            'C.T',
            'SECTOR',
            'SE REALIZÓ GABINETE MATUTINO',
            'NO MOTIVO',
            'FECHA GM',
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
            'REUNIÓN CON JEFA DE GOBIERNO'
            
        ];
    }
}
