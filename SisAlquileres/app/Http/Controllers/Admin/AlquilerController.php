<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Alquiler;
use App\Models\Cliente;
use App\Models\Traje;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class AlquilerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    $query = Alquiler::with('cliente', 'usuario')->where('estado', 'activo');

    $search = $request->input('buscado');

    if ($search) {
        $alquiler->where(function ($query) use ($search) {
            $query->where('cantidad', 'LIKE', "%$search%")
                  ->orWhereHas('categoria', function ($q) use ($search) {
                      $q->where('nombre', 'LIKE', "%$search%");
                  });
        });
    }


    $alquileres = $query->paginate(10);
    return view('admin.alquileres.index', compact('alquileres', 'search'));
}


    public function create()
    {
        $clientes = Cliente::all();
        $usuarios = User::all();
        $trajes = Traje::all();

        return view('admin.alquileres.create', compact('clientes', 'usuarios','trajes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'idCliente' => 'required|exists:clientes,id',
            'idUser' => 'required|exists:users,id',
            //'idTraje' => 'required|exists:trajes,id',
            'fechaAlquiler' => 'required|date',
            'TipoAlquiler' => 'required|in:reserva,directo'
        ]);

        Alquiler::create($request->all());
        return redirect()->route('admin.alquileres.index')
            ->with('success', 'Alquiler creado exitosamente');
    }

    public function show($id)
    {
        $alquiler = Alquiler::with('cliente', 'usuario')->find($id);
        return view('admin.alquileres.show', compact('alquiler'));
    }

    public function edit($id)
    {
        $alquiler = Alquiler::find($id);
        $clientes = Cliente::all();
        $usuarios = User::all();
        return view('admin.alquileres.edit', compact('alquiler', 'clientes', 'usuarios'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'idCliente' => 'required|exists:clientes,id',
            'idUser' => 'required|exists:users,id',
            'fechaAlquiler' => 'required|date',
            'TipoAlquiler' => 'required|in:reserva,directo'
        ]);

        $alquiler = Alquiler::find($id);
        $alquiler->update($request->all());
        return redirect()->route('admin.alquileres.index')
            ->with('success', 'Alquiler actualizado exitosamente');
    }

    public function destroy($id)
{
    $alquiler = Alquiler::find($id); // ESTA LÍNEA ES FUNDAMENTAL

    if (!$alquiler) {
        return redirect()->route('admin.alquileres.index')->with('error', 'Alquiler no encontrado.');
    }

    $alquiler->estado = 'inactivo';
    $alquiler->save();

    return redirect()->route('admin.alquileres.index')->with('success', 'Alquiler marcado como inactivo correctamente.');
}

}