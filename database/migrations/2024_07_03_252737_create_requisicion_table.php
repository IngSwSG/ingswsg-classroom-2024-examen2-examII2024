<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequisicionTable extends Migration
{
    public function up()
    {
        Schema::create('requisicion', function (Blueprint $table) {
            $table->id('idRequisicion');
            $table->dateTime('fecha');
            $table->string('estado');
            $table->string('idUsuario');
            $table->foreign('idUsuario')->references('idUsuario')->on('usuarios');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('requisicion');
    }
};