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
        Schema::create('assunto_livro', function (Blueprint $table) {
            $table->unsignedBigInteger('codl');
            $table->unsignedBigInteger('codas');

            $table->foreign('codl')->references('codl')->on('livros')->onDelete('cascade');
            $table->foreign('codas')->references('codas')->on('assuntos')->onDelete('cascade');

            $table->primary(['codl', 'codas']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assunto_livro');
    }
};
