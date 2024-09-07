@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Editar Assunto</h1>

    <form method="POST" action="{{ route('assuntos.update', $autor['codas']) }}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="descricao" class="form-label">Nome</label>
            <input type="text" class="form-control" id="descricao" name="descricao" value="{{ $autor['descricao'] }}" required>
            @error('descricao')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-success">Salvar Alterações</button>
        <a href="{{ route('assuntos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
