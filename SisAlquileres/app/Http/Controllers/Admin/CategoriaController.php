<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categoria; // Importa el modelo Categoria
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $categorias = Categoria::all(); // Obtiene todas las categorías de la base de datos
        return view('admin.categorias.index', compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.categorias.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        // Valida los datos del formulario
        $request->validate([
            'nombre' => 'required|string|max:255',
            'precio' => 'required|numeric|min:0',
        ]);

        // Crea una nueva categoría en la base de datos
        Categoria::create($request->all());

        // Redirige a la página de índice con un mensaje de éxito
        return redirect()->route('admin.categorias.index')->with('success', 'Categoría creada exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Categoria $categoria): View
    {
        return view('admin.categorias.show', compact('categoria'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Categoria $categoria): View
    {
        return view('admin.categorias.edit', compact('categoria'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Categoria $categoria): RedirectResponse
    {
        // Valida los datos del formulario
        $request->validate([
            'nombre' => 'required|string|max:255',
            'precio' => 'required|numeric|min:0',
        ]);

        // Actualiza la categoría en la base de datos
        $categoria->update($request->all());

        // Redirige a la página de índice con un mensaje de éxito
        return redirect()->route('admin.categorias.index')->with('success', 'Categoría actualizada exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categoria $categoria): RedirectResponse
    {
        $categoria->delete();
        return redirect()->route('admin.categorias.index')->with('success', 'Categoría eliminada exitosamente.');
    }
}