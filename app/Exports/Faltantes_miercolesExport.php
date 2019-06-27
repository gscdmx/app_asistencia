<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;


use Maatwebsite\Excel\Concerns\WithHeadings;

//use App\tbAsistencia;

use DB;


class Faltantes_miercolesExport implements FromCollection, WithHeadings
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
         
       
         $datos = DB::table('tb_asistencias_miercoles')->select("cat_coord_territorials.ct2")
                     ->leftjoin('users','users.id','=','tb_asistencias_miercoles.user_registro') 
                     ->leftjoin('cat_coord_territorials','cat_coord_territorials.ct2','=','users.name')
                     ->leftjoin('cat_delegaciones','cat_delegaciones.id','=','cat_coord_territorials.id_alcaldia') 
                     ->whereBetween('tb_asistencias_miercoles.fecha', [$this->fecha, $this->fecha2])
                     ->get();

          $data = $datos->map(function ($item){
                      return get_object_vars($item);
                  });


            $datos2= DB::table('cat_coord_territorials')->select("cat_coord_territorials.ct2")
                    ->whereNotIn('cat_coord_territorials.ct2',  $data)
                     ->get();
        
           return  $datos2;
    

               
    }




    public function headings(): array
    {

        return [
            'GV C.T FALTANTES'
            
            
        ];


    }
}
