@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Gerenciamento de Assuntos</h1>

    <!-- Filtro de Assuntos -->
    <form method="GET" action="{{ route('assuntos.index') }}" class="mb-4">
        <div class="input-group">
            <input type="text" name="filtro" value="{{ request('filtro') }}" class="form-control" placeholder="Filtrar por descricao">
            <button type="submit" class="btn btn-primary">Filtrar</button>
        </div>
    </form>

    <!-- Formulário de Criação de Assunto -->
    <div class="card mb-4">
        <div class="card-header">Adicionar Novo Assunto</div>
        <div class="card-body">
            <form method="POST" action="{{ route('assuntos.store') }}">
                @csrf
                <div class="mb-3">
                    <label for="descricao" class="form-label">Descricao</label>
                    <input 
                        type="text" 
                        class="form-control @error('descricao') is-invalid @enderror" 
                        id="descricao" 
                        name="descricao" 
                        value="{{ old('descricao') }}" 
                        required>
                    @error('descricao')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-success">Adicionar Assunto</button>
            </form>
        </div>
    </div>

    @if(count($assuntos) > 0)
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Descrição</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($assuntos as $assunto)
                    <tr>
                        <td>{{ $assunto['codas'] }}</td>
                        <td>{{ $assunto['descricao'] }}</td>
                        <td>
                            <a href="{{ route('assuntos.edit', $assunto['codas']) }}" class="btn btn-primary btn-sm">Editar</a>
                            <form action="{{ route('assuntos.destroy', $assunto['codas']) }}" method="POST" style="display:inline;">
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
        <p class="text-center">Nenhum assunto encontrado.</p>
    @endif
</div>
@endsection
