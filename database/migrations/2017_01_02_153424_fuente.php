<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Fuente extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fuente', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('nombre_archivo');
            $table->string('ruta');
            $table->string('tipo','20');
            $table->string('tamaño','20');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fuente');
    }
}
