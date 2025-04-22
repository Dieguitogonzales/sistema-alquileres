<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Traje; // Importa el modelo Traje
use App\Models\Categoria; // Importa el modelo Categoria
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;


class TrajeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $trajes = Traje::with('categoria')->get(); // Eager load la categoría del traje
        return view('admin.trajes.index', compact('trajes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $categorias = Categoria::all(); // Obtiene todas las categorías para el formulario de selección
        return view('admin.trajes.create', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        // Valida los datos del formulario
        $request->validate([
            'idCategoria' => 'required|exists:categoria,idCategoria', // Verifica que la categoría exista
            'cantidad' => 'required|integer|min:0',
        ]);

        // Crea un nuevo traje en la base de datos
        Traje::create($request->all());

        // Redirige a la página de índice con un mensaje de éxito
        return redirect()->route('admin.trajes.index')->with('success', 'Traje creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Traje $traje): View
    {
        return view('admin.trajes.show', compact('traje'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Traje $traje): View
    {
        $categorias = Categoria::all(); // Obtiene todas las categorías para el formulario de selección
        return view('admin.trajes.edit', compact('traje', 'categorias'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Traje $traje): RedirectResponse
    {
        // Valida los datos del formulario
        $request->validate([
            'idCategoria' => 'required|exists:categoria,idCategoria', // Verifica que la categoría exista
            'cantidad' => 'required|integer|min:0',
        ]);

        // Actualiza el traje en la base de datos
        $traje->update($request->all());

        // Redirige a la página de índice con un mensaje de éxito
        return redirect()->route('admin.trajes.index')->with('success', 'Traje actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Traje $traje): RedirectResponse
    {
        $traje->delete();
        return redirect()->route('admin.trajes.index')->with('success', 'Traje eliminado exitosamente.');
    }
}
