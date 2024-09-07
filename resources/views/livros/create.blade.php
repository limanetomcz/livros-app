@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Adicionar Novo Livro</h1>

    <!-- Exibe erros de validação -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Formulário de criação de livro -->
    <form action="{{ route('livros.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="titulo" class="form-label">Título</label>
            <input type="text" class="form-control" id="titulo" name="titulo" value="{{ old('titulo') }}" required>
        </div>
        
        <div class="mb-3">
            <label for="editora" class="form-label">Editora</label>
            <input type="text" class="form-control" id="editora" name="editora" value="{{ old('editora') }}" required>
        </div>

        <div class="mb-3">
            <label for="edicao" class="form-label">Edição</label>
            <input type="number" class="form-control" id="edicao" name="edicao" value="{{ old('edicao') }}" required>
        </div>

        <div class="mb-3">
            <label for="ano_publicacao" class="form-label">Ano de Publicação</label>
            <input type="number" class="form-control" id="ano_publicacao" name="ano_publicacao" value="{{ old('ano_publicacao') }}" required>
        </div>

        <!-- Seleção de Autores -->
        <div class="mb-3">
            <label for="autores" class="form-label">Autores</label>
            <select name="autores[]" id="autores" class="form-control" multiple required>
                @foreach ($autores as $autor)
                    <option value="{{ $autor->codau }}">{{ $autor->nome }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">Adicionar Livro</button>
        <a href="{{ route('livros.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
