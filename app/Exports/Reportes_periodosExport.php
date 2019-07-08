<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;

use Maatwebsite\Excel\Concerns\WithHeadings;

//use App\tbAsistencia;

use DB;

class Reportes_periodosExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function __construct(String $fecha, $fecha2 )
        {
            $this->fecha = $fecha;
             $this->fecha2 = $fecha2;
        }




    public function collection()
    {
          return DB::table('tb_asistencias')->select("tb_asistencias.id","cat_delegaciones.delegacion","cat_coord_territorials.ct2","cat_coord_territorials.sector","tb_asistencias.se_realizo","tb_asistencias.no_motivo","tb_asistencias.fecha","tb_asistencias.hora_i","tb_asistencias.hora_f","tb_asistencias.jg","tb_asistencias.mp","tb_asistencias.jsp","tb_asistencias.jspi","tb_asistencias.jc","tb_asistencias.ml","tb_asistencias.otro",'tb_asistencias.representante_alcaldia',"tb_asistencias.ins","tb_asistencias.reunionjg","tb_asistencias.fecha_real","tb_asistencias.created_at","tb_asistencias.updated_at")
                      
                      ->leftjoin('users','users.id','=','tb_asistencias.user_registro') 
                      ->leftjoin('cat_coord_territorials','cat_coord_territorials.ct2','=','users.name')
                      ->leftjoin('cat_delegaciones','cat_delegaciones.id','=','cat_coord_territorials.id_alcaldia') 
                      ->whereBetween('tb_asistencias.fecha', [$this->fecha, $this->fecha2])
                      ->orderBy('fecha_real','ASC')
                     ->get();
    }

 public function headings(): array
    {

        return [
            'ID',
            'ALCALDÍA',
            'C.T',
            'SECTOR',
            'SE REALIZÓ GABINETE',
            'NO MOTIVO',
            'FECHA',
            'HORA DE INICIO',
            'HORA DE TERMINO',
            'REPRESENTANTE DE LA JEFATURA DE GOBIERNO',
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
