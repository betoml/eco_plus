<?php

namespace App\Http\Controllers;

use App\Models\Comision;
use Illuminate\Http\Request;

class ComisionController extends Controller
{
    public function index()
    {
        // Obtener todas las comisiones
        $comisiones = Comision::all();

        return response()->json(['data' => $comisiones]);
    }

    public function show($id)
    {
        // Obtener una comisión por ID
        $comision = Comision::findOrFail($id);

        return response()->json(['data' => $comision]);
    }

    public function store(Request $request)
    {
        // Validar y guardar una nueva comisión
        $request->validate([
            'id_ventas' => 'required|integer',
            'valor' => 'required|numeric',
            'estado' => 'required|string',
            'id_empleados' => 'required|integer',
        ]);

        $comision = Comision::create($request->all());

        return response()->json(['data' => $comision], 201);
    }

    public function update(Request $request, $id)
    {
        // Validar y actualizar una comisión existente
        $request->validate([
            'id_ventas' => 'required|integer',
            'valor' => 'required|numeric',
            'estado' => 'required|string',
            'id_empleados' => 'required|integer',
        ]);

        $comision = Comision::findOrFail($id);
        $comision->update($request->all());

        return response()->json(['data' => $comision]);
    }

    public function destroy($id)
    {
        // Eliminar una comisión por ID
        $comision = Comision::findOrFail($id);
        $comision->delete();

        return response()->json(['message' => 'Comisión eliminada']);
    }
}
