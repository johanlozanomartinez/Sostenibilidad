<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoberturasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cobertura', function (Blueprint $table) {
           

            $table->increments('id_cobertura');
            $table->decimal('agricola',50);
            $table->decimal('pecuaria',50);
            $table->decimal('forestal',50);
            $table->decimal('totalarea',50);
            $table->string('coberturaAgricola',50);
            $table->string('coberturaPecuaria',50);
            $table->string('coberturaForestal',50);
            $table->decimal('ponderadoAgricola',8);
            $table->decimal('ponderadoPecuaria',8);
            $table->decimal('ponderadoForestal',8);
            $table->integer('coberturaVegetal');
            $table->string('Desempeño',50);
            
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
        Schema::dropIfExists('cobertura');
    }
}
