@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Detalles de Alquiler</h1>
        <a href="{{ route('admin.alquiler-detalles.create') }}" class="btn btn-primary mb-3">Crear Nuevo Detalle de Alquiler</a>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="card">
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Alquiler ID</th>
                            <th>Traje ID</th>
                            <th>Usuario ID</th>
                            <th>Precio Alquiler</th>
                            <th>Cantidad</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($detalles as $detalle)
                            <tr>
                                <td>{{ $detalle->idAlquilerDetalle }}</td>
                                <td>{{ $detalle->idAlquiler }}</td>
                                <td>{{ $detalle->idTraje }}</td>
                                <td>{{ $detalle->idUsuario }}</td>
                                <td>{{ $detalle->precioAlquiler }}</td>
                                <td>{{ $detalle->cantidad }}</td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <a href="{{ route('admin.alquiler-detalles.show', $detalle) }}" class="btn btn-info btn-sm">Ver</a>
                                        <a href="{{ route('admin.alquiler-detalles.edit', $detalle) }}" class="btn btn-warning btn-sm">Editar</a>
                                        <form action="{{ route('admin.alquiler-detalles.destroy', $detalle) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar?')">Eliminar</button>
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