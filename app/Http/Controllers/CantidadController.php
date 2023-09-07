<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cantidad;

class CantidadController extends Controller
{
    public function index()
    {
        $cantidades = Cantidad::all();
        return response()->json(['data' => $cantidades]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'cantidad' => 'required|integer',
            'id_productos' => 'required|exists:productos,id',
        ]);

        $cantidad = Cantidad::create([
            'cantidad' => $request->cantidad,
            'id_productos' => $request->id_productos,
        ]);

        return response()->json(['message' => 'Cantidad creada con éxito', 'data' => $cantidad], 201);
    }

    public function show($id)
    {
        $cantidad = Cantidad::find($id);

        if (!$cantidad) {
            return response()->json(['message' => 'Cantidad no encontrada'], 404);
        }

        return response()->json(['data' => $cantidad]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'cantidad' => 'required|integer',
            'id_productos' => 'required|exists:productos,id',
        ]);

        $cantidad = Cantidad::find($id);

        if (!$cantidad) {
            return response()->json(['message' => 'Cantidad no encontrada'], 404);
        }

        $cantidad->cantidad = $request->cantidad;
        $cantidad->id_productos = $request->id_productos;
        $cantidad->save();

        return response()->json(['message' => 'Cantidad actualizada con éxito', 'data' => $cantidad]);
    }

    public function destroy($id)
    {
        $cantidad = Cantidad::find($id);

        if (!$cantidad) {
            return response()->json(['message' => 'Cantidad no encontrada'], 404);
        }

        $cantidad->delete();

        return response()->json(['message' => 'Cantidad eliminada con éxito']);
    }
}
