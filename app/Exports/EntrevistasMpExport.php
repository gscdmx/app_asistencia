<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithDrawings;
use Maatwebsite\Excel\Concerns\WithEvents;
use PhpOffice\PhpSpreadsheet\Worksheet\BaseDrawing;

use DB;

class EntrevistasMpExport implements WithDrawings, FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function drawings()
    {
        $drawing = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
        $drawing->setName('LOGOCGGSCYPJ');
        $drawing->setDescription('logo');
        $drawing->setPath(public_path('/img/logo.JPG'));
        $drawing->setCoordinates('A1');
        $drawing->setHeight(150);

        return $drawing;
    }



    public function collection()
    {
        return DB::table('tb_ministerios')->select("cat_coord_territorials.ct2","tb_ministerios.id","tb_ministerios.mp_visitado","tb_ministerios.fecha","tb_ministerios.hora_i","tb_ministerios.hora_f","tb_ministerios.ciudadanos_esperando","tb_ministerios.cuantos","tb_ministerios.tiempo","tb_ministerios.desalentando_policia","tb_ministerios.desalentado_servidor","tb_ministerios.trato","tb_ministerios.created_at","tb_ministerios.updated_at")
                    ->leftjoin('users','users.id','=','tb_ministerios.id_user') 
                    ->leftjoin('cat_coord_territorials','cat_coord_territorials.ct2','=','users.name')
                    //->leftjoin('cat_delegaciones','cat_delegaciones.id','=','cat_coord_territorials.id_alcaldia') 
                    //->leftjoin('cat_cuadrantes','cat_cuadrantes.id','=','tb_ministerios.id_cuadrante')
                    ->get();
    }




    public function headings(): array
    {
    	  	

        return [
            
          
            'Responsable de captura',
            'Id', 
            'Agencia Visitada del Ministerio Público',	
            'Fecha de la Visita',	
            'Hora de Inicio de la Visita MP',	
            'Hora de Termino de la Visita MP',	                
            'Ciudadanos en espera de ser Atendidos',
            'Cantidad de Ciudadanos',
            'Tiempo de Espera',
            'Hay policía Imaginaria',
            'Persona o servidor público desalentando denuncia',
            'El trato a los ciudadanos es',
            'Fecha real de captura',
            'Fecha de actualización'
           
            
        ];
    }




}
