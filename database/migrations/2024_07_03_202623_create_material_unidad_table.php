<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaterialUnidadsTable extends Migration
{
    public function up()
    {
        Schema::create('material_unidads', function (Blueprint $table) {
            $table->id('idMaterialUnidad');
            $table->integer('cantidad');
            $table->foreignId('idMaterial')->constrained('materials');
            $table->foreignId('idUnidad')->constrained('unidads');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('material_unidads');
    }
};