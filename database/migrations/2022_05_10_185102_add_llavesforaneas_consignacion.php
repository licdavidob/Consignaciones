<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLlavesforaneasConsignacion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('consignacion', function (Blueprint $table) {
            $table->integer('ID_Agencia');
            $table->foreign('ID_Agencia')->references('ID_Agencia')->on('agencia');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('consignacion', function (Blueprint $table) {
            //
        });
    }
}
