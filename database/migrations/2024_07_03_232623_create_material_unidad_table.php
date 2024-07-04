<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaterialUnidadTable extends Migration
{
    public function up()
    {
        Schema::create('material_unidad', function (Blueprint $table) {
            $table->id('idMaterialUnidad');
            $table->integer('cantidad');
            $table->unsignedBigInteger('idMaterial');
            $table->foreign('idMaterial')->references('idMaterial')->on('material');
            $table->unsignedBigInteger('idUnidad');
            $table->foreign('idUnidad')->references('idUnidad')->on('unidad');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('material_unidad');
    }
};