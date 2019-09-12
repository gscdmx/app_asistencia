<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithDrawings;
use Maatwebsite\Excel\Concerns\WithEvents;
use PhpOffice\PhpSpreadsheet\Worksheet\BaseDrawing;

use DB;

class ListaExport implements WithDrawings, FromCollection, WithHeadings
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
        
     return DB::table('tb_listas')->select("cat_delegaciones.delegacion","cat_delegaciones.region","cat_coord_territorials.sector","cat_coord_territorials.ct2","tb_listas.id","tb_listas.turno","tb_listas.fecha","tb_listas.hora_i","tb_listas.hora_f","tb_listas.direccion","tb_listas.num_elementos","tb_listas.num_patrullas","tb_listas.jefe_sector","tb_listas.jefe_cuadrante","tb_listas.archivo_imagen","tb_listas.created_at","tb_listas.updated_at")
                    ->leftjoin('users','users.id','=','tb_listas.id_user') 
                    ->leftjoin('cat_coord_territorials','cat_coord_territorials.ct2','=','users.name')
                    ->leftjoin('cat_delegaciones','cat_delegaciones.id','=','cat_coord_territorials.id_alcaldia') 
                    //->leftjoin('cat_cuadrantes','cat_cuadrantes.id','=','tb_listas.id_cuadrante')
                    ->get();

    }

   public function headings(): array
    {
    	  	

        return [
            
            'ALCALDÍA',	
            'REGIÓN',	
            'SECTOR',//
            'COORDINACIÓN TERRITORIAL',//
            'ID',  //  
            'TURNO',	
            'FECHA DEL HECHO',	
            'HORA DE INICIO DE LA FORMACIÓN',	
            'HORA DE TÉRMINO DE LA FORMACIÓN',
            'DIRECCIÓN',                
            'NÚMERO DE ELEMENTOS EN FORMACIÓN',	
            'NÚMERO DE PATRULLAS EN FORMACIÓN',	
            '¿ESTUVO PRESENTE EL JEFE DE SECTOR EN LA FORMACIÓN?',	
            'TOTAL DE JEFES DE CUADRANTES EN LA FORMACIÓN',	
            'CON IMAGEN',	
            'FECHA DE CAPTURA REAL',
            'FECHA DE ACTUALIZACIÓN Ó MODIFICACIÓN DEL REGISTRO'
           
            
        ];
    }



}
