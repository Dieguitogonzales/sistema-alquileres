@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Detalles del Traje</h1>

        <div class="card p-3">
            <p><strong>ID:</strong> {{ $traje->idTraje }}</p>
            <p><strong>Categoría:</strong> {{ $traje->categoria->nombre }}</p>
            <p><strong>Cantidad:</strong> {{ $traje->cantidad }}</p>
            <p><strong>Fecha de Creación:</strong> {{ $traje->fecha_creacion }}</p>
            <p><strong>Fecha de Actualización:</strong> {{ $traje->fecha_actualizacion }}</p>
        </div>

        <a href="{{ route('admin.trajes.index') }}" class="btn btn-secondary mt-3">Volver a la lista</a>
    </div>
@endsection
