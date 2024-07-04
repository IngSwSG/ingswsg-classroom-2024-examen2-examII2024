<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Material</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Actualizar Material</h2>
        <form action="{{ route('materiales.update', $material->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="unidadMedida">Unidad de Medida</label>
                <input type="text" class="form-control" id="unidadMedida" name="unidadMedida" value="{{ $material->unidadMedida }}" required>
            </div>
            <div class="form-group">
                <label for="descripcion">Descripción</label>
                <textarea class="form-control" id="descripcion" name="descripcion" required>{{ $material->descripcion }}</textarea>
            </div>
            <div class="form-group">
                <label for="ubicacion">Ubicación</label>
                <input type="text" class="form-control" id="ubicacion" name="ubicacion" value="{{ $material->ubicacion }}" required>
            </div>
            <div class="form-group">
                <label for="categoria">Categoría</label>
                <select class="form-control" id="categoria" name="categoria_id" required>
                    <option value="" disabled>Seleccione una categoría</option>
                    @foreach($categorias as $categoria)
                        <option value="{{ $categoria->id }}" {{ $material->categoria_id == $categoria->id ? 'selected' : '' }}>{{ $categoria->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
    </div>
</body>
</html>
