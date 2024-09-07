<?php

namespace App\Http\Controllers;

use App\Contracts\Services\AutorServiceContract;
use App\Http\Requests\AutorRequest;
use Illuminate\Http\Request;

class AutorController extends Controller
{
    protected $autoresService;

    public function __construct(AutorServiceContract $autoresService)
    {
        $this->autoresService = $autoresService;
    }

    public function index(Request $request)
    {
        $query = $this->autoresService->getAll();

        if ($request->filled('filtro')) {
            $query = array_filter($query, function ($autor) use ($request) {
                return stripos($autor['titulo'], $request->filtro) !== false || stripos($autor['editora'], $request->filtro) !== false;
            });
        }

        return view('autores.index', ['autores' => $query, 'filtro' => $request->filtro]);
    }

    public function edit($id)
    {
        $autor = $this->autoresService->getById($id);

        if (!$autor) {
            return redirect()->route('autores.index')->with('error', 'Autor não encontrado');
        }

        return view('autores.edit', ['autor' => $autor]);
    }

    public function store(AutorRequest $request)
    {
        $autor = $this->autoresService->create($request->validated());

        if ($autor) {
            return redirect()->route('autores.index')->with('sucess', 'Autor cadastrado com sucesso');
        }

        return redirect()->route('autores.index')->with('error', 'Autor não cadastrado');
    }

    public function update(AutorRequest $request, $id)
    {
        $updated = $this->autoresService->update($id, $request->validated());

        if ($updated) {
            return redirect()->route('autores.index')->with('sucess', 'Autor atualizado com sucesso');
        }

        return redirect()->route('autores.index')->with('error', 'Autor não atualizado');
    }

    public function destroy($codau)
    {
        $deleted = $this->autoresService->delete($codau);

        if ($deleted) {
            return redirect()->route('autores.index')->with('sucess', 'Autor removido com sucesso');
        }

        return redirect()->route('autores.index')->with('error', 'Autor não removido');
    }
}
