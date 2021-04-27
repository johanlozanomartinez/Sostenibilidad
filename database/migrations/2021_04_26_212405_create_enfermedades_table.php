<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnfermedadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enfermedades', function (Blueprint $table) {
             $table->increments('id'); 
            $table->unsignedInteger('id_unidad');
            $table->unsignedInteger('faculty_id');
            $table->unsignedInteger('career_id');
            $table->string('valor_referencia');
            $table->string('promedio');
            $table->string('desempeño');

            $table->timestamps();
            $table->foreign('id_unidad')->references('id_unidad')->on('unidad')->onDelete('cascade');
            $table->foreign('faculty_id')->references('id')-> on ('faculties')->onDelete('cascade');
            $table->foreign('career_id')->references('id')-> on ('careers')->onDelete('cascade');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('enfermedades');
    }
}
