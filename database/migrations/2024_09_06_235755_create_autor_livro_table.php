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
        {
            Schema::create('autor_livro', function (Blueprint $table) {
                $table->unsignedBigInteger('codl');
                $table->unsignedBigInteger('codau'); 
    
                $table->foreign('codl')->references('codl')->on('livros')->onDelete('cascade');
                $table->foreign('codau')->references('codau')->on('autores')->onDelete('cascade');
    
                $table->primary(['codl', 'codau']);
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('autor_livro');
    }
};
