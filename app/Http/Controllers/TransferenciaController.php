<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transferencia;

class TransferenciaController extends Controller
{
    public function index()
    {
        $transferencias = Transferencia::all();
        return response()->json(['data' => $transferencias]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'producto_id' => 'required|exists:productos,id',
            'almacen_id' => 'required|exists:almacenes,id',
            'ubicacion_comercial_id' => 'required|exists:ubicaciones_comerciales,id',
            'cantidad' => 'required|integer|min:1',
            'empleado_id' => 'required|exists:empleados,id',
            'estado' => 'required|string',
        ]);

        $transferencia = Transferencia::create($request->all());

        return response()->json(['message' => 'Transferencia registrada con éxito', 'data' => $transferencia], 201);
    }

    public function show($id)
    {
        $transferencia = Transferencia::findOrFail($id);
        return response()->json(['data' => $transferencia]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'producto_id' => 'exists:productos,id',
            'almacen_id' => 'exists:almacenes,id',
            'ubicacion_comercial_id' => 'exists:ubicaciones_comerciales,id',
            'cantidad' => 'integer|min:1',
            'empleado_id' => 'exists:empleados,id',
            'estado' => 'string',
        ]);

        $transferencia = Transferencia::findOrFail($id);
        $transferencia->update($request->all());

        return response()->json(['message' => 'Transferencia actualizada con éxito', 'data' => $transferencia]);
    }

    public function destroy($id)
    {
        $transferencia = Transferencia::findOrFail($id);
        $transferencia->delete();

        return response()->json(['message' => 'Transferencia eliminada con éxito']);
    }
}
