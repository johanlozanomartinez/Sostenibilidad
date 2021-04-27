<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAguasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agua', function (Blueprint $table) {
            



             
            $table->increments('id_agua');
            $table->float('disponibilidad_agua');
            $table->float('capacidad_recarga');
            $table->bigInteger('desempeño_disponibilidad');
            $table->bigInteger('desempeño_capacidad');
            $table->bigInteger('promedio_desempeño');
            $table->unsignedInteger('id_unidad');
            $table->foreign('id_unidad')->references('id_unidad')->on('unidad')->onDelete('cascade');


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
        Schema::dropIfExists('agua');
    }
}
