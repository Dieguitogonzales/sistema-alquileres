@extends('layouts.app')
    
    @section('content')
        <div class="container">
            <h1 class="mb-4">Clientes</h1>
    
            <div class="row mb-3 align-items-center">
                <div class="col-md-6 mb-2 mb-md-0">
                    <a href="{{ route('clientes.create') }}" class="btn btn-primary">Crear Nuevo Cliente</a>
                </div>
                <div class="col-md-6">
                    <form action="{{ route('clientes.index') }}" method="GET" class="d-flex">
                        <input type="text" name="search" class="form-control me-2" placeholder="Buscar..." value="{{ $search ?? '' }}">
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
                                    <th>Apellido Paterno</th>
                                    <th>Apellido Materno</th>
                                    <th>Teléfono</th>
                                    <th>CI Cliente</th>
                                    <th class="text-center">Acciones</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($clientes as $cliente)
                                    <tr>
                                        <td>{{ $cliente->id }}</td>
                                        <td>{{ $cliente->nombre }}</td>
                                        <td>{{ $cliente->apellidoP ?? 'N/A' }}</td>
                                        <td>{{ $cliente->apellidoM ?? 'N/A' }}</td>
                                        <td>{{ $cliente->telefono ?? 'N/A' }}</td>
                                        <td>{{ $cliente->ciCliente }}</td>
                                        <td class="text-center">
                                            <div class="d-flex justify-content-center gap-2">
                                                <a href="{{ route('clientes.show', $cliente) }}" class="btn btn-info btn-sm">Ver</a>
                                                <a href="{{ route('clientes.edit', $cliente) }}" class="btn btn-warning btn-sm">Editar</a>
                                                <form action="{{ route('clientes.destroy', $cliente) }}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                                </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center text-muted">No hay clientes registrados.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
    
                <div class="card-footer">
                    <div class="d-flex justify-content-center">
                    {{ $clientes->links() }}
                    </div>
                </div>
            </div>
        </div>
    @endsection
    