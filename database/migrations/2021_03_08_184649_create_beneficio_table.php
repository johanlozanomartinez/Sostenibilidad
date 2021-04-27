<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBeneficioTable extends Migration
{
    
    public function up()
    {
        Schema::create('beneficio', function (Blueprint $table) {


            $table->increments('id_beneficio');

            $table->bigInteger('ingresos');
            $table->bigInteger('Egresos');
            $table->double('vpningresos');
            $table->double('vpnegresos');
            $table->double('BC',6,2);
            $table->string('Desempeño',50);
            
            $table->unsignedInteger('id_unidad');
            $table->foreign('id_unidad')->references('id_unidad')->on('unidad')->onDelete('cascade');



           






            $table->timestamps();
        });
    } 

    public function down()
    {
        Schema::dropIfExists('beneficio');
    }
}
