@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Gerenciamento de Autores</h1>

    <!-- Filtro de Autores -->
    <form method="GET" action="{{ route('autores.index') }}" class="mb-4">
        <div class="input-group">
            <input type="text" name="filtro" value="{{ request('filtro') }}" class="form-control" placeholder="Filtrar por nome">
            <button type="submit" class="btn btn-primary">Filtrar</button>
        </div>
    </form>

    <!-- Formulário de Criação de Autor -->
    <div class="card mb-4">
        <div class="card-header">Adicionar Novo Autor</div>
        <div class="card-body">
            <form method="POST" action="{{ route('autores.store') }}">
                @csrf
                <div class="mb-3">
                    <label for="nome" class="form-label">Nome</label>
                    <input type="text" class="form-control" id="nome" name="nome" required>
                    @error('nome')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-success">Adicionar Autor</button>
            </form>
        </div>
    </div>

    @if(count($autores) > 0)
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Nome</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($autores as $autor)
                    <tr>
                        <td>{{ $autor['codau'] }}</td>
                        <td>{{ $autor['nome'] }}</td>
                        <td>
                            <a href="{{ route('autores.edit', $autor['codau']) }}" class="btn btn-primary btn-sm">Editar</a>
                            <form action="{{ route('autores.destroy', $autor['codau']) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p class="text-center">Nenhum autor encontrado.</p>
    @endif
</div>
@endsection
