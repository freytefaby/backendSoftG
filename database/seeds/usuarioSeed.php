<?php

use Illuminate\Database\Seeder;

class usuarioSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('usuarios')->insert([
        "email"=>"ffreytte@gmail.com",
        "password"=>bcrypt("123456")
       ]);
    }
}
