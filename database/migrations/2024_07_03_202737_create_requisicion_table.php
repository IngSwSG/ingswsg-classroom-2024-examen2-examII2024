<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequisicionsTable extends Migration
{
    public function up()
    {
        Schema::create('requisicions', function (Blueprint $table) {
            $table->id('idRequisicion');
            $table->dateTime('fecha');
            $table->string('estado');
            $table->foreignId('idUsuario')->constrained('usuarios');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('requisicions');
    }
};