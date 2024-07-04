<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePresupuestoTable extends Migration
{
    public function up()
    {
        Schema::create('presupuesto', function (Blueprint $table) {
            $table->id('codigoPresupuesto');
            $table->string('nombrePresupuesto');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('presupuesto');
    }
};