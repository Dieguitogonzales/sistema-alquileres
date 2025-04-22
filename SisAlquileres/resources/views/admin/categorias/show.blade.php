@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Detalles de la Categoría</h1>

        <div class="card p-3">
            <p><strong>Nombre:</strong> {{ $categoria->nombre }}</p>
            <p><strong>Precio:</strong> {{ $categoria->precio }}</p>
        </div>

        <a href="{{ route('admin.categorias.index') }}" class="btn btn-secondary mt-3">Volver a la lista</a>
    </div>
@endsection