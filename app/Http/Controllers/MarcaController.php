<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Marca;
use Illuminate\Support\Facades\Validator;

class MarcaController extends Controller
{
    public function index()
    {
        // Mostrar una lista de marcas
        $marcas = Marca::all();
        return response()->json(['data' => $marcas], 200);
    }

    public function store(Request $request)
    {
        // Validar los datos del formulario
        $validator = Validator::make($request->all(), [
            'nombre_marca' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => 'Error en la validación', 'errors' => $validator->errors()], 400);
        }

        // Crear una nueva marca en la base de datos
        Marca::create($request->all());

        return response()->json(['message' => 'Marca creada con éxito'], 201);
    }

    public function show($id)
    {
        // Mostrar los detalles de una marca en particular
        $marca = Marca::findOrFail($id);
        return response()->json(['data' => $marca], 200);
    }

    public function update(Request $request, $id)
    {
        // Validar los datos del formulario
        $validator = Validator::make($request->all(), [
            'nombre_marca' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => 'Error en la validación', 'errors' => $validator->errors()], 400);
        }

        // Encontrar la marca que se va a actualizar
        $marca = Marca::find($id);

        if (!$marca) {
            return response()->json(['message' => 'Marca no encontrada'], 404);
        }

        // Actualizar los datos de la marca
        $marca->update($request->all());

        return response()->json(['message' => 'Marca actualizada con éxito'], 200);
    }

    public function destroy($id)
    {
        // Encontrar la marca que se va a eliminar
        $marca = Marca::find($id);

        if (!$marca) {
            return response()->json(['message' => 'Marca no encontrada'], 404);
        }

        // Eliminar la marca
        $marca->delete();

        return response()->json(['message' => 'Marca eliminada con éxito'], 200);
    }
}
