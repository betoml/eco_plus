<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comision;

class ComisionController extends Controller
{
    public function index()
    {
        $comisiones = Comision::all();
        return response()->json(['data' => $comisiones], 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_ventas' => 'required|exists:ventas,id',
            'valor' => 'required|numeric',
            'estado' => 'required|string|max:255',
            'id_empleados' => 'required|exists:empleados,id',
        ]);

        $comision = Comision::create($request->all());

        return response()->json(['message' => 'Comisión creada con éxito', 'data' => $comision], 201);
    }

    public function show($id)
    {
        $comision = Comision::findOrFail($id);
        return response()->json(['data' => $comision], 200);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_ventas' => 'required|exists:ventas,id',
            'valor' => 'required|numeric',
            'estado' => 'required|string|max:255',
            'id_empleados' => 'required|exists:empleados,id',
        ]);

        $comision = Comision::findOrFail($id);

        if (!$comision) {
            return response()->json(['message' => 'Comisión no encontrada'], 404);
        }

        $comision->update($request->all());

        return response()->json(['message' => 'Comisión actualizada con éxito'], 200);
    }

    public function destroy($id)
    {
        $comision = Comision::findOrFail($id);

        if (!$comision) {
            return response()->json(['message' => 'Comisión no encontrada'], 404);
        }

        $comision->delete();

        return response()->json(['message' => 'Comisión eliminada con éxito'], 200);
    }
}
