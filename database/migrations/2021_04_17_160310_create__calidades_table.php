<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCalidadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calidades', function (Blueprint $table) {

            $table->increments('id_calidades');
            $table->decimal('valor',50);
            $table->bigInteger('desempeño');

            
            $table->unsignedInteger('id_unidad');
            $table->unsignedInteger('id_caracteristicas');


            $table->foreign('id_unidad')->references('id_unidad')->on('unidad')->onDelete('cascade');

            
            $table->foreign('id_caracteristicas')->references('id_caracteristicas')->on('caracteristicas')->onDelete('cascade');



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
        Schema::dropIfExists('calidades');
    }
}
