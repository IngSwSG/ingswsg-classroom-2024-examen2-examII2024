<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuariosTable extends Migration
{
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->string('idUsuario')->primary();
            $table->integer('identificacion');
            $table->string('nombre');
            $table->string('apellidos');
            $table->string('telefono');
            $table->unsignedBigInteger('idUnidad');
            $table->foreign('idUnidad')->references('idUnidad')->on('unidad');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('usuarios');
    }
};
