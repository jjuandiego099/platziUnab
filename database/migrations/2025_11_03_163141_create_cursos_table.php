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
        $table->string('titulo');
        $table->text('descripcion')->nullable();
        $table->string('imagen')->nullable();
        $table->string('nivel')->default('básico');
        $table->foreignId('categoria_id')->constrained('categorias')->onDelete('cascade');
        $table->foreignId('profesor_id')->constrained('users')->onDelete('cascade');
        $table->timestamps();
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
