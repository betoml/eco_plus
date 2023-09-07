<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AlmacenCantidad;

class AlmacenCantidadController extends Controller
{
    public function index()
    {
        $almacenCantidades = AlmacenCantidad::all();

        return response()->json([
            'data' => $almacenCantidades,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_productos' => 'required|exists:productos,id',
            'id_almacenes' => 'required|exists:almacenes,id',
            'cantidad' => 'required|integer',
        ]);

        $almacenCantidad = AlmacenCantidad::create($request->all());

        return response()->json([
            'message' => 'Registro creado exitosamente',
            'data' => $almacenCantidad,
        ]);
    }

    public function show($id)
    {
        $almacenCantidad = AlmacenCantidad::find($id);

        if (!$almacenCantidad) {
            return response()->json([
                'message' => 'Registro no encontrado',
            ], 404);
        }

        return response()->json([
            'data' => $almacenCantidad,
        ]);
    }

    public function update(Request $request, $id)
    {
        $almacenCantidad = AlmacenCantidad::find($id);

        if (!$almacenCantidad) {
            return response()->json([
                'message' => 'Registro no encontrado',
            ], 404);
        }

        $request->validate([
            'id_productos' => 'exists:productos,id',
            'id_almacenes' => 'exists:almacenes,id',
            'cantidad' => 'integer',
        ]);

        $almacenCantidad->update($request->all());

        return response()->json([
            'message' => 'Registro actualizado exitosamente',
            'data' => $almacenCantidad,
        ]);
    }

    public function destroy($id)
    {
        $almacenCantidad = AlmacenCantidad::find($id);

        if (!$almacenCantidad) {
            return response()->json([
                'message' => 'Registro no encontrado',
            ], 404);
        }

        $almacenCantidad->delete();

        return response()->json([
            'message' => 'Registro eliminado exitosamente',
        ]);
    }
}
