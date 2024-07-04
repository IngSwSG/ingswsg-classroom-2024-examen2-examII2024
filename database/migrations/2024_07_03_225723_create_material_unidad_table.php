<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('material_unidad', function (Blueprint $table) {
            $table->id('idMaterialUnidad');
            $table->integer('cantidad');
            $table->unsignedBigInteger('idUnidad');
            $table->unsignedBigInteger('idMaterial');
            $table->timestamps();

            $table->foreign('idUnidad')->references('idUnidad')->on('unidades')->onDelete('cascade');
            $table->foreign('idMaterial')->references('codigo')->on('materiales')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('material_unidad');
    }
};
