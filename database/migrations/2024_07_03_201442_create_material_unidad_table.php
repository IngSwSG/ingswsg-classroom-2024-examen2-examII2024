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
        Schema::create('materialunidad', function (Blueprint $table) {
            $table->increments('idMaterialUnidad')->primary();
            $table->integer('cantidad');
            $table->unsignedInteger('idUnidad');
            $table->timestamps();

            $table->foreign('idUnidad')->references('idUnidad')->on('unidad')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('material_unidad');
    }
};
