{{-- resources/views/material/create.blade.php --}}

<!DOCTYPE html>
<html>
<head>
    <title>Crear Material</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2>Crear Material</h2>
    
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('material.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="codigo">Código</label>
            <input type="text" class="form-control" id="codigo" name="codigo" value="{{ old('codigo') }}" required>
        </div>
        <div class="form-group">
            <label for="unidadMedida">Unidad de Medida</label>
            <input type="text" class="form-control" id="unidadMedida" name="unidadMedida" value="{{ old('unidadMedida') }}" required>
        </div>
        <div class="form-group">
            <label for="descripcion">Descripción</label>
            <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required>{{ old('descripcion') }}</textarea>
        </div>
        <div class="form-group">
            <label for="ubicacion">Ubicación</label>
            <input type="text" class="form-control" id="ubicacion" name="ubicacion" value="{{ old('ubicacion') }}" required>
        </div>
        <div class="form-group">
            <label for="idCategoria">Categoría</label>
            <select class="form-control" id="idCategoria" name="idCategoria" required>
                @foreach ($categorias as $categoria)
                    <option value="{{ $categoria->nombre }}">{{ $categoria->nombre }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>
</body>
</html>
