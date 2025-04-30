@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Trajes</h1>
    <a href="{{ route('admin.trajes.create') }}" class="btn btn-primary mb-3">Crear Nuevo Traje</a>

    {{-- Mensajes de éxito o error --}}
    @if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if (session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    {{-- Formulario de búsqueda --}}
    <form method="GET" action="{{ route('admin.trajes.index') }}" class="mb-3">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Buscar por cantidad o categoría"
                value="{{ request('search') }}">
            <button class="btn btn-outline-secondary" type="submit">Buscar</button>
        </div>
    </form>

    <div class="card">
        <div class="card-body">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Tipo</th>
                        <th>Categoría</th>
                        <th>Cantidad</th>
                        <th>Precio</th>
                        <th>Creado</th>
                        <th>Actualizado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($trajes as $index => $traje)
                    <tr>
                        <td>{{ $trajes->firstItem() + $index }}</td>
                        <td>{{ $traje->nombre }}</td>
                        <td>{{ $traje->tipo }}</td>
                        <td>{{ $traje->categoria->nombre ?? 'Sin categoría' }}</td>
                        <td>{{ $traje->cantidad }}</td>
                        <td>{{ number_format($traje->precio, 2) }}</td>
                        <td>{{ $traje->created_at?->format('d/m/Y H:i') ?? '-' }}</td>
                        <td>{{ $traje->updated_at?->format('d/m/Y H:i') ?? '-' }}</td>


                        <td>
                            <a href="{{ route('admin.trajes.show', $traje) }}" class="btn btn-info btn-sm">Ver</a>
                            <a href="{{ route('admin.trajes.edit', $traje->id) }}"
                                class="btn btn-sm btn-warning">Editar</a>

                            <form action="{{ route('admin.trajes.destroy', $traje->id) }}" method="POST"
                                class="d-inline"
                                onsubmit="return confirm('¿Estás seguro de que deseas eliminar este traje? Esta acción no se puede deshacer.');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                            </form>
                        </td>

                    </tr>
                    @empty
                    <tr>
                        <td colspan="9" class="text-center">No se encontraron trajes.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>

            {{-- Paginación --}}
            <div class="d-flex justify-content-center">
                {{ $trajes->links() }}
            </div>
        </div>
    </div>
</div>
@endsection