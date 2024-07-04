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
            $table->id();
            $table->unsignedBigInteger('idUnidad'); 
            $table->integer('cantidad');
             $table->timestamps();
             $table->foreign('idUnidad')->references('idUnidad')->on('unidads')->onDelete('cascade'); });
            
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('material_unidads');
    }
};
