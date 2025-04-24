@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Crear Nuevo Detalle de Alquiler</h1>
        <form action="{{ route('admin.alquiler-detalles.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="idAlquiler" class="form-label">Alquiler</label>
                <select class="form-control @error('idAlquiler') is-invalid @enderror" id="idAlquiler" name="idAlquiler" required>
                    <option value="">Seleccionar Alquiler</option>
                    @foreach ($alquileres as $alquiler)
                        <option value="{{ $alquiler->id }}">{{ $alquiler->id }}</option> {{-- Ajusta cómo quieres mostrar el alquiler --}}
                    @endforeach
                </select>
                @error('idAlquiler')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="idTraje" class="form-label">Traje</label>
                <select class="form-control @error('idTraje') is-invalid @enderror" id="idTraje" name="idTraje" required>
                    <option value="">Seleccionar Traje</option>
                    @foreach ($trajes as $traje)
                        <option value="{{ $traje->id }}">{{ $traje->id }}</option> {{-- Ajusta cómo quieres mostrar el traje --}}
                    @endforeach
                </select>
                @error('idTraje')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="idUsuario" class="form-label">Usuario</label>
                <select class="form-control @error('idUsuario') is-invalid @enderror" id="idUsuario" name="idUsuario" required>
                    <option value="">Seleccionar Usuario</option>
                    @foreach ($usuarios as $usuario)
                        <option value="{{ $usuario->id }}">{{ $usuario->name }} (ID: {{ $usuario->id }})</option> {{-- Ajusta cómo quieres mostrar el usuario --}}
                    @endforeach
                </select>
                @error('idUsuario')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="precioAlquiler" class="form-label">Precio Alquiler</label>
                <input type="number" step="0.01" class="form-control @error('precioAlquiler') is-invalid @enderror" id="precioAlquiler" name="precioAlquiler" value="{{ old('precioAlquiler') }}" required>
                @error('precioAlquiler')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="cantidad" class="form-label">Cantidad</label>
                <input type="number" class="form-control @error('cantidad') is-invalid @enderror" id="cantidad" name="cantidad" value="{{ old('cantidad') }}" required>
                @error('cantidad')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Guardar Detalle</button>
            <a href="{{ route('admin.alquiler-detalles.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
@endsection