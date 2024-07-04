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
        <h2>Lista de Materiales</h2>
        <a href="{{ route('materiales.create') }}" class="btn btn-success mb-3">Agregar Material</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Unidad de Medida</th>
                    <th>Descripción</th>
                    <th>Ubicación</th>
                    <th>Categoría</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($materiales as $material)
                <tr>
                    <td>{{ $material->id }}</td>
                    <td>{{ $material->unidadMedida }}</td>
                    <td>{{ $material->descripcion }}</td>
                    <td>{{ $material->ubicacion }}</td>
                    <td>{{ $material->categoria ? $material->categoria->nombre : 'Sin categoría' }}</td>
                    <td>
                        <a href="{{ route('materiales.show', ['id' => $material->id]) }}" class="btn btn-sm btn-info">Ver</a>
                        <a href="{{ route('materiales.edit', ['id' => $material->id]) }}" class="btn btn-sm btn-primary">Editar</a>
                    
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
