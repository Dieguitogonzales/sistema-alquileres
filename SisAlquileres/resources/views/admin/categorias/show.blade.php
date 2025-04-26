@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4">Detalles de la Categoría</h1>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $categoria->nombre }}</h5>
                <p class="card-text">Precio: {{ $categoria->precio }}</p>
                <a href="{{ route('categorias.edit', $categoria) }}" class="btn btn-warning">Editar</a>
                <a href="{{ route('categorias.index') }}" class="btn btn-secondary">Volver al Listado</a>
            </div>
        </div>
    </div>
@endsection