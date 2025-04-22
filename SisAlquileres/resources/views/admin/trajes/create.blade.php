@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Crear Nuevo Traje</h1>

        <form action="{{ route('admin.trajes.store') }}" method="POST" class="card p-3">
            @csrf
            <div class="form-group mb-3">
                <label for="idCategoria">Categoría:</label>
                <select name="idCategoria" id="idCategoria" class="form-select" required>
                    <option value="">Seleccione una categoría</option>
                    @foreach ($categorias as $categoria)
                        <option value="{{ $categoria->idCategoria }}" {{ old('idCategoria') == $categoria->idCategoria ? 'selected' : '' }}>
                            {{ $categoria->nombre }}
                        </option>
                    @endforeach
                </select>
                @error('idCategoria')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="cantidad">Cantidad:</label>
                <input type="number" name="cantidad" id="cantidad" class="form-control" value="{{ old('cantidad', 1) }}"
                    required min="0">
                @error('cantidad')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="{{ route('admin.trajes.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
@endsection
