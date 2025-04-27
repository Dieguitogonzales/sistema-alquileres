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
    public function index(Request $request): View
    {
        // Número de elementos por página
        $perPage = 10;
        // Lógica de búsqueda
        $search = $request->input('search');

        $trajes = Traje::query();
         if ($search) {
            $trajes->where('cantidad', 'LIKE', "%$search%")
                ->orWhereHas('categoria', function ($query) use ($search) {
                    $query->where('nombre', 'LIKE', "%$search%");
                });
        }

        // Obtener todos los trajes con paginación
        $trajes = $trajes->paginate($perPage);
        // Pasar los trajes a la vista
        return view('admin.trajes.index', compact('trajes','search'));
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
        $request->validate([
            'idCategoria' => 'required|exists:categorias,id',
            'cantidad' => 'required|integer|min:0',
        ]);

        // Crear un nuevo traje
        Traje::create($request->all());

        // Redirigir a la página de índice con un mensaje de éxito
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
        // Validar los datos del formulario
        $request->validate([
            'idCategoria' => 'required|exists:categorias,id',
            'cantidad' => 'required|integer|min:0',
        ]);

        // Actualizar el traje
        $traje->update([
            'idCategoria' => $request->input('idCategoria'),
            'cantidad' => $request->input('cantidad'),
        ]);

        // Redirigir a la página de índice con un mensaje de éxito
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
