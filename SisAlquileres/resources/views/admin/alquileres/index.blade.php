@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Alquileres</h4>
                        <a href="{{ route('admin.alquileres.create') }}" class="btn btn-primary float-right">Nuevo Alquiler</a>
                    </div>
                    <div class="card-body">
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <form action="{{ route('admin.alquileres.index') }}" method="GET" class="mb-3">
                            <div class="input-group">
                                <input type="text" class="form-control" name="buscado" placeholder="Buscar..." value="{{ $buscado ?? '' }}">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-outline-secondary">Buscar</button>
                                </div>
                            </div>
                        </form>

                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Cliente</th>
                                    <th>Usuario</th>
                                    <th>Tipo</th>
                                    <th>Fecha Alquiler</th>
                                    <th>Monto Adelantado</th>
                                    <th>Fecha Devolución</th>
                                    <th>Total</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($alquileres as $alquiler)
                                    <tr>
                                        <td>{{ $alquiler->cliente->nombre }} {{ $alquiler->cliente->apellidoP }}</td>
                                        <td>{{ $alquiler->usuario->name }}</td>
                                        <td>{{ $alquiler->TipoAlquiler }}</td>
                                        <td>{{ $alquiler->fechaAlquiler }}</td>
                                        <td>{{ $alquiler->MontoAdelantado }}</td>
                                        <td>{{ $alquiler->fechaDevolucion }}</td>
                                        <td>{{ number_format($alquiler->totalAlquiler, 2) }}</td>
                                        <td>
                                            <a href="{{ route('admin.alquileres.show', $alquiler->id) }}" class="btn btn-sm btn-info">Ver</a>
                                            <a href="{{ route('admin.alquileres.edit', $alquiler->id) }}" class="btn btn-sm btn-warning">Editar</a>
                                            <form action="{{ route('admin.alquileres.destroy', $alquiler->id) }}" method="POST" style="display: inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr><td colspan="8">No se encontraron alquileres.</td></tr>
                                @endforelse
                            </tbody>
                        </table>

                        {{ $alquileres->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection