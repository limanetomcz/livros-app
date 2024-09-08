<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Livro;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LivroTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Teste para criar um livro.
     *
     * @return void
     */
    public function test_create_livro()
    {
        $livroData = [
            'titulo' => 'Livro de Teste',
            'editora' => 'Autor Exemplo',
            'edicao' => 1,
            'ano_publicacao'=>'2024',
            'valor' => 19.99,
        ];

        $livro = Livro::create($livroData);

        $this->assertDatabaseHas('livros', $livroData);
    }

    /**
     * Teste para ler um livro.
     *
     * @return void
     */
    public function test_read_livro()
    {
        $livro = Livro::factory()->create();

        $foundLivro = Livro::find($livro->codl);

        $this->assertEquals($livro->titulo, $foundLivro->titulo);
        $this->assertEquals($livro->edicao, $foundLivro->edicao);
        $this->assertEquals($livro->editora, $foundLivro->editora);
        $this->assertEquals($livro->ano_publicacao, $foundLivro->ano_publicacao);
        $this->assertEquals($livro->valor, $foundLivro->valor);
    }

    /**
     * Teste para atualizar um livro.
     *
     * @return void
     */
    public function test_update_livro()
    {
        $livro = Livro::factory()->create();

        $updateData = [
            'titulo' => 'Livro Atualizado',
            'editora' => 'Nova Editora',
        ];

        $livro->update($updateData);

        $this->assertDatabaseHas('livros', $updateData);
    }

    /**
     * Teste para deletar um livro.
     *
     * @return void
     */
    public function test_delete_livro()
    {
        // Cria um livro
        $livro = Livro::factory()->create();

        $livro->delete();

        $this->assertDatabaseMissing('livros', ['codl' => $livro->codl]);
    }
}
