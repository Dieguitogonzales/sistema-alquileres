@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Detalles del Alquiler</h4>
                    <a href="{{ route('admin.alquileres.index') }}" class="btn btn-secondary float-right">Volver</a>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <p><strong>Cliente:</strong> {{ $alquiler->cliente->nombre }}
                                {{ $alquiler->cliente->apellidoP }} {{ $alquiler->cliente->apellidoM }}</p>
                            <p><strong>Usuario:</strong> {{ $alquiler->usuario->name }}
                                {{ $alquiler->usuario->apellidoP }} {{ $alquiler->usuario->apellidoM }}</p>
                            <p><strong>Tipo de Alquiler:</strong> {{ $alquiler->TipoAlquiler }}</p>
                            <p><strong>Fecha de Alquiler:</strong> {{ $alquiler->fechaAlquiler }}</p>
                            <p><strong>Fecha de Devolución:</strong> {{ $alquiler->fechaDevolucion }}</p>
                            <p><strong>Monto Adelantado:</strong> {{ number_format($alquiler->MontoAdelantado, 2) }}</p>
                            <p><strong>Total Alquiler:</strong> {{ number_format($alquiler->totalAlquiler, 2) }}</p>
                            <p><strong>Cantidad:</strong> {{ $alquiler->cantidad }}</p>
                            {{-- Campo cantidad agregado --}}
                            <p><strong>Total:</strong>
                                {{ number_format($alquiler->cantidad * $alquiler->totalAlquiler, 2) }}</p>
                            {{-- Campo total calculado --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection