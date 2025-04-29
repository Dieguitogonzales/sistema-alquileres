@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Trajes</h1>
        <a href="{{ route('admin.trajes.create') }}" class="btn btn-primary mb-3">Crear Nuevo Traje</a>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        {{-- Formulario de búsqueda --}}
        <form method="GET" action="{{ route('admin.trajes.index') }}" class="mb-3">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Buscar por cantidad o categoría" value="{{ request('search') }}">
                <button class="btn btn-outline-secondary" type="submit">Buscar</button>
            </div>
        </form>

        <div class="card">
            <div class="card-body">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Categoría</th>
                            <th>Cantidad</th>
                            <th>Fecha de Creación</th>
                            <th>Fecha de Actualización</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($trajes as $index => $traje)
                            <tr>
                                <td>{{ $trajes->firstItem() + $index }}</td>
                                <td>{{ $traje->categoria->nombre ?? 'Sin categoría' }}</td>
                                <td>{{ $traje->cantidad }}</td>
                                <td>{{ $traje->created_at ? $traje->created_at->format('d/m/Y H:i') : '-' }}</td>
                                <td>{{ $traje->updated_at ? $traje->updated_at->format('d/m/Y H:i') : '-' }}</td>
                                <td>
                                   
                                    

                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">No se encontraron trajes.</td>
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
