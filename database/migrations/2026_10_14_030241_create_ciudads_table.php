<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * 
     *  1. Se crea la tabla de "Ciudad" con sus respectivos campos y relaciones
     */
    public function up(): void
    {
        Schema::create('ciudads', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pais_id')->constrained('pais')->onDelete('cascade');
            $table->string('nombre');
            $table->bigInteger('poblacion');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ciudads');
    }
};
