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
                            <div class="form-group">
                                <label>Cliente</label>
                                <select name="idCliente" class="form-control" required>
                                    @foreach($clientes as $cliente)
                                        <option value="{{ $cliente->id }}">{{ $cliente->nombre }} {{ $cliente->apellidoP }} {{ $cliente->apellidoM }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Usuario</label>
                                <select name="idUser" class="form-control" required>
                                    @foreach($usuarios as $usuario)
                                        <option value="{{ $usuario->id }}">{{ $usuario->name }} {{ $usuario->apellidoP }} {{ $usuario->apellidoM }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Tipo de Alquiler</label>
                                <select name="TipoAlquiler" class="form-control" required>
                                    <option value="reserva">Reserva</option>
                                    <option value="directo">Directo</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Fecha de Alquiler</label>
                                <input type="date" name="fechaAlquiler" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label>Fecha de Devolución</label>
                                <input type="date" name="fechaDevolucion" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Monto Adelantado</label>
                                <input type="number" name="MontoAdelantado" class="form-control" step="0.01" value="0.00">
                            </div>

                            <div class="form-group">
                                <label>Total Alquiler</label>
                                <input type="number" name="totalAlquiler" class="form-control" step="0.01" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Guardar</button>
                            <a href="{{ route('admin.alquileres.index') }}" class="btn btn-secondary">Cancelar</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection