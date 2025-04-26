@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4">Detalles del Alquiler</h1>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Alquiler ID: {{ $alquiler->id }}</h5>
                <p class="card-text">Cliente: {{ $alquiler->cliente->nombre }} {{ $alquiler->cliente->apellidoP }} {{ $alquiler->cliente->apellidoM }}
                    ({{ $alquiler->cliente->ciCliente }})
                </p>
                <p class="card-text">Usuario: {{ $alquiler->user->name }}</p>
                <p class="card-text">Fecha de Alquiler: {{ $alquiler->fechaAlquiler }}</p>
                <p class="card-text">Fecha de Reserva: {{ $alquiler->fechaReserva ?? 'N/A' }}</p>
                <p class="card-text">Fecha de Devolución: {{ $alquiler->fechaDevolucion ?? 'N/A' }}</p>
                <p class="card-text">Total Alquiler: {{ $alquiler->totalAlquiler ?? 'N/A' }}</p>
                <p class="card-text">Monto Adelantado: {{ $alquiler->MontoAdelantado ?? 'N/A' }}</p>
                <p class="card-text">Tipo Alquiler: {{ $alquiler->TipoAlquiler ?? 'N/A' }}</p>

                <h6 class="mt-4">Trajes Alquilados:</h6>
                @if ($alquiler->alquilerDetalles->count() > 0)
                    <ul>
                        @foreach ($alquiler->alquilerDetalles as $detalle)
                            <li>
                                Traje: {{ $detalle->traje->id }} - {{ $detalle->traje->categoria->nombre }}
                                Cantidad: {{ $detalle->cantidad }}
                                Subtotal: {{ $detalle->subtotal }}
                            </li>
                        @endforeach
                    </ul>
                    <p class="card-text">Total: {{ $alquiler->alquilerDetalles->sum('subtotal') }}</p>
                @else
                    <p class="card-text">No se han alquilado trajes en este alquiler.</p>
                @endif

                <a href="{{ route('alquileres.edit', $alquiler) }}" class="btn btn-warning">Editar</a>
                <a href="{{ route('alquileres.index') }}" class="btn btn-secondary">Volver al Listado</a>
            </div>
        </div>
    </div>
@endsection