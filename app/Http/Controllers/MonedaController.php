<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Moneda;

class MonedaController extends Controller
{
    public function index()
    {
        // Obtener todas las monedas
        $monedas = Moneda::all();
        return response()->json(['data' => $monedas], 200);
    }

    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'nombre' => 'required|string|max:255',
            'abreviatura' => 'required|string|max:10',
        ]);

        // Crear una nueva moneda en la base de datos
        $moneda = Moneda::create($request->all());

        return response()->json(['message' => 'Moneda creada con éxito', 'data' => $moneda], 201);
    }

    public function show($id)
    {
        // Mostrar los detalles de una moneda en particular
        $moneda = Moneda::findOrFail($id);
        return response()->json(['data' => $moneda], 200);
    }

    public function update(Request $request, $id)
    {
        // Validar los datos del formulario
        $request->validate([
            'nombre' => 'required|string|max:255',
            'abreviatura' => 'required|string|max:10',
        ]);

        // Encontrar la moneda que se va a actualizar
        $moneda = Moneda::find($id);

        if (!$moneda) {
            return response()->json(['message' => 'Moneda no encontrada'], 404);
        }

        // Actualizar los datos de la moneda
        $moneda->update($request->all());

        return response()->json(['message' => 'Moneda actualizada con éxito', 'data' => $moneda], 200);
    }

    public function destroy($id)
    {
        // Encontrar la moneda que se va a eliminar
        $moneda = Moneda::find($id);

        if (!$moneda) {
            return response()->json(['message' => 'Moneda no encontrada'], 404);
        }

        // Eliminar la moneda
        $moneda->delete();

        return response()->json(['message' => 'Moneda eliminada con éxito'], 200);
    }
}
