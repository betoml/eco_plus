<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cargo;
use Illuminate\Support\Facades\Validator;

class CargoController extends Controller
{
    public function index()
    {
        // Mostrar una lista de cargos
        $cargos = Cargo::all();
        return response()->json(['data' => $cargos], 200);
    }

    public function store(Request $request)
    {
        // Verificar si el campo 'cargo' está presente en la solicitud y es una cadena
        if (!$request->has('cargo') || !is_string($request->input('cargo'))) {
            return response()->json(['message' => 'Campo "cargo" es requerido y debe ser una cadena'], 400);
        }

        // Validar los datos del formulario
        $validator = Validator::make($request->all(), [
            'cargo' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => 'Error en la validación', 'errors' => $validator->errors()], 400);
        }

        // Crear un nuevo cargo en la base de datos
        Cargo::create($request->all());

        return response()->json(['message' => 'Cargo creado con éxito'], 201);
    }

    public function show($id)
    {
        // Mostrar los detalles de un cargo en particular
        $cargo = Cargo::findOrFail($id);
        return response()->json(['data' => $cargo], 200);
    }

    public function update(Request $request, $id)
    {
        // Verificar si el campo 'cargo' está presente en la solicitud y es una cadena
        if (!$request->has('cargo') || !is_string($request->input('cargo'))) {
            return response()->json(['message' => 'Campo "cargo" es requerido y debe ser una cadena'], 400);
        }

        // Validar los datos del formulario
        $validator = Validator::make($request->all(), [
            'cargo' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => 'Error en la validación', 'errors' => $validator->errors()], 400);
        }

        // Encontrar el cargo que se va a actualizar
        $cargo = Cargo::find($id);

        if (!$cargo) {
            return response()->json(['message' => 'Cargo no encontrado'], 404);
        }

        // Actualizar los datos del cargo
        $cargo->update($request->all());

        return response()->json(['message' => 'Cargo actualizado con éxito'], 200);
    }

    public function destroy($id)
    {
        // Encontrar el cargo que se va a eliminar
        $cargo = Cargo::find($id);

        if (!$cargo) {
            return response()->json(['message' => 'Cargo no encontrado'], 404);
        }

        // Eliminar el cargo
        $cargo->delete();

        return response()->json(['message' => 'Cargo eliminado con éxito'], 200);
    }
}
