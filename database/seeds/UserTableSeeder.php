<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
           DB::table('users')->insert([
            'name'=>"Administrador",
            'email'=>"admin@cdmx.gob.mx",
            'permisos'=>'a:5:{i:0;s:1:"1";i:1;s:1:"2";i:2;s:1:"3";i:3;s:1:"4";i:4;s:1:"5";}',//admin
            'password'=>bcrypt('4dm1n')

        ]);
    }
}
