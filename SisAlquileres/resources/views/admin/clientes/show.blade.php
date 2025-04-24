@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Detalles del Cliente</h1>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $cliente->nombre }}</h5>
                <p class="card-text">Apellido Paterno: {{ $cliente->apellidoP ?? 'N/A' }}</p>
                <p class="card-text">Apellido Materno: {{ $cliente->apellidoM ?? 'N/A' }}</p>
                <p class="card-text">Teléfono: {{ $cliente->telefono ?? 'N/A' }}</p>
                <p class="card-text">CI Cliente: {{ $cliente->ciCliente }}</p>
                <a href="{{ route('clientes.edit', $cliente) }}" class="btn btn-warning">Editar</a>
                <a href="{{ route('clientes.index') }}" class="btn btn-secondary">Volver</a>
            </div>
        </div>
    </div>
@endsection