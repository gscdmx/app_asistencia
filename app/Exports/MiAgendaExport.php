<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;

use Maatwebsite\Excel\Concerns\WithHeadings;

use DB;





class MiAgendaExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        //

         return DB::table('tb_agendas')->select("cat_delegaciones.delegacion","cat_delegaciones.region","cat_coord_territorials.sector","cat_coord_territorials.ct2","cat_cuadrantes.cuadrante","tb_agendas.id","tb_agendas.fecha","tb_agendas.hora_i","tb_agendas.hora_f","tb_agendas.duracion","tb_agendas.nombre_activad","tb_agendas.created_at","tb_agendas.updated_at")
                    ->leftjoin('users','users.id','=','tb_agendas.id_user') 
                    ->leftjoin('cat_coord_territorials','cat_coord_territorials.ct2','=','users.name')
                    ->leftjoin('cat_delegaciones','cat_delegaciones.id','=','cat_coord_territorials.id_alcaldia') 
                    ->leftjoin('cat_cuadrantes','cat_cuadrantes.id','=','tb_agendas.id_cuadrante')
                    ->where("tb_agendas.status",true)
                    ->where('tb_agendas.id_user',\Auth::user()->id)
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
            'FECHA DE ACTIVIDAD O EVENTO',	
            'HORA DE INICIO DE ACTIVIDAD O EVENTO',	
            'HORA DE TÉRMINO DE ACTIVIDAD O EVENTO',	                
            'DURACIÓN DE ACTIVIDAD O EVENTO',
            'NOMBRE DE ACTIVIDAD O EVENTO',
            'FECHA DE CAPTURA REAL',
            'FECHA DE ACTUALIZACIÓN Ó MODIFICACIÓN DEL REGISTRO'

           
            
        ];
    }




}
