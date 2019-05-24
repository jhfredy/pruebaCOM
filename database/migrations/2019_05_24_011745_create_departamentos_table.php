<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDepartamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //funcion que me permite crear la tabla de departamentos
        Schema::create('departamentos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('departamento');
            $table->unsignedInteger('pais_id');

            $table->foreign('pais_id')
            ->references('id')->on('paises')
            ->onDelete('cascade');

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
        Schema::dropIfExists('departamentos');
    }
}
