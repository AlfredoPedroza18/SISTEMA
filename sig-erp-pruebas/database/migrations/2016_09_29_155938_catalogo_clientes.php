<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CatalogoClientes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            
            $table->increments('id');

    /************* Foreign Key de la tabla centros_negocio *************/
            $table->integer('id_cn')->unsigned();
            $table->foreign('id_cn')->references('id')->on('centros_negocio');
    /************* Foreign Key de la tabla centros_negocio *************/


    /************* Foreign Key de la tabla ejecutivos *************/
            $table->integer('id_ejecutivo')->unsigned();
            $table->foreign('id_ejecutivo')->references('id')->on('ejecutivos');
    /************* Foreign Key de la tabla ejecutivos *************/

    /************* Foreign Key de la tabla facturadoras *************/
            $table->integer('contrato_a')->unsigned();
            $table->foreign('contrato_a')->references('id')->on('facturadoras');
    /************* Foreign Key de la tabla facturadoras *************/

    /************* Foreign Key de la tabla usuarios *************/
            $table->integer('id_user')->unsigned();
            $table->foreign('id_user')->references('id')->on('users');
    /************* Foreign Key de la tabla usuarios *************/



            $table->string('nombre_comercial');            
            $table->integer('forma_juridica')->nullable();        // ['persona moral' => 1, 'persona fisica' => 2]
            $table->string('razon_social')->nullable();                 // Solo se llenaran si es persona fisica
            $table->string('nombre')->nullable();                 // Solo se llenaran si es persona fisica
            $table->string('apellido_paterno')->nullable();       // Solo se llenaran si es persona fisica
            $table->string('apellido_materno')->nullable();       // Solo se llenaran si es persona fisica            
            $table->string('genero')->nullable();                 // Solo se llenaran si es persona fisica h, m
            $table->date('fecha_nacimiento_pros')->nullable();                
            $table->string('lugar_nacimiento')->nullable();                 
            $table->integer('clase_pm')->nullable();              // Solo se llenaran si es persona moral
            $table->string('rfc',13)->nullable();
            $table->string('curp')->nullable();                   // Solo se llenaran si es persona fisica
            $table->integer('registro_patronal')->nullable();     // Solo se llenaran en caso de que el servicio interesado 
               
            $table->integer('actividad_economica')->nullable();
            $table->enum('status', ['0' , '1' , '2' , '3'])->nullable();  //  ['0' => 'Inactivo', '1' => 'Activo']
            

            // Direccion Fiscal           
            $table->string('df_cp')->nullable();
            $table->string('df_estado')->nullable();
            $table->string('df_municipio')->nullable();
            $table->string('df_ciudad')->nullable();
            
            $table->string('df_colonia')->nullable();
            $table->string('df_calle')->nullable();
            $table->string('df_num_exterior')->nullable();
            $table->string('df_num_interior')->nullable();

            // Dirección comercial
            $table->string('dc_cp')->nullable();
            $table->string('dc_estado')->nullable();
            $table->string('dc_municipio')->nullable();
            $table->string('dc_ciudad')->nullable();
            $table->string('dc_colonia')->nullable();
            $table->string('dc_calle')->nullable();
            $table->string('dc_num_exterior')->nullable();
            $table->string('dc_num_interior')->nullable();

            //Datos de contacto se guarda en otra tabla

                     
            $table->integer('medio_contacto')->nullable();
            $table->integer('tipo_cliente')->nullable();
            $table->string('comentario')->nullable();



    /************* Foreign Key de la tabla facturadoras *************/
            $table->integer('db_forma_pago')->unsigned();
            $table->foreign('db_forma_pago')->references('id')->on('tipos_pagos');
    /************* Foreign Key de la tabla facturadoras *************/

    /************* Foreign Key de la tabla bancos *************/
            $table->integer('db_banco')->unsigned();
            $table->foreign('db_banco')->references('id')->on('bancos');
    /************* Foreign Key de la tabla bancos *************/
            
            
            $table->integer('db_dias_credito')->nullable();
            $table->decimal('db_limite_credito',10,2)->nullable();
            $table->string('db_cta_clientes')->nullable();            
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
        Schema::drop('clientes');
    }
}
