<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRiquezasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('riquezas', function (Blueprint $table) {
            $table->increments('id_riquezas');
           
            $table->bigInteger('cantidad');
            $table->double('abundancia',8,2);
            $table->double('log',8,2);
            $table->double('pi',8,2);
            $table->double('biodiversidad',8,2);


            $table->unsignedInteger('id_unidad');
            $table->unsignedInteger('id_especies');
            $table->foreign('id_unidad')->references('id_unidad')->on('unidad')->onDelete('cascade');
            $table->foreign('id_especies')->references('id_especies')->on('especies')->onDelete('cascade');
            $table->timestamps();
        });
    }

    
    public function down()
    {
        Schema::dropIfExists('riquezas');
    }
}
