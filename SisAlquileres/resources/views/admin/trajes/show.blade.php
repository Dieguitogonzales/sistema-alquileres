@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalles del Traje</h1>

    <div class="card p-3">
        <p><strong>ID:</strong> {{ $traje->idTraje }}</p>
        <p><strong>Nombre:</strong> {{ $traje->nombre }}</p>
        <p><strong>Tipo:</strong> {{ $traje->tipo }}</p>
        <p><strong>Categoría:</strong> {{ $traje->categoria->nombre }}</p>
        <p><strong>Precio:</strong> Bs {{ number_format($traje->precio, 2) }}</p>
        <p><strong>Cantidad:</strong> {{ $traje->cantidad }}</p>
        <p><strong>Estado:</strong> {{ ucfirst($traje->estado) }}</p>
        <p><strong>Fecha de Creación:</strong> {{ $traje->created_at }}</p>
        <p><strong>Fecha de Actualización:</strong> {{ $traje->updated_at }}</p>
    </div>

    <a href="{{ route('admin.trajes.edit', $traje) }}" class="btn btn-warning">Editar</a>
    <a href="{{ route('admin.trajes.index') }}" class="btn btn-secondary">Volver</a>
</div>
@endsection