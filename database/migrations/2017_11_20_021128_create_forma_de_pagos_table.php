<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormaDePagosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forma_de_pagos', function (Blueprint $table) {
            //Caja Oficina, VISA,Amex,Mastercard
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('nombre');
            $table->string('condicion')->default(1);
            $table->integer('disponibilidad_id')->unsigned()->nullable();
            $table->foreign('disponibilidad_id')->references('id')->on('disponibilidades')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });

              DB::update('ALTER TABLE forma_de_pagos AUTO_INCREMENT = 10000;');

        DB::table('forma_de_pagos')->insert([
          ['user_id' => 1, 'nombre' => 'SIN ASIGNAR','disponibilidad_id' => 1],
          ['user_id' => 1, 'nombre' => 'VISA','disponibilidad_id' => 5],
          ['user_id' => 1, 'nombre' => 'AMERICAN EXPRESS','disponibilidad_id' => 5],
          ['user_id' => 1, 'nombre' => 'SHOPPING','disponibilidad_id' => 5],
          ['user_id' => 1, 'nombre' => 'VISA','disponibilidad_id' => 6],
          ['user_id' => 1, 'nombre' => 'MASTERCARD','disponibilidad_id' => 6],
          ['user_id' => 1, 'nombre' => 'VISA','disponibilidad_id' => 8],
          ['user_id' => 1, 'nombre' => 'VISA','disponibilidad_id' => 9],
          ['user_id' => 1, 'nombre' => 'CENCOSUD','disponibilidad_id' => 5],
          ['user_id' => 1, 'nombre' => 'NATIVA','disponibilidad_id' => 11],
          ['user_id' => 1, 'nombre' => 'EFECTIVO','disponibilidad_id' => 2],
          ['user_id' => 1, 'nombre' => 'DEBITO AUTOMATICO','disponibilidad_id' => 13],


        ]);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('forma_de_pagos');
    }
}
