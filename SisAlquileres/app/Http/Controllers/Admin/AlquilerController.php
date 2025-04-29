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
    public function index(Request $request)
    {
        $query = Alquiler::with('cliente', 'usuario');

        $buscado = $request->input('buscado');

        if ($buscado) {
            $query->whereHas('cliente', function ($q) use ($buscado) {
                $q->where('nombre', 'like', '%' . $buscado . '%')
                  ->orWhere('apellidoP', 'like', '%' . $buscado . '%');
            })
            ->orWhereHas('usuario', function ($q) use ($buscado) {
                $q->where('name', 'like', '%' . $buscado . '%');
            })
            ->orWhere('TipoAlquiler', 'like', '%' . $buscado . '%')
            ->orWhere('fechaAlquiler', 'like', '%' . $buscado . '%')
            ->orWhere('MontoAdelantado', 'like', '%' . $buscado . '%')
            ->orWhere('fechaDevolucion', 'like', '%' . $buscado . '%')
            ->orWhere('totalAlquiler', 'like', '%' . $buscado . '%');
        }

        $alquileres = $query->paginate(10); // Muestra 10 alquileres por página
        return view('admin.alquileres.index', compact('alquileres', 'buscado'));
    }

    public function create()
    {
        $clientes = Cliente::all();
        $usuarios = User::all();
        return view('admin.alquileres.create', compact('clientes', 'usuarios'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'idCliente' => 'required|exists:clientes,id',
            'idUser' => 'required|exists:users,id',
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
        Alquiler::find($id)->delete();
        return redirect()->route('admin.alquileres.index')
            ->with('success', 'Alquiler eliminado exitosamente');
    }
}