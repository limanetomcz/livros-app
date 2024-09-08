<?php

namespace Tests\Unit\Services;

use App\Models\Livro;
use App\Services\LivroService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LivroServiceTest extends TestCase
{
    use RefreshDatabase; // Garante que o banco de testes é limpo antes de cada teste

    protected $livroService;

    protected function setUp(): void
    {
        parent::setUp();
        
        // Inicializa o service de Livro real
        $this->livroService = app(LivroService::class);
    }

    /** @test */
    public function it_creates_a_livro_successfully()
    {
        $data = [
            'titulo' => 'Livro Teste',
            'editora' => 'Editora Teste',
            'edicao' => 2,
            'ano_publicacao' => 2021,
            'valor' => 59.90
        ];

        $livro = $this->livroService->create($data);

        $this->assertDatabaseHas('livros', [
            'titulo' => 'Livro Teste',
            'editora' => 'Editora Teste',
            'edicao' => 2,
            'ano_publicacao' => 2021,
            'valor' => 59.90
        ]);
    }

    /** @test */
    public function it_updates_a_livro_successfully()
    {
        $livro = Livro::factory()->create([
            'titulo' => 'Livro Original',
            'editora' => 'Editora Original',
            'edicao' => 1,
            'ano_publicacao' => 2020,
            'valor' => 49.90
        ]);

        $data = [
            'titulo' => 'Livro Atualizado',
            'editora' => 'Editora Atualizada',
            'edicao' => 3,
            'ano_publicacao' => 2022,
            'valor' => 79.90
        ];

        $this->livroService->update($livro->codl, $data);

        $this->assertDatabaseHas('livros', [
            'titulo' => 'Livro Atualizado',
            'editora' => 'Editora Atualizada',
            'edicao' => 3,
            'ano_publicacao' => 2022,
            'valor' => 79.90
        ]);
    }
}
