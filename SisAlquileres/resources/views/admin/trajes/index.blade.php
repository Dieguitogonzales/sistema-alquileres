@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Trajes</h1>
        <a href="{{ route('admin.trajes.create') }}" class="btn btn-primary mb-3">Crear Nuevo Traje</a>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="card">
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Categoría</th>
                            <th>Cantidad</th>
                            <th>Fecha de Creación</th>
                            <th>Fecha de Actualización</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($trajes as $traje)
                            <tr>
                                <td>{{ $traje->id }}</td>
                                <td>{{ $traje->categoria->nombre }}</td>
                                <td>{{ $traje->cantidad }}</td>
                                
                                
                                    <div class="d-flex justify-content-center gap-2">
                                        
                                        <a href="{{ route('admin.trajes.show', $traje) }}" class="btn btn-info btn-sm">Ver</a>
                                        <a href="{{ route('admin.trajes.edit', $traje) }}" class="btn btn-warning btn-sm">Editar</a>
                                        <form action="{{ route('admin.trajes.destroy', $traje) }}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $trajes->links() }}
            </div>
        </div>
    </div>
@endsection
