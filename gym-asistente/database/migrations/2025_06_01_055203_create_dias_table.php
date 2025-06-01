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
       Schema::create('dias', function (Blueprint $table) {
            $table->id();
            $table->foreignId('semana_id')->constrained()->onDelete('cascade');
            $table->string('nombre'); // Ej: Lunes
            $table->string('grupo_muscular');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dias');
    }
};
