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
        Schema::create('material', function (Blueprint $table) {
            $table->id('idMaterial');
            $table->integer('codigo');
            $table->string('unidadMedida');
            $table->string('descripcion');
            $table->string('ubicacion');
            $table->unsignedBigInteger('idCategoria');
            $table->foreign('idCategoria')->references('idCategoria')->on('categoria');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('material');
    }
};
