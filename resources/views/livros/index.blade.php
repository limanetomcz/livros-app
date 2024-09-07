@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Gerenciamento de Livros</h1>

    <!-- Filtro de Livros -->
    <form method="GET" action="{{ route('livros.index') }}" class="mb-4">
        <div class="input-group">
            <input type="text" name="filtro" value="{{ request('filtro') }}" class="form-control" placeholder="Filtrar por título, editora ou autor">
            <button type="submit" class="btn btn-primary">Filtrar</button>
        </div>
    </form>

    <!-- Formulário de Criação de Livro -->
    <div class="card mb-4">
        <div class="card-header">Adicionar Novo Livro</div>
        <div class="card-body">
            <form method="POST" action="{{ route('livros.store') }}">
                @csrf

                <!-- Primeira linha de inputs (Título e Editora) -->
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="titulo" class="form-label">Título</label>
                        <input type="text" class="form-control" id="titulo" name="titulo" required>
                    </div>
                    <div class="col-md-6">
                        <label for="editora" class="form-label">Editora</label>
                        <input type="text" class="form-control" id="editora" name="editora" required>
                    </div>
                </div>

                <!-- Segunda linha de inputs (Edição e Ano de Publicação) -->
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="edicao" class="form-label">Edição</label>
                        <input type="number" class="form-control" id="edicao" name="edicao" required>
                    </div>
                    <div class="col-md-6">
                        <label for="ano_publicacao" class="form-label">Ano de Publicação</label>
                        <input type="number" class="form-control" id="ano_publicacao" name="ano_publicacao" required>
                    </div>
                </div>

                <button type="submit" class="btn btn-success">Adicionar Livro</button>
            </form>
        </div>
    </div>

    <!-- Grid de Livros -->
    @if($livros->count() > 0)
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Título</th>
                    <th>Editora</th>
                    <th>Edição</th>
                    <th>Ano de Publicação</th>
                    <th>Autores</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($livros as $livro)
                    <tr>
                        <td>{{ $livro->codl }}</td>
                        <td>{{ $livro->titulo }}</td>
                        <td>{{ $livro->editora }}</td>
                        <td>{{ $livro->edicao }}</td>
                        <td>{{ $livro->ano_publicacao }}</td>
                        <td>
                            @if ($livro->autores->isNotEmpty())
                                @foreach ($livro->autores as $autor)
                                    <span class="badge bg-secondary">{{ $autor->nome }}</span>
                                @endforeach
                            @else
                                <span class="text-muted">Nenhum autor associado</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('livros.edit', $livro->codl) }}" class="btn btn-primary btn-sm">Editar</a>
                            <form action="{{ route('livros.destroy', $livro->codl) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $livros->links('pagination::bootstrap-4') }}

    @else
        <p class="text-center">Nenhum livro encontrado.</p>
    @endif
</div>
@endsection
