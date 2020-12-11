<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetalleRutaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_ruta', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('title');
            $table->double('ltn');
            $table->double('lng');
            $table->unsignedInteger('idruta');
            $table->foreign('idruta')->references('id')->on('ruta')->onDelete('restrict')->onUpdate('restrict');
            $table->string('codigo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalle_ruta');
    }
}
