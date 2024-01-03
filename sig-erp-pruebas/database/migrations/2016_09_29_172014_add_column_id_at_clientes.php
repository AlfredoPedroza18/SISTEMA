<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnIdAtClientes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('clientes',function($table){

             /************* Foreign Key de la tabla centros_negocio *************/
            $table->integer('id_user')->unsigned();
            $table->foreign('id_user')->references('id')->on('users');
            /************* Foreign Key de la tabla centros_negocio *************/
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('clientes',function($table){
            $table->dropForeign('id_user');
        });
    }
}
