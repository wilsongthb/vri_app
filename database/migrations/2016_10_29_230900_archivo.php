<?php

// use Illuminate\Support\Facades\Schema;
// use Illuminate\Database\Schema\Blueprint;
// use Illuminate\Database\Migrations\Migration;

// class Archivo extends Migration
// {
//     /**
//      * Run the migrations.
//      *
//      * @return void
//      */
//     public function up()
//     {
//         Schema::create('grupo', function (Blueprint $table){
//             $table->increments('id');
//             $table->string('nombre');
//             $table->string('ruta');            
//             $table->timestamps();
//         });

//         Schema::create('archivo', function (Blueprint $table) {
//             $table->increments('id');
//             $table->string('nombre');
//             $table->string('ruta')->unique();
//             $table->text('contenido');

//             $table->integer('grupo_id')->unsigned();
//             $table->foreign('grupo_id')->references('id')->on('grupo');

//             $table->timestamps();
//         });
//     }

//     /**
//      * Reverse the migrations.
//      *
//      * @return void
//      */
//     public function down()
//     {
//         Schema::dropIfExists('archivo');
//         Schema::dropIfExists('grupo');
//     }
// }
