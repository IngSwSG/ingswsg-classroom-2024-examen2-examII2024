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
        Schema::create('usuarios', function (Blueprint $table) {
            $table->string('idUsuario')->primary();
            $table->integer('identificacion');
            $table->string('nombre');
            $table->string('apellidos');
            $table->string('telefono');
            $table->unsignedBigInteger('idUnidad');
            $table->foreign('idUnidad')->references('idUnidad')->on('unidads');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};
