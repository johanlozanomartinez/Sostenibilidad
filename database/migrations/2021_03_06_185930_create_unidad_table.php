<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnidadTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unidad', function (Blueprint $table) {
            $table->increments('id_unidad');
            $table->string('nombre_representante',50);
            $table->string('nombre_finca',50);
            $table->string('vereda',50);
            $table->string('celular',50); 
            
            $table->bigInteger('ingresos');
            $table->bigInteger('Egresos');

            $table->unsignedInteger('municipio_id');
            $table->foreign('municipio_id')->references('id_municipio')->on('municipio')->onDelete('cascade');
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
        Schema::dropIfExists('unidad');
    }
}
