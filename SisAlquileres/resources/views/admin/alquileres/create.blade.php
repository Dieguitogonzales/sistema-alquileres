@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Crear Nuevo Alquiler</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.alquileres.store') }}" method="POST">
                        @csrf

                        {{-- Cliente --}}
                        <div class="form-group">
                            <label>Cliente</label>
                            <select name="idCliente" class="form-control" required>
                                @foreach($clientes as $cliente)
                                <option value="{{ $cliente->id }}">{{ $cliente->nombre }} {{ $cliente->apellidoP }}
                                    {{ $cliente->apellidoM }}</option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Usuario --}}
                        <div class="form-group">
                            <label>Usuario</label>
                            <select name="idUser" class="form-control" required>
                                @foreach($usuarios as $usuario)
                                <option value="{{ $usuario->id }}">{{ $usuario->name }} {{ $usuario->apellidoP }}
                                    {{ $usuario->apellidoM }}</option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Traje --}}
                        <div class="form-group">
                            <label>Traje</label>
                            <select name="idTraje" class="form-control" required>
                                @foreach($trajes as $traje)
                                <option value="{{ $traje->id }}">{{ $traje->nombre }} : Categoria: {{ $traje->talla }} :
                                    {{ $traje->categoria->nombre ?? 'Sin categoría' }}</option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Tipo de Alquiler --}}
                        <div class="form-group">
                            <label>Tipo de Alquiler</label>
                            <select name="TipoAlquiler" id="tipoAlquiler" class="form-control" required>
                                <option value="reserva">Reserva</option>
                                <option value="directo">Directo</option>
                            </select>
                        </div>

                        {{-- Fecha de Alquiler --}}
                        <div class="form-group">
                            <label>Fecha de Alquiler</label>
                            <input type="date" name="fechaAlquiler" class="form-control" required>
                        </div>

                        {{-- Fecha de Reserva (solo para reserva) --}}
                        <div class="form-group" id="fechaReservaGroup">
                            <label>Fecha de Reserva</label>
                            <input type="date" name="fechaReserva" class="form-control">
                        </div>

                        {{-- Fecha de Devolución --}}
                        <div class="form-group">
                            <label>Fecha de Devolución</label>
                            <input type="date" name="fechaDevolucion" class="form-control">
                        </div>

                        {{-- Monto Adelantado --}}
                        <div class="form-group" id="montoAdelantadoGroup">
                            <label>Monto Adelantado</label>
                            <input type="number" name="MontoAdelantado" class="form-control" step="0.01" value="0.00">
                        </div>

                        {{-- Cantidad --}}
                        <div class="form-group">
                            <label>Cantidad</label>
                            <input type="number" name="cantidad" class="form-control" min="1" value="1" required>
                        </div>

                        {{-- Total Alquiler --}}
                        <div class="form-group">
                            <label>Total Alquiler</label>
                            <input type="number" name="totalAlquiler" class="form-control" step="0.01" required>
                        </div>

                        {{-- Botones --}}
                        <button type="submit" class="btn btn-primary">Guardar</button>
                        <a href="{{ route('admin.alquileres.index') }}" class="btn btn-secondary">Cancelar</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Mostrar u ocultar campos según el tipo de alquiler --}}
<script>
document.addEventListener('DOMContentLoaded', function() {
    const tipoAlquiler = document.getElementById('tipoAlquiler');
    const montoAdelantadoGroup = document.getElementById('montoAdelantadoGroup');
    const fechaReservaGroup = document.getElementById('fechaReservaGroup');

    function toggleCampos() {
        if (tipoAlquiler.value === 'reserva') {
            montoAdelantadoGroup.style.display = 'block';
            fechaReservaGroup.style.display = 'block';
        } else {
            montoAdelantadoGroup.style.display = 'none';
            fechaReservaGroup.style.display = 'none';
        }
    }

    toggleCampos();
    tipoAlquiler.addEventListener('change', toggleCampos);
});
</script>
@endsection