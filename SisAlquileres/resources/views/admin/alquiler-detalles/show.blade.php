@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Detalles del Alquiler</h1>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">ID Detalle: {{ $alquilerDetalle->idAlquilerDetalle }}</h5>
                <p class="card-text">Alquiler ID: {{ $alquilerDetalle->alquiler->id ?? 'N/A' }}</p>
                <p class="card-text">Traje ID: {{ $alquilerDetalle->traje->id ?? 'N/A' }}</p>
                <p class="card-text">Usuario: {{ $alquilerDetalle->usuario->name ?? 'N/A' }} (ID: {{ $alquilerDetalle->usuario->id ?? 'N/A' }})</p>
                <p class="card-text">Precio Alquiler: {{ $alquilerDetalle->precioAlquiler }}</p>
                <p class="card-text">Cantidad: {{ $alquilerDetalle->cantidad }}</p>
                <a href="{{ route('admin.alquiler-detalles.edit', $alquilerDetalle) }}" class="btn btn-warning">Editar</a>
                <a href="{{ route('admin.alquiler-detalles.index') }}" class="btn btn-secondary">Volver</a>
            </div>
        </div>
    </div>
@endsection