<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('DROP VIEW IF EXISTS livros_view');
        DB::statement("
            CREATE VIEW livros_view AS
            SELECT
                livros.titulo,
                livros.editora,
                livros.edicao,
                livros.ano_publicacao,
                livros.valor,
                GROUP_CONCAT(DISTINCT autores.nome SEPARATOR ', ') AS autores,
                GROUP_CONCAT(DISTINCT assuntos.descricao SEPARATOR ', ') AS assuntos
            FROM livros
            LEFT JOIN autor_livro ON livros.codl = autor_livro.codl
            LEFT JOIN autores ON autor_livro.codau = autores.codau
            LEFT JOIN assunto_livro ON livros.codl = assunto_livro.codl
            LEFT JOIN assuntos ON assunto_livro.codas = assuntos.codas
            GROUP BY livros.codl;
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('DROP VIEW IF EXISTS livros_view');
    }
};
