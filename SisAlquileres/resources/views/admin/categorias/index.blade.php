@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Categorías</h1>

    <div class="row mb-3 align-items-center">
        <div class="col-md-6 mb-2 mb-md-0">
            <a href="{{ route('admin.categorias.create') }}" class="btn btn-primary">Crear Nueva Categoría</a>
        </div>
        <div class="col-md-6">
            <form action="{{ route('admin.categorias.index') }}" method="GET" class="d-flex">
                <input type="text" name="search" class="form-control me-2" placeholder="Buscar..."
                    value="{{ $search ?? '' }}">
                <button type="submit" class="btn btn-outline-secondary">Buscar</button>
            </form>
        </div>
    </div>

    @if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-striped mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Descripcion</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($categorias as $categoria)
                        <tr>
                            <td>{{ $categoria->id }}</td>
                            <td>{{ $categoria->nombre }}</td>
                            <td>{{ $categoria->descripcion }}</td>
                            <td class="text-center">
                                <div class="d-flex justify-content-center gap-2">
                                    <a href="{{ route('admin.categorias.show', $categoria) }}"
                                        class="btn btn-info btn-sm">Ver</a>
                                    <a href="{{ route('admin.categorias.edit', $categoria) }}"
                                        class="btn btn-warning btn-sm">Editar</a>
                                    <form action="{{ route('admin.categorias.destroy', $categoria->id) }}" method="POST"
                                        class="d-inline"
                                        onsubmit="return confirm('¿Estás seguro de que deseas eliminar este traje? Esta acción no se puede deshacer.');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center text-muted">No hay categorías registradas.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer">
            <div class="d-flex justify-content-center">
                {{ $categorias->links() }}
            </div>
        </div>
    </div>
</div>
@endsection