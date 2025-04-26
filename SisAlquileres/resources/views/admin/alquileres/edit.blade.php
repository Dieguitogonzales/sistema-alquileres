@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4">Editar Alquiler</h1>
        <form action="{{ route('alquileres.update', $alquiler) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="idCliente" class="form-label">Cliente</label>
                <select class="form-select @error('idCliente') is-invalid @enderror" id="idCliente"
                        name="idCliente" required>
                    <option value="" disabled>Seleccione un cliente</option>
                    @foreach ($clientes as $cliente)
                        <option
                            value="{{ $cliente->id }}" {{ $alquiler->idCliente == $cliente->id ? 'selected' : '' }}>{{ $cliente->nombre }} {{ $cliente->apellidoP }} {{ $cliente->apellidoM }}
                            ({{ $cliente->ciCliente }})
                        </option>
                    @endforeach
                </select>
                @error('idCliente')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="idUser" class="form-label">Usuario</label>
                <select class="form-select @error('idUser') is-invalid @enderror" id="idUser"
                        name="idUser" required>
                    <option value="" disabled>Seleccione un usuario</option>
                    @foreach ($users as $user)
                        <option
                            value="{{ $user->id }}" {{ $alquiler->idUser == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                    @endforeach
                </select>
                @error('idUser')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="fechaAlquiler" class="form-label">Fecha de Alquiler</label>
                <input type="date" class="form-control @error('fechaAlquiler') is-invalid @enderror"
                       id="fechaAlquiler" name="fechaAlquiler"
                       value="{{ old('fechaAlquiler', $alquiler->fechaAlquiler) }}" required>
                @error('fechaAlquiler')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="fechaReserva" class="form-label">Fecha de Reserva</label>
                <input type="date" class="form-control @error('fechaReserva') is-invalid @enderror"
                       id="fechaReserva" name="fechaReserva"
                       value="{{ old('fechaReserva', $alquiler->fechaReserva) }}">
                @error('fechaReserva')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="fechaDevolucion" class="form-label">Fecha de Devolución</label>
                <input type="date" class="form-control @error('fechaDevolucion') is-invalid @enderror"
                       id="fechaDevolucion" name="fechaDevolucion"
                       value="{{ old('fechaDevolucion', $alquiler->fechaDevolucion) }}" required>
                @error('fechaDevolucion')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="totalAlquiler" class="form-label">Total Alquiler</label>
                <input type="number" step="0.01"
                       class="form-control @error('totalAlquiler') is-invalid @enderror" id="totalAlquiler"
                       name="totalAlquiler"
                       value="{{ old('totalAlquiler', $alquiler->totalAlquiler) }}">
                @error('totalAlquiler')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="MontoAdelantado" class="form-label">Monto Adelantado</label>
                <input type="number" step="0.01"
                       class="form-control @error('MontoAdelantado') is-invalid @enderror" id="MontoAdelantado"
                       name="MontoAdelantado"
                       value="{{ old('MontoAdelantado', $alquiler->MontoAdelantado) }}">
                @error('MontoAdelantado')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="TipoAlquiler" class="form-label">Tipo de Alquiler</label>
                <input type="text" class="form-control @error('TipoAlquiler') is-invalid @enderror"
                       id="TipoAlquiler" name="TipoAlquiler"
                       value="{{ old('TipoAlquiler', $alquiler->TipoAlquiler) }}">
                @error('TipoAlquiler')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Actualizar Alquiler</button>
            <a href="{{ route('alquileres.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
@endsection
