<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCentroNegociosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {



        
        Schema::create('bancos',function(Blueprint $table){
            $table->increments('id');
            $table->string('nombre');
            $table->string('cuenta')->nullable();
            $table->string('clabe')->nullable();            
            $table->timestamps();
        });

        Schema::create('tipos_pagos',function(Blueprint $table){
            $table->increments('id');
            $table->string('nombre');
            $table->string('descripcion')->nullable();
            
            $table->timestamps();
        });

        Schema::create('facturadoras',function(Blueprint $table){
            $table->increments('id');
            $table->string('nombre');
            
            $table->timestamps();
        });

        Schema::create('puestos',function(Blueprint $table){
            $table->increments('id');
            $table->string('nombre');
            $table->string('descripcion')->nullable();
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
        Schema::drop('puestos');
        Schema::drop('facturadoras');
        Schema::drop('tipos_pagos');
        Schema::drop('bancos');
    }
}
