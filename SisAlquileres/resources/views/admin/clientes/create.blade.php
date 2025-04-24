@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Crear Nuevo Cliente</h1>
        <form action="/admin/clientes" method="POST">
            @csrf
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control @error('nombre') is-invalid @enderror" id="nombre" name="nombre" value="{{ old('nombre') }}" required>
                @error('nombre')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="apellidoP" class="form-label">Apellido Paterno</label>
                <input type="text" class="form-control @error('apellidoP') is-invalid @enderror" id="apellidoP" name="apellidoP" value="{{ old('apellidoP') }}">
                @error('apellidoP')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="apellidoM" class="form-label">Apellido Materno</label>
                <input type="text" class="form-control @error('apellidoM') is-invalid @enderror" id="apellidoM" name="apellidoM" value="{{ old('apellidoM') }}">
                @error('apellidoM')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="telefono" class="form-label">Teléfono</label>
                <input type="text" class="form-control @error('telefono') is-invalid @enderror" id="telefono" name="telefono" value="{{ old('telefono') }}">
                @error('telefono')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="ciCliente" class="form-label">CI Cliente</label>
                <input type="text" class="form-control @error('ciCliente') is-invalid @enderror" id="ciCliente" name="ciCliente" value="{{ old('ciCliente') }}" required>
                @error('ciCliente')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Guardar Cliente</button>
            <a href="{{ route('clientes.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
@endsection