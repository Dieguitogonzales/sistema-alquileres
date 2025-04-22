@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Editar Categoría</h1>

        <form action="{{ route('admin.categorias.update', $categoria) }}" method="POST" class="card p-3">
            @csrf
            @method('PUT')
            <div class="form-group mb-3">
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" id="nombre" class="form-control"
                    value="{{ old('nombre', $categoria->nombre) }}" required>
                @error('nombre')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="precio">Precio:</label>
                <input type="number" name="precio" id="precio" class="form-control"
                    value="{{ old('precio', $categoria->precio) }}" required min="0" step="0.01">
                @error('precio')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Actualizar</button>
            <a href="{{ route('admin.categorias.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
@endsection