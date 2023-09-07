<?php

namespace App\Http\Controllers;

use App\Models\DetalleVenta;
use Illuminate\Http\Request;

class DetalleVentaController extends Controller
{
    public function index()
    {
        $detallesVenta = DetalleVenta::all();
        return response()->json(['data' => $detallesVenta]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'precio_final' => 'required|numeric',
            'cantidad' => 'required|integer',
            'descuento' => 'numeric',
            'observaciones' => 'string',
            'id_productos' => 'required|exists:productos,id',
        ]);

        $detalleVenta = DetalleVenta::create($request->all());

        return response()->json(['message' => 'Detalle de venta creado con éxito', 'data' => $detalleVenta], 201);
    }

    public function show($id)
    {
        $detalleVenta = DetalleVenta::find($id);

        if (!$detalleVenta) {
            return response()->json(['message' => 'Detalle de venta no encontrado'], 404);
        }

        return response()->json(['data' => $detalleVenta]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'precio_final' => 'numeric',
            'cantidad' => 'integer',
            'descuento' => 'numeric',
            'observaciones' => 'string',
            'id_productos' => 'exists:productos,id',
        ]);

        $detalleVenta = DetalleVenta::find($id);

        if (!$detalleVenta) {
            return response()->json(['message' => 'Detalle de venta no encontrado'], 404);
        }

        $detalleVenta->update($request->all());

        return response()->json(['message' => 'Detalle de venta actualizado con éxito', 'data' => $detalleVenta]);
    }

    public function destroy($id)
    {
        $detalleVenta = DetalleVenta::find($id);

        if (!$detalleVenta) {
            return response()->json(['message' => 'Detalle de venta no encontrado'], 404);
        }

        $detalleVenta->delete();

        return response()->json(['message' => 'Detalle de venta eliminado con éxito']);
    }
}
