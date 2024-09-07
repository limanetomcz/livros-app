<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciamento de Livros</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="{{ route('livros.index') }}">Livros</a>
            <a class="navbar-brand" href="{{ route('autores.index') }}">Autores</a>
            <a class="navbar-brand" href="{{ route('assuntos.index') }}">Assuntos</a>
        </div>
    </nav>
    <div class="py-4">
        @yield('content')
    </div>
</body>
</html>
