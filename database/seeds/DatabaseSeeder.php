<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       $this->truncateTables([
           'detalle_ruta',
           'ruta',
           'usuarios'
       ]);

       $this->call(usuarioSeed::class);
       $this->call(rutaSeed::class);
       $this->call(detallerutaSeed::class);
    }

    protected function  truncateTables(array $tables){
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        foreach($tables as $table){
            DB::table($table)->truncate();
        }
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');
    }
}
