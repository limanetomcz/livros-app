@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Gerenciamento de Livros</h1>

    <form method="GET" action="{{ route('livros.index') }}" class="mb-4">
        <div class="input-group">
            <input type="text" name="filtro" value="{{ request('filtro') }}" class="form-control" placeholder="Filtrar por título, editora ou autor">
            <button type="submit" class="btn btn-primary">Filtrar</button>
        </div>
    </form>

    <div class="card mb-4">
        <div class="card-header">Adicionar Novo Livro</div>
        <div class="card-body">
            <form method="POST" action="{{ route('livros.store') }}">
                @csrf

                <!-- Título -->
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="titulo" class="form-label">Título</label>
                        <input type="text" 
                               class="form-control @error('titulo') is-invalid @enderror" 
                               id="titulo" 
                               name="titulo" 
                               value="{{ old('titulo') }}" 
                               required>
                        @error('titulo')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Editora -->
                    <div class="col-md-6">
                        <label for="editora" class="form-label">Editora</label>
                        <input type="text" 
                               class="form-control @error('editora') is-invalid @enderror" 
                               id="editora" 
                               name="editora" 
                               value="{{ old('editora') }}" 
                               required>
                        @error('editora')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>


                <div class="row mb-3">
                <!-- Edição -->
                <div class="col-md-4">
                    <label for="edicao" class="form-label">Edição</label>
                    <input type="number" 
                        class="form-control @error('edicao') is-invalid @enderror" 
                        id="edicao" 
                        name="edicao" 
                        value="{{ old('edicao') }}" 
                        required>
                    @error('edicao')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- Ano de Publicação -->
                <div class="col-md-4">
                    <label for="ano_publicacao" class="form-label">Ano de Publicação</label>
                    <input type="number" 
                        class="form-control @error('ano_publicacao') is-invalid @enderror" 
                        id="ano_publicacao" 
                        name="ano_publicacao" 
                        value="{{ old('ano_publicacao') }}" 
                        required>
                    @error('ano_publicacao')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- Valor -->
                <div class="col-md-4">
                        <label for="valor" class="form-label">Valor</label>
                        <input type="number" 
                            class="form-control @error('valor') is-invalid @enderror" 
                            id="valor" 
                            name="valor" 
                            value="{{ old('valor') }}" 
                            required>
                        @error('valor')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
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
                    <th>Valor</th>
                    <th>Autores</th>
                    <th>Assuntos</th>
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
                        <td>{{ 'R$ ' . number_format($livro->valor, 2, ',', '.') }}</td>
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
                            @if ($livro->assuntos->isNotEmpty())
                                @foreach ($livro->assuntos as $assunto)
                                    <span class="badge bg-secondary">{{ $assunto->descricao }}</span>
                                @endforeach
                            @else
                                <span class="text-muted">Nenhum assunto associado</span>
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