<?php

namespace App\Http\Controllers;

use App\Contracts\Services\LivroServiceContract;
use App\Models\Autor;
use App\Http\Requests\LivroRequest;
use Illuminate\Http\Request;

class LivroController extends Controller
{
    protected $livrosService;

    public function __construct(LivroServiceContract $livrosService)
    {
        $this->livrosService = $livrosService;
    }

    public function index(Request $request)
    {
        $perPage = 5;

        $query = $this->livrosService->getAllPaginated($perPage);

        if ($request->filled('filtro')) {
            $query = array_filter($query->items(), function ($livro) use ($request) {
                return stripos($livro->titulo, $request->filtro) !== false || stripos($livro->editora, $request->filtro) !== false;
            });
        }

        return view('livros.index', ['livros' => $query, 'filtro' => $request->filtro]);
    }

    public function create()
    {
        // Obtendo todos os autores para selecionar no formulário
        $autores = Autor::all();
        return view('livros.create', ['autores' => $autores]);
    }

    public function edit($id)
    {
        $livro = $this->livrosService->getById($id);

        if (!$livro) {
            return redirect()->route('livros.index')->with('error', 'Livro não encontrado');
        }

        // Carregando todos os autores e os autores selecionados para o livro
        $autores = Autor::all();
        return view('livros.edit', ['livro' => $livro, 'autores' => $autores]);
    }

    public function store(LivroRequest $request)
    {
        // Valida a entrada e chama o service para criar o livro com autores
        $data = $request->validated();
        $data['autores'] = $request->autores;

        $livro = $this->livrosService->create($data);

        if ($livro) {
            return redirect()->route('livros.index')->with('success', 'Livro cadastrado com sucesso');
        }

        return redirect()->route('livros.index')->with('error', 'Livro não cadastrado');
    }

    public function update(LivroRequest $request, $id)
    {
        // Valida a entrada e chama o service para atualizar o livro e autores
        $data = $request->validated();
        $data['autores'] = $request->autores;

        $updated = $this->livrosService->update($id, $data);

        if ($updated) {
            return redirect()->route('livros.index')->with('success', 'Livro atualizado com sucesso');
        }

        return redirect()->route('livros.index')->with('error', 'Livro não atualizado');
    }

    public function destroy($codl)
    {
        $deleted = $this->livrosService->delete($codl);

        if ($deleted) {
            return redirect()->route('livros.index')->with('success', 'Livro removido com sucesso');
        }

        return redirect()->route('livros.index')->with('error', 'Livro não removido');
    }
}
