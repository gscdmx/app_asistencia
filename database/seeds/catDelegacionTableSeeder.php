<?php

use Illuminate\Database\Seeder;

class catDelegacionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
           DB::table('cat_delegaciones')->insert([
        	'delegacion'=>"ÁLVARO OBREGÓN"
        ]);

        DB::table('cat_delegaciones')->insert([
        	'delegacion'=>"AZCAPOTZALCO"
        ]);

         DB::table('cat_delegaciones')->insert([
        	'delegacion'=>"BENITO JUÁREZ"
        ]);

         DB::table('cat_delegaciones')->insert([
        	'delegacion'=>"COYOACÁN"
        ]);

         DB::table('cat_delegaciones')->insert([
        	'delegacion'=>"CUAJIMALPA"
        ]);

          DB::table('cat_delegaciones')->insert([
        	'delegacion'=>"CUAUHTÉMOC"
        ]);

           DB::table('cat_delegaciones')->insert([
        	'delegacion'=>"GUSTAVO A. MADERO"
        ]);


         DB::table('cat_delegaciones')->insert([
        	'delegacion'=>"IZTACALCO"
        ]);


         DB::table('cat_delegaciones')->insert([
        	'delegacion'=>"IZTAPALAPA"
        ]);

         DB::table('cat_delegaciones')->insert([
        	'delegacion'=>"MAGDALENA CONTRERAS"
        ]);

        DB::table('cat_delegaciones')->insert([
        	'delegacion'=>"MIGUEL HIDALGO"
        ]);


         DB::table('cat_delegaciones')->insert([
        	'delegacion'=>"MILPA ALTA"
        ]);


        DB::table('cat_delegaciones')->insert([
        	'delegacion'=>"TLÁHUAC"
        ]);


        DB::table('cat_delegaciones')->insert([
        	'delegacion'=>"TLALPAN"
        ]);

        DB::table('cat_delegaciones')->insert([
        	'delegacion'=>"VENUSTIANO CARRANZA"
        ]);


        DB::table('cat_delegaciones')->insert([
        	'delegacion'=>"XOCHIMILCO"
        ]);

    }
}
