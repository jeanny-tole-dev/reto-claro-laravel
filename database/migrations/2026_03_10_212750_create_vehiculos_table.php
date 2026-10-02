<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('vehiculos', function (Blueprint $table) {
            $table->id(); 
            $table->string('marca'); 
            $table->string('placa')->unique(); 
            $table->string('color'); 
            $table->string('modelo'); 
            $table->date('fecha_compra'); 
            $table->string('accidente'); 
            $table->timestamps(); 
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('vehiculos');
    }
};