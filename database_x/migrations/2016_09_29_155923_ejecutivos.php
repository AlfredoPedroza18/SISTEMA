<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Ejecutivos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ejecutivos',function(Blueprint $table){
            $table->increments('id');
            /************* Foreign Key de la tabla centros_negocio *************/
            $table->integer('id_cn')->unsigned();
            $table->foreign('id_cn')->references('id')->on('centros_negocio');
            /************* Foreign Key de la tabla centros_negocio *************/

            /************* Foreign Key de la tabla puestos *************/
            $table->integer('id_puesto')->unsigned();
            $table->foreign('id_puesto')->references('id')->on('puestos');
            /************* Foreign Key de la tabla centros_negocio *************/


            $table->string('nombre')->nullable();
            $table->string('ap_paterno')->nullable();
            $table->string('ap_materno')->nullable();

            $table->string('nickname')->nullable();
            $table->string('usuario')->nullable();
            $table->string('password')->nullable();
            $table->string('correo')->nullable();
            $table->string('telefono_oficina')->nullable();
            $table->string('celular')->nullable();


            /************* Ubicacion del CN *************/            
            $table->string('cp')->nullable();
            $table->string('estado')->nullable();
            $table->string('ciudad')->nullable();
            $table->string('colonia')->nullable();
            $table->string('calle')->nullable();
            $table->string('no_exterior')->nullable();
            $table->string('no_interior')->nullable();
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
        Schema::drop('ejecutivos');
    }
}
