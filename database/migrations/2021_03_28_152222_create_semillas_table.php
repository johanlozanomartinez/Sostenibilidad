<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSemillasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('semillas', function (Blueprint $table) {
            $table->increments('id_semillas');
            $table->bigInteger('semilla_local');
            $table->bigInteger('semilla_comercial');
            $table->bigInteger('total_semillas');
            $table->decimal('indice_semillas');
            $table->bigInteger('desempeño');
            
          
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
        Schema::dropIfExists('semillas');
    }
}
