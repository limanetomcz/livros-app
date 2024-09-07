<?php

namespace App\Http\Controllers;

use App\Contracts\Services\AssuntoServiceContract;
use App\Http\Requests\AssuntoRequest;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class AssuntoController extends Controller
{
    protected $assuntosService;

    public function __construct(AssuntoServiceContract $assuntosService)
    {
        $this->assuntosService = $assuntosService;
    }

    public function index(Request $request)
    {

        $assuntos = $this->assuntosService->getFiltered($request->filtro);

        return view('assuntos.index', [
            'assuntos' => $assuntos,
            'filtro' => $request->filtro
        ]);
    }

    public function edit($id)
    {
        $autor = $this->assuntosService->getById($id);

        if (!$autor) {
            return redirect()->route('assuntos.index')->with('error', 'Assunto não encontrado');
        }

        return view('assuntos.edit', ['autor' => $autor]);
    }

    public function store(AssuntoRequest $request)
    {
        $autor = $this->assuntosService->create($request->validated());

        if ($autor) {
            return redirect()->route('assuntos.index')->with('sucess', 'Assunto cadastrado com sucesso');
        }

        return redirect()->route('assuntos.index')->with('error', 'Assunto não cadastrado');
    }

    public function update(AssuntoRequest $request, $id)
    {
        $updated = $this->assuntosService->update($id, $request->validated());

        if ($updated) {
            return redirect()->route('assuntos.index')->with('sucess', 'Assunto atualizado com sucesso');
        }

        return redirect()->route('assuntos.index')->with('error', 'Assunto não atualizado');
    }

    public function destroy($codau)
    {
        $deleted = $this->assuntosService->delete($codau);

        if ($deleted) {
            return redirect()->route('assuntos.index')->with('sucess', 'Assunto removido com sucesso');
        }

        return redirect()->route('assuntos.index')->with('error', 'Assunto não removido');
    }
}
