<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cliente;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $perPage = 10;
        // Lógica de búsqueda
        $search = $request->input('search');
        $clientes = Cliente::query();
        if ($search) {
            $clientes->where('nombre', 'LIKE', "%$search%")
                ->orWhere('apellidoP', 'LIKE', "%$search%")
                ->orWhere('apellidoM', 'LIKE', "%$search%")
                ->orWhere('telefono', 'LIKE', "%$search%")
                ->orWhere('ciCliente', 'LIKE', "%$search%");
        }
        // Paginar los resultados
        $clientes = $clientes->paginate($perPage);

        //$clientes = Cliente::all();
        return view('admin.clientes.index', compact('clientes', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.clientes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellidoP' => 'nullable|string|max:255',
            'apellidoM' => 'nullable|string|max:255',
            'telefono' => 'nullable|string|max:20',
            'ciCliente' => 'required|string|unique:clientes|max:20',
        ]);

        Cliente::create([
            'nombre' => $request->input('nombre'),
            'apellidoP' => $request->input('apellidoP'),
            'apellidoM' => $request->input('apellidoM'),
            'telefono' => $request->input('telefono'),
            'ciCliente' => $request->input('ciCliente'),
        ]);

        return redirect()->route('clientes.index')->with('success', 'Cliente creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cliente $cliente): View
    {
        return view('admin.clientes.show', compact('cliente'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cliente $cliente): View
    {
        return view('admin.clientes.edit', compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cliente $cliente): RedirectResponse
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellidoP' => 'nullable|string|max:255',
            'apellidoM' => 'nullable|string|max:255',
            'telefono' => 'nullable|string|max:20',
            'ciCliente' => 'required|string|unique:clientes,ciCliente,' . $cliente->id . '|max:20',
        ]);

        $cliente->update([
            'nombre' => $request->input('nombre'),
            'apellidoP' => $request->input('apellidoP'),
            'apellidoM' => $request->input('apellidoM'),
            'telefono' => $request->input('telefono'),
            'ciCliente' => $request->input('ciCliente'),
        ]);

        return redirect()->route('clientes.index')->with('success', 'Cliente actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cliente $cliente): RedirectResponse
    {
        $cliente->delete();
        return redirect()->route('clientes.index')->with('success', 'Cliente eliminado exitosamente.');
    }
}
