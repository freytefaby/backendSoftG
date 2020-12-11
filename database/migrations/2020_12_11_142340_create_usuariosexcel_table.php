<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuariosexcelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuariosexcel', function (Blueprint $table) {
            $table->Increments('id');
            $table->Integer('driver_id');
            $table->string('last_name');
            $table->string('first_name');
            $table->string('actual_check_in');
            $table->string('actual_drop_off');
            $table->string('difftime');
            $table->date('fecha');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuariosexcel');
    }
}
