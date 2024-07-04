<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('item_requisicions', function (Blueprint $table) {
            $table->id('idItemRequisicion');
            $table->integer('cantidad');
            $table->integer('cantidadAprobada');
            $table->unsignedBigInteger('idRequisicion');
            $table->foreign('idRequisicion')->references('idRequisicion')->on('requisicions');
            $table->integer('idMaterial');
            $table->foreign('idMaterial')->references('codigo')->on('materials');
            $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('item_requisicions');
    }
};
