@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4">Alquileres</h1>

        <div class="row mb-3 align-items-center">
            <div class="col-md-6 mb-2 mb-md-0">
                <a href="{{ route('alquileres.create') }}" class="btn btn-primary">Crear Nuevo Alquiler</a>
            </div>
            <div class="col-md-6">
                <form action="{{ route('alquileres.index') }}" method="GET" class="d-flex">
                    <input type="text" name="search" class="form-control me-2"
                           placeholder="Buscar por cliente, usuario, fecha..." value="{{ $search ?? '' }}">
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
                            <th>Cliente</th>
                            <th>Usuario</th>
                            <th>Fecha Alquiler</th>
                            <th>Fecha Reserva</th>
                            <th>Fecha Devolución</th>
                            <th>Total Alquiler</th>
                            <th>Monto Adelantado</th>
                            <th>Tipo Alquiler</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse ($alquileres as $alquiler)
                            <tr>
                                <td>{{ $alquiler->id }}</td>
                                <td>{{ $alquiler->cliente->nombre }} {{ $alquiler->cliente->apellidoP }} {{ $alquiler->cliente->apellidoM }}
                                    ({{ $alquiler->cliente->ciCliente }})
                                </td>
                                <td>{{ $alquiler->idUser->name }}</td>
                                <td>{{ $alquiler->fechaAlquiler }}</td>
                                <td>{{ $alquiler->fechaReserva ?? 'N/A' }}</td>
                                <td>{{ $alquiler->fechaDevolucion ?? 'N/A' }}</td>
                                <td>{{ $alquiler->totalAlquiler ?? 'N/A' }}</td>
                                <td>{{ $alquiler->MontoAdelantado ?? 'N/A' }}</td>
                                <td>{{ $alquiler->TipoAlquiler ?? 'N/A' }}</td>
                                <td class="text-center">
                                    <div class="d-flex justify-content-center gap-2">
                                        <a href="{{ route('alquileres.show', $alquiler) }}"
                                           class="btn btn-info btn-sm">Ver</a>
                                        <a href="{{ route('alquileres.edit', $alquiler) }}"
                                           class="btn btn-warning btn-sm">Editar</a>
                                        <form action="{{ route('alquileres.destroy', $alquiler) }}" method="POST"
                                              onsubmit="return confirm('¿Estás seguro de eliminar?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="10" class="text-center text-muted">No hay alquileres registrados.</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer">
                <div class="d-flex justify-content-center">
                    {{ $alquileres->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
