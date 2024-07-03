<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaterialesTable extends Migration
{
    public function up()
    {
        Schema::create('materiales', function (Blueprint $table) {
            $table->id('codigo');
            $table->string('unidadMedida');
            $table->string('descripcion');
            $table->string('ubicacion');
            $table->unsignedBigInteger('idCategoria');
            $table->timestamps();

            $table->foreign('idCategoria')->references('idCategoria')->on('categorias')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('materiales');
    }
}

