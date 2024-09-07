@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Editar Livro</h1>

    <form method="POST" action="{{ route('livros.update', $livro->codl) }}">
        @csrf
        @method('PUT')

        <!-- Primeira linha: Título e Editora -->
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="titulo" class="form-label">Título</label>
                <input type="text" 
                       class="form-control @error('titulo') is-invalid @enderror" 
                       id="titulo" 
                       name="titulo" 
                       value="{{ old('titulo', $livro->titulo) }}" 
                       required>
                @error('titulo')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="col-md-6">
                <label for="editora" class="form-label">Editora</label>
                <input type="text" 
                       class="form-control @error('editora') is-invalid @enderror" 
                       id="editora" 
                       name="editora" 
                       value="{{ old('editora', $livro->editora) }}" 
                       required>
                @error('editora')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>

        <!-- Segunda linha: Edição, Ano de Publicação e Valor -->
        <div class="row mb-3">
            <div class="col-md-4">
                <label for="edicao" class="form-label">Edição</label>
                <input type="number" 
                       class="form-control @error('edicao') is-invalid @enderror" 
                       id="edicao" 
                       name="edicao" 
                       value="{{ old('edicao', $livro->edicao) }}" 
                       required>
                @error('edicao')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="col-md-4">
                <label for="ano_publicacao" class="form-label">Ano de Publicação</label>
                <input type="number" 
                       class="form-control @error('ano_publicacao') is-invalid @enderror" 
                       id="ano_publicacao" 
                       name="ano_publicacao" 
                       value="{{ old('ano_publicacao', $livro->ano_publicacao) }}" 
                       required>
                @error('ano_publicacao')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="col-md-4">
                <label for="valor" class="form-label">Valor</label>
                <input type="number" 
                    class="form-control @error('valor') is-invalid @enderror" 
                    id="valor" 
                    name="valor" 
                    value="{{ old('valor', $livro->valor) }}" 
                    step="0.01"  
                    min="0"
                    required>
                @error('valor')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>

        <!-- Assuntos e Autores com múltipla seleção -->
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="assunto" class="form-label">Assunto</label>
                <select class="form-control @error('assuntos') is-invalid @enderror" 
                        id="assuntos" 
                        name="assuntos[]" 
                        required
                        multiple>
                    @foreach($assuntos as $assunto)
                        <option value="{{ $assunto->codas }}" 
                            {{ in_array($assunto->codas, $livro->assuntos->pluck('codas')->toArray()) ? 'selected' : '' }}>
                            {{ $assunto->descricao }}
                        </option>
                    @endforeach
                </select>
                @error('assunto')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="col-md-6">
                <label for="autores" class="form-label">Autor</label>
                <select class="form-control @error('autores') is-invalid @enderror" 
                        id="autores" 
                        name="autores[]" 
                        required
                        multiple>
                    @foreach($autores as $autor)
                        <option value="{{ $autor->codau }}" 
                            {{ in_array($autor->codau, $livro->autores->pluck('codau')->toArray()) ? 'selected' : '' }}>
                            {{ $autor->nome }}
                        </option>
                    @endforeach
                </select>
                @error('autor')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>

        <button type="submit" class="btn btn-success">Atualizar Livro</button>
    </form>
</div>
@endsection
