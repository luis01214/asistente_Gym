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
        Schema::table('dias', function (Blueprint $table) {
            $table->string('grupo_muscular')->nullable();
            $table->unsignedBigInteger('semana_id')->nullable();

            $table->foreign('semana_id')->references('id')->on('semanas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('dias', function (Blueprint $table) {
            $table->dropForeign(['semana_id']);
            $table->dropColumn(['grupo_muscular', 'semana_id']);
        });
    }
};
