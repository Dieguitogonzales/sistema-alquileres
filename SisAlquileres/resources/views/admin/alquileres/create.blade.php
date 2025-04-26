@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4">Crear Nuevo Alquiler</h1>
        <form action="{{ route('alquileres.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="idCliente" class="form-label">Cliente</label>
                <select class="form-select @error('idCliente') is-invalid @enderror" id="idCliente"
                        name="idCliente" required>
                    <option value="" disabled selected>Seleccione un cliente</option>
                    @foreach ($clientes as $cliente)
                        <option value="{{ $cliente->id }}">{{ $cliente->nombre }} {{ $cliente->apellidoP }} {{ $cliente->apellidoM }}
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
                    <option value="" disabled selected>Seleccione un usuario</option>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
                @error('idUser')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="fechaAlquiler" class="form-label">Fecha de Alquiler</label>
                <input type="date" class="form-control @error('fechaAlquiler') is-invalid @enderror"
                       id="fechaAlquiler" name="fechaAlquiler" value="{{ old('fechaAlquiler') }}" required>
                @error('fechaAlquiler')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="fechaReserva" class="form-label">Fecha de Reserva</label>
                <input type="date" class="form-control @error('fechaReserva') is-invalid @enderror"
                       id="fechaReserva" name="fechaReserva" value="{{ old('fechaReserva') }}">
                @error('fechaReserva')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="fechaDevolucion" class="form-label">Fecha de Devolución</label>
                <input type="date" class="form-control @error('fechaDevolucion') is-invalid @enderror"
                       id="fechaDevolucion" name="fechaDevolucion" value="{{ old('fechaDevolucion') }}" required>
                @error('fechaDevolucion')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="totalAlquiler" class="form-label">Total Alquiler</label>
                <input type="number" step="0.01"
                       class="form-control @error('totalAlquiler') is-invalid @enderror" id="totalAlquiler"
                       name="totalAlquiler" value="{{ old('totalAlquiler') }}">
                @error('totalAlquiler')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="MontoAdelantado" class="form-label">Monto Adelantado</label>
                <input type="number" step="0.01"
                       class="form-control @error('MontoAdelantado') is-invalid @enderror" id="MontoAdelantado"
                       name="MontoAdelantado" value="{{ old('MontoAdelantado') }}">
                @error('MontoAdelantado')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="TipoAlquiler" class="form-label">Tipo de Alquiler</label>
                <input type="text" class="form-control @error('TipoAlquiler') is-invalid @enderror"
                       id="TipoAlquiler" name="TipoAlquiler" value="{{ old('TipoAlquiler') }}">
                @error('TipoAlquiler')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Guardar Alquiler</button>
            <a href="{{ route('alquileres.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
@endsection
