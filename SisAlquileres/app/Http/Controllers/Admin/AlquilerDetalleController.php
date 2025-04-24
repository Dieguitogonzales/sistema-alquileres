<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AlquilerDetalle;
use App\Models\Alquiler;
use App\Models\Traje;
use App\Models\User; // Asegúrate de que este sea tu modelo de Usuario
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class AlquilerDetalleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $detalles = AlquilerDetalle::all(); // O puedes paginar: AlquilerDetalle::paginate(10);
        return view('admin.alquiler-detalles.index', compact('detalles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $alquileres = Alquileres::all();
        $trajes = Traje::all();
        $usuarios = User::all(); // Asegúrate de usar el modelo correcto para tus usuarios
        return view('admin.alquiler-detalles.create', compact('alquileres', 'trajes', 'usuarios'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'idAlquiler' => 'required|exists:alquiler,id', // Ajusta 'alquiler' y 'id' si es necesario
            'idTraje' => 'required|exists:traje,id', // Ajusta 'traje' y 'id' si es necesario
            'idUsuario' => 'required|exists:users,id', // Ajusta 'users' y 'id' si es necesario
            'precioAlquiler' => 'required|numeric|min:0',
            'cantidad' => 'required|integer|min:1',
        ]);

        AlquilerDetalle::create($request->all());

        return redirect()->route('admin.alquiler-detalles.index')->with('success', 'Detalle de alquiler creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(AlquilerDetalle $alquilerDetalle): View
    {
        $alquilerDetalle->load(['alquiler', 'traje', 'usuario']); // Carga las relaciones para mostrar
        return view('admin.alquiler-detalles.show', compact('alquilerDetalle'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AlquilerDetalle $alquilerDetalle): View
    {
        $alquileres = Alquilers::all();
        $trajes = Traje::all();
        $usuarios = User::all(); // Asegúrate de usar el modelo correcto para tus usuarios
        return view('admin.alquiler-detalles.edit', compact('alquilerDetalle', 'alquileres', 'trajes', 'usuarios'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AlquilerDetalle $alquilerDetalle): RedirectResponse
    {
        $request->validate([
            'idAlquiler' => 'required|exists:alquiler,id', // Ajusta 'alquiler' y 'id' si es necesario
            'idTraje' => 'required|exists:traje,id', // Ajusta 'traje' y 'id' si es necesario
            'idUsuario' => 'required|exists:users,id', // Ajusta 'users' y 'id' si es necesario
            'precioAlquiler' => 'required|numeric|min:0',
            'cantidad' => 'required|integer|min:1',
        ]);

        $alquilerDetalle->update($request->all());

        return redirect()->route('admin.alquiler-detalles.index')->with('success', 'Detalle de alquiler actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AlquilerDetalle $alquilerDetalle): RedirectResponse
    {
        $alquilerDetalle->delete();
        return redirect()->route('admin.alquiler-detalles.index')->with('success', 'Detalle de alquiler eliminado exitosamente.');
    }
}