<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('item_requisicion', function (Blueprint $table) {
            $table->id('idItemRequisicion');
            $table->integer('cantidad');
            $table->integer('cantidadAprobada');
            $table->unsignedBigInteger('idMaterial');
            $table->unsignedBigInteger('idRequisicion');
            $table->timestamps();

            $table->foreign('idMaterial')->references('codigo')->on('materiales')->onDelete('cascade');
            $table->foreign('idRequisicion')->references('idRequisicion')->on('requisiciones')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('item_requisicion');
    }
};
