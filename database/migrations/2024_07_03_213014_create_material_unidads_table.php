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
        Schema::create('material_unidads', function (Blueprint $table) {
            $table->id('IdMaterialUnidad');
            $table->string('Material');
            $table->unsignedBigInteger('IdUnidad');
            $table->timestamps();


            $table->foreign('IdUnidad')->references('IdUnidad')->on('Unidads');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('material_unidads');
    }
};
