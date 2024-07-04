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
            $table->id('idItemRequisicion')->primary();
            $table->integer('cantidad');
            $table->integer('cantidadAprobada');
            $table->foreignId('requisicion_id')->constrained('requisicions', 'idRequisicion')->onDelete('cascade');
            $table->foreignId('material_id')->constrained('materials', 'codigo')->onDelete('cascade');
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
