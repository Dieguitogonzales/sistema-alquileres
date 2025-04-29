<!-- resources/views/admin/dashboard.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Bienvenido, {{ Auth::user()->name }}!</h1>
        <div class="row">
            <div class="col-md-3">
                <a href="{{ route('admin.clientes.index') }}" class="btn btn-primary btn-block">Clientes</a>
            </div>
            <div class="col-md-3">
                <a href="{{ route('admin.categorias.index') }}" class="btn btn-primary btn-block">Categorías</a>
            </div>
            <div class="col-md-3">
                <a href="{{ route('admin.alquileres.index') }}" class="btn btn-primary btn-block">Alquileres</a>
            </div>
            <div class="col-md-3">
                <a href="{{ route('admin.alquiler-detalles.index') }}" class="btn btn-primary btn-block">Detalles Alquiler</a>
            </div>
            <div class="col-md-3">
                <a href="{{ route('admin.trajes.index') }}" class="btn btn-primary btn-block">Trajes</a>
            </div>
        </div>
    </div>
@endsection
