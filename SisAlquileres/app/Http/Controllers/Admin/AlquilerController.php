<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Alquiler;
use App\Models\Cliente;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class AlquilerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $perPage = 10;
        $search = $request->input('search');
        $alquileres = Alquiler::query()->with(['cliente', 'user']);

        if ($search) {
            $alquileres->where('fechaAlquiler', 'LIKE', "%$search%")
                ->orWhere('fechaReserva', 'LIKE', "%$search%")
                ->orWhere('fechaDevolucion', 'LIKE', "%$search%")
                ->orWhere('TipoAlquiler', 'LIKE', "%$search%")
                ->orWhereHas('cliente', function ($query) use ($search) {
                    $query->where('nombre', 'LIKE', "%$search%")
                        ->orWhere('apellidoP', 'LIKE', "%$search%")
                        ->orWhere('apellidoM', 'LIKE', "%$search%")
                        ->orWhere('ciCliente', 'LIKE', "%$search%");
                })
                ->orWhereHas('user', function ($query) use ($search) {
                    $query->where('name', 'LIKE', "%$search%");
                });
        }

        $alquileres = $alquileres->paginate($perPage);

        return view('admin.alquileres.index', compact('alquileres', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $clientes = Cliente::all();
        $users = User::all();
        return view('admin.alquileres.create', compact('clientes', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'idCliente' => 'required|exists:clientes,id',
            'idUser' => 'required|exists:users,id',
            'fechaAlquiler' => 'required|date',
            'fechaReserva' => 'nullable|date',
            'fechaDevolucion' => 'nullable|date|after:fechaAlquiler',
            'totalAlquiler' => 'nullable|numeric|min:0',
            'MontoAdelantado' => 'nullable|numeric|min:0',
            'TipoAlquiler' => 'nullable|string|max:255',
        ]);

        Alquiler::create([
            'idCliente' => $request->input('idCliente'), // Explícito, mejor para evitar errores
            'idUser' => $request->input('idUser'),       // Asegúrate de que coincida con la BD
            'fechaAlquiler' => $request->input('fechaAlquiler'),
            'fechaReserva' => $request->input('fechaReserva'),
            'fechaDevolucion' => $request->input('fechaDevolucion'),
            'totalAlquiler' => $request->input('totalAlquiler'),
            'MontoAdelantado' => $request->input('MontoAdelantado'),
            'TipoAlquiler' => $request->input('TipoAlquiler'),
        ]);

        return redirect()->route('alquileres.index')->with('success', 'Alquiler creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Alquiler $alquiler): View // Corregido: inyectar la instancia de Alquiler
    {
        $alquiler->load('cliente', 'user', 'alquilerDetalles.traje'); // Corregido: usar $alquiler
        return view('admin.alquileres.show', compact('alquiler')); // Corregido: usar $alquiler
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Alquiler $alquiler): View
    {
        $clientes = Cliente::all();
        $users = User::all();
        return view('admin.alquileres.edit', compact('alquiler', 'clientes', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Alquiler $alquiler): RedirectResponse
    {
        $request->validate([
            'idCliente' => 'required|exists:clientes,id',
            'idUser' => 'required|exists:users,id',
            'fechaAlquiler' => 'required|date',
            'fechaReserva' => 'nullable|date',
            'fechaDevolucion' => 'nullable|date|after:fechaAlquiler',
            'totalAlquiler' => 'nullable|numeric|min:0',
            'MontoAdelantado' => 'nullable|numeric|min:0',
            'TipoAlquiler' => 'nullable|string|max:255',
        ]);

        $alquiler->update($request->all());

        return redirect()->route('alquileres.index')->with('success', 'Alquiler actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Alquiler $alquiler): RedirectResponse
    {
        $alquiler->delete();

        return redirect()->route('alquileres.index')->with('success', 'Alquiler eliminado exitosamente.');
    }
}