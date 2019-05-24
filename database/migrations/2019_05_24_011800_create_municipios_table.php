<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMunicipiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //funcion que me permite crear la tabla de municipios
        Schema::create('municipios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('municipio');
            $table->unsignedInteger('departamento_id');

            $table->foreign('departamento_id')
            ->references('id')->on('departamentos')
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
        Schema::dropIfExists('municipios');
    }
}
