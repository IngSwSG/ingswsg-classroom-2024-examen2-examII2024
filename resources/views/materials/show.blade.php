<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrar Material</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Detalle del Material</h2>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $material->descripcion }}</h5>
                <p class="card-text"><strong>Unidad de Medida:</strong> {{ $material->unidadMedida }}</p>
                <p class="card-text"><strong>Ubicación:</strong> {{ $material->ubicacion }}</p>
                <p class="card-text"><strong>Categoría:</strong> {{ $material->categoria->nombre }}</p>
            </div>
        </div>
        <a href="{{ route('materiales.index') }}" class="btn btn-secondary mt-3">Volver a la lista</a>
    </div>
</body>
</html>
