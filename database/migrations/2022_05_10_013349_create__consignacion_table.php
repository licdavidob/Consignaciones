<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsignacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consignacion', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id('ID_Consignacion');
            $table->integer('Fojas');
            $table->date('Fecha');
            $table->time('Hora_Recibo')->nullable();
            $table->time('Hora_Entrega')->nullable();
            $table->time('Hora_Salida')->nullable();
            $table->time('Hora_Regreso')->nullable();
            $table->time('Hora_Llegada')->nullable();
            $table->date('Fecha_Entrega')->nullable();
            $table->tinyInteger('Detenido'); // 1 = CON DETENIDO / 2 = SIN DETENIDO
            $table->string('Nota', 255);
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
        Schema::dropIfExists('consignacion');
    }
}
