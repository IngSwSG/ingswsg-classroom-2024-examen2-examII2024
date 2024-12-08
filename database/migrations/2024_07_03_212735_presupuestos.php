<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('presupuestos', function (Blueprint $table) {
            $table->id('codigoPresupuesto');
            $table->string('nombrePresupuesto');
            $table->unsignedBigInteger('idUnidad');
            $table->timestamps();

            $table->foreign('idUnidad')->references('idUnidad')->on('unidades')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('presupuestos');
    }
};
