<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Materiales</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h1>Lista de Materiales</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Código</th>
                <th>Unidad de Medida</th>
                <th>Descripción</th>
                <th>Ubicación</th>
                <th>Categoría</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($materials as $material)
                <tr>
                    <td>{{ $material->id }}</td>
                    <td>{{ $material->codigo }}</td>
                    <td>{{ $material->unidadMedida }}</td>
                    <td>{{ $material->descripcion }}</td>
                    <td>{{ $material->ubicacion }}</td>
                    <td>{{ $material->idCategoria }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
</body>
</html>