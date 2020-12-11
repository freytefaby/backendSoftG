<?php

use Illuminate\Database\Seeder;

class rutaSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('ruta')->insert([
            "descripcion"=>"Ruta de pruebas desde seeds"
           ]);
    }
}
