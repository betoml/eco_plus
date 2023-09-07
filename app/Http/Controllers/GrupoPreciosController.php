<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GrupoPrecios;
use Illuminate\Support\Facades\Validator;

class GrupoPreciosController extends Controller
{
    public function index()
    {
        // Obtener todos los grupos de precios
        $gruposPrecios = GrupoPrecios::all();
        return response()->json(['data' => $gruposPrecios], 200);
    }

    public function store(Request $request)
    {
        // Validar los datos del formulario
        $validator = Validator::make($request->all(), [
            'nombre_grupo_precios' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => 'Error en la validación', 'errors' => $validator->errors()], 400);
        }

        // Crear un nuevo grupo de precios en la base de datos
        GrupoPrecios::create($request->all());

        return response()->json(['message' => 'Grupo de precios creado con éxito'], 201);
    }

    public function show($id)
    {
        // Mostrar los detalles de un grupo de precios en particular
        $grupoPrecios = GrupoPrecios::findOrFail($id);
        return response()->json(['data' => $grupoPrecios], 200);
    }

    public function update(Request $request, $id)
    {
        // Validar los datos del formulario
        $validator = Validator::make($request->all(), [
            'nombre_grupo_precios' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => 'Error en la validación', 'errors' => $validator->errors()], 400);
        }

        // Encontrar el grupo de precios que se va a actualizar
        $grupoPrecios = GrupoPrecios::find($id);

        if (!$grupoPrecios) {
            return response()->json(['message' => 'Grupo de precios no encontrado'], 404);
        }

        // Actualizar los datos del grupo de precios
        $grupoPrecios->update($request->all());

        return response()->json(['message' => 'Grupo de precios actualizado con éxito'], 200);
    }

    public function destroy($id)
    {
        // Encontrar el grupo de precios que se va a eliminar
        $grupoPrecios = GrupoPrecios::find($id);

        if (!$grupoPrecios) {
            return response()->json(['message' => 'Grupo de precios no encontrado'], 404);
        }

        // Eliminar el grupo de precios
        $grupoPrecios->delete();

        return response()->json(['message' => 'Grupo de precios eliminado con éxito'], 200);
    }
}
