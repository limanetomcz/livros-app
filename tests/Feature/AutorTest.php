<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Autor;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AutorTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Teste para criar um autor.
     *
     * @return void
     */
    public function test_create_autor()
    {
        $autorData = [
            'nome' => 'Nome de teste'
        ];

        $autor = Autor::create($autorData);

        $this->assertDatabaseHas('autores', $autorData);
    }

    /**
     * Teste para ler um autor.
     *
     * @return void
     */
    public function test_read_autor()
    {
        $autor = Autor::factory()->create();

        $foundAutor = Autor::find($autor->codau);

        $this->assertEquals($autor->nome, $foundAutor->nome);
    }

    /**
     * Teste para atualizar um autor.
     *
     * @return void
     */
    public function test_update_autor()
    {
        $autor = Autor::factory()->create();

        $updateData = [
            'nome' => 'Nome Atualizado'
        ];

        $autor->update($updateData);

        $this->assertDatabaseHas('autores', $updateData);
    }

    /**
     * Teste para deletar um autor.
     *
     * @return void
     */
    public function test_delete_autor()
    {
        // Cria um autor
        $autor = Autor::factory()->create();

        $autor->delete();

        $this->assertDatabaseMissing('autores', ['codau' => $autor->codau]);
    }
}
