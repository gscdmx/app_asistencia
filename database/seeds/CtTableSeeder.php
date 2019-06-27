<?php

use Illuminate\Database\Seeder;

class CtTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        //pensaba hacer que se migre con los registros pero i esta grande, cuando puedas mejor lo haces es uno por uno
        //despues lo haces
          DB::table('cat_coord_territorials')->insert([
            'ct'=>"AOB-1",
            'ct2'=>"AOB-1",
            'sector'=>"PLATEROS",
            'id_alcaldia'=>"1"
        ]);

           DB::table('cat_coord_territorials')->insert([
            'ct'=>"AO-1",
            'ct2'=>"AOB-1",
            'sector'=>"PLATEROS",
            'id_alcaldia'=>"1"
        ]);

           DB::table('cat_coord_territorials')->insert([
            'ct'=>"AO-1",
            'ct2'=>"AOB-1",
            'sector'=>"PLATEROS",
            'id_alcaldia'=>"1"
        ]);


           DB::table('cat_coord_territorials')->insert([
            'ct'=>"AO-1",
            'ct2'=>"AOB-1",
            'sector'=>"PLATEROS",
            'id_alcaldia'=>"1"
        ]);
    }
}
