<?php

use Illuminate\Database\Seeder;

class detallerutaSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('detalle_ruta')->insert([
            "title"=>"punto A",
            "ltn"=>10.922934963806583,
            "lng"=>-74.79313656844246,
            "idruta"=>1,
            "codigo"=>"ABC"
           ]);

           DB::table('detalle_ruta')->insert([
            "title"=>"punto B",
            "ltn"=>10.921588890578136,
            "lng"=>-74.7930530812473,
            "idruta"=>1,
            "codigo"=>"DFG"
           ]);
    }
}
