<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;

use Maatwebsite\Excel\Concerns\WithHeadings;

use DB;


class MapsExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
          return  DB::table('maps')->select("maps.id","cat_delegaciones.delegacion","cat_coord_territorials.ct2","cat_coord_territorials.sector","maps.latitude","maps.longitude","maps.created_at")
                    ->leftjoin('users','users.id','=','maps.creator_id') 
                    ->leftjoin('cat_coord_territorials','cat_coord_territorials.ct2','=','users.name')
                    ->leftjoin('cat_delegaciones','cat_delegaciones.id','=','cat_coord_territorials.id_alcaldia') 
                   //->where('maps.creator_id',\Auth::user()->id)
                   
                   ->get();
    }

      public function headings(): array
    {

          return [
            'ID',
            'ALCALDÍA',
            'C.T',
            'SECTOR',
            'COORDENADA LATITUD',
            'COORDENADA LONGITUD',
            'FECHA Y HORA EXACTA DE UBICACION',
            
            
        ];


    }

}
