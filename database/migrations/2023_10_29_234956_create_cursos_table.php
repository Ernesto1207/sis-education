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
        Schema::create('cursos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('profesor_id')->nullable();
            $table->string('nombre');
            $table->text('descripcion');
            $table->time('horario_entrada');
            $table->time('horario_salida');
            $table->string('dias_semana'); 
            $table->timestamps();

            $table->foreign('profesor_id')->references('id')->on('profesores');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cursos');
    }
};
