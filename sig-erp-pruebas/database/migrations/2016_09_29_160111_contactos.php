<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Contactos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contactos',function(Blueprint $table){
            
            $table->increments('id');

            /************* Foreign Key de la tabla centros_negocio *************/
            $table->integer('id_cliente')->unsigned();
            $table->foreign('id_cliente')->references('id')->on('clientes');
            /************* Foreign Key de la tabla centros_negocio *************/


            $table->string('nombre_con')->nullable();
            $table->string('cargo')->nullable();
            $table->string('departamento')->nullable();
            $table->integer('genero_con')->nullable();
            $table->date('fecha_nacimiento_con')->nullable();
            
            $table->string('telefono1')->nullable();
            $table->string('ext1')->nullable();
            $table->string('telefono2')->nullable();
            $table->string('ext2')->nullable();
            
            $table->string('celular1')->nullable();
            $table->string('celular2')->nullable();            
            $table->string('correo1')->nullable();
            $table->string('correo2')->nullable();
            $table->string('pagina_web')->nullable();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
