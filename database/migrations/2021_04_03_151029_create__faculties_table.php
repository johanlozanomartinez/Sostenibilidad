<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacultiesTable extends Migration
{
    
    public function up()
    {
        Schema::create('faculties', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            
        });
    }


    public function down()
    {
        Schema::dropIfExists('faculties');
    }
}