<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlimentariasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alimentarias', function (Blueprint $table) {
            $table->increments('id_alimentarias');
            $table->bigInteger('valor_alimentos');
            $table->bigInteger('no_alimentos');
            $table->bigInteger('valor');
            $table->bigInteger('provenientes');
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
        Schema::dropIfExists('alimentarias');
    }
}
