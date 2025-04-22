@extends('layouts.app') {{-- Asume que tienes una plantilla principal llamada layouts/app.blade.php --}}

@section('content')
    <div class="container">
        <h1>Categorías</h1>
        <a href="{{ route('admin.categorias.create') }}" class="btn btn-primary mb-3">Crear Nueva Categoría</a>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="card">
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Precio</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categorias as $categoria)
                            <tr>
                                <td>{{ $categoria->nombre }}</td>
                                <td>{{ $categoria->precio }}</td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <a href="{{ route('admin.categorias.show', $categoria) }}" class="btn btn-info btn-sm">Ver</a>
                                        <a href="{{ route('admin.categorias.edit', $categoria) }}" class="btn btn-warning btn-sm">Editar</a>
                                        <form action="{{ route('admin.categorias.destroy', $categoria) }}" method="POST"
                                            style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('¿Estás seguro de eliminar?')">Eliminar</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

