@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Editar Autor</h1>

    <form method="POST" action="{{ route('autores.update', $autor['codau']) }}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" class="form-control" id="nome" name="nome" value="{{ $autor['nome'] }}" required>
            @error('nome')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-success">Salvar Alterações</button>
        <a href="{{ route('autores.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
