<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use Illuminate\Http\Request;

class CompraController extends Controller
{
    public function index()
    {
        // Obtener todas las compras
        $compras = Compra::all();

        return response()->json(['data' => $compras]);
    }

    public function store(Request $request)
    {
        // Validar los datos de entrada (ajusta las reglas según tus necesidades)
        $request->validate([
            'id_proveedores' => 'required|integer',
            'id_productos' => 'required|integer',
            'cantidad' => 'required|integer',
            'estado' => 'required|string',
            'descuento' => 'nullable|numeric',
            'envio' => 'nullable|numeric',
            'total_precio' => 'required|numeric',
        ]);

        // Crear una nueva compra
        $compra = Compra::create($request->all());

        return response()->json(['message' => 'Compra creada', 'data' => $compra], 201);
    }

    public function show($id)
    {
        // Buscar una compra por su ID
        $compra = Compra::find($id);

        if (!$compra) {
            return response()->json(['message' => 'Compra no encontrada'], 404);
        }

        return response()->json(['data' => $compra]);
    }

    public function update(Request $request, $id)
    {
        // Buscar una compra por su ID
        $compra = Compra::find($id);

        if (!$compra) {
            return response()->json(['message' => 'Compra no encontrada'], 404);
        }

        // Validar y actualizar los datos de la compra
        $request->validate([
            'id_proveedores' => 'required|integer',
            'id_productos' => 'required|integer',
            'cantidad' => 'required|integer',
            'estado' => 'required|string',
            'descuento' => 'nullable|numeric',
            'envio' => 'nullable|numeric',
            'total_precio' => 'required|numeric',
        ]);

        $compra->update($request->all());

        return response()->json(['message' => 'Compra actualizada', 'data' => $compra]);
    }

    public function destroy($id)
    {
        // Buscar una compra por su ID
        $compra = Compra::find($id);

        if (!$compra) {
            return response()->json(['message' => 'Compra no encontrada'], 404);
        }

        $compra->delete();

        return response()->json(['message' => 'Compra eliminada']);
    }
}
