<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnCentroNegocio extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('clientes',function($table){
            $table->integer('id_cn')->unsigned();;
            $table->foreign('id_cn')->references('id')->on('centros_negocio');
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
            $table->dropForeign('id_cn');
        });
    }
}
