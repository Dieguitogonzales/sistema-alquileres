@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Traje</h1>

    <form action="{{ route('admin.trajes.update', $traje) }}" method="POST" class="card p-3">
        @csrf
        @method('PUT')

        <div class="form-group mb-3">
            <label for="idCategoria">Categoría:</label>
            <select name="idCategoria" id="idCategoria" class="form-select" required>
                <option value="">Seleccione una categoría</option>
                @foreach ($categorias as $categoria)
                <option value="{{ $categoria->id }}"
                    {{ old('idCategoria', $traje->idCategoria) == $categoria->id ? 'selected' : '' }}>
                    {{ $categoria->nombre }}
                </option>
                @endforeach
            </select>
            @error('idCategoria')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="nombre">Nombre del Traje:</label>
            <input type="text" name="nombre" id="nombre" class="form-control"
                value="{{ old('nombre', $traje->nombre) }}" required>
            @error('nombre')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="tipo">Tipo:</label>
            <select name="tipo" id="tipo" class="form-select" required>
                <option value="">Seleccione un tipo</option>
                <option value="Hombre" {{ old('tipo', $traje->tipo) == 'Hombre' ? 'selected' : '' }}>Hombre</option>
                <option value="Mujer" {{ old('tipo', $traje->tipo) == 'Mujer' ? 'selected' : '' }}>Mujer</option>
            </select>
            @error('tipo')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="precio">Precio:</label>
            <input type="text" name="precio" id="precio" class="form-control"
                value="{{ old('precio', $traje->precio) }}" required>
            @error('precio')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="cantidad">Cantidad:</label>
            <input type="number" name="cantidad" id="cantidad" class="form-control"
                value="{{ old('cantidad', $traje->cantidad) }}" required min="0">
            @error('cantidad')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('admin.trajes.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection