<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('requisiciones', function (Blueprint $table) {
            $table->id('idRequisicion');
            $table->datetime('fecha');
            $table->string('estado');
            $table->integer('idUsuario');
            $table->timestamps();

        });
    }

    public function down()
    {
        Schema::dropIfExists('requisiciones');
    }
};
