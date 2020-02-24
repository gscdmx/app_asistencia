<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithDrawings;
use Maatwebsite\Excel\Concerns\WithEvents;
use PhpOffice\PhpSpreadsheet\Worksheet\BaseDrawing;

use DB;

class VisitaCoordinacionExport implements WithDrawings, FromCollection, WithHeadings
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
        
     return DB::table('pasecoordinadors')->select("pasecoordinadors.id","pasecoordinadors.nombre","pasecoordinadors.fecha","pasecoordinadors.hora_i","pasecoordinadors.procedencia","pasecoordinadors.asunto","pasecoordinadors.telefono","pasecoordinadors.direccion","pasecoordinadors.correo","pasecoordinadors.created_at")
                    ->leftjoin('users','users.id','=','pasecoordinadors.id_user') 
                    //->leftjoin('cat_coord_territorials','cat_coord_territorials.ct2','=','users.name')
                   // ->leftjoin('cat_delegaciones','cat_delegaciones.id','=','cat_coord_territorials.id_alcaldia') 
                    //->leftjoin('cat_cuadrantes','cat_cuadrantes.id','=','pasecoordinadors.id_cuadrante')//ya estaba comentado
                    ->get();

    }

   public function headings(): array
    {
    	  	

        return [
            
           
            'ID',  //  
            'NOMBRE DEL VISITANTE',	
            'FECHA DE LA VISITA',	
            'HORA',	
            'PROCEDENCIA',
            'ASUNTO',                
            'TELÉFONO',
            'DIRECCIÓN',
            'CORREO ELECTRÓNICO',
            'FECHA REAL DEL REGISTRO'
           
            
        ];
    }



}
