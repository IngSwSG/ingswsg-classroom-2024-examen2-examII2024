<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edicion de material</title>
</head>
<body>
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Material</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('materials.update', $material->codigo) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="unidadMedida">Unidad de Medida</label>
            <input type="text" class="form-control" id="unidadMedida" name="unidadMedida" value="{{ $material->unidadMedida }}" required>
        </div>

        <div class="form-group">
            <label for="descripcion">Descripción</label>
            <input type="text" class="form-control" id="descripcion" name="descripcion" value="{{ $material->descripcion }}" required>
        </div>

        <div class="form-group">
            <label for="ubicacion">Ubicación</label>
            <input type="text" class="form-control" id="ubicacion" name="ubicacion" value="{{ $material->ubicacion }}" required>
        </div>

        <div class="form-group">
            <label for="categoria_id">Categoría</label>
            <select class="form-control" id="categoria_id" name="categoria_id" required>
                @foreach($categorias as $categoria)
                    <option value="{{ $categoria->idCategoria }}" {{ $material->categoria_id == $categoria->idCategoria ? 'selected' : '' }}>{{ $categoria->nombre }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div>
@endsection
</body>
</html>