<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ZonaHorario;
use Illuminate\Support\Facades\Validator;

class ZonaHorarioController extends Controller
{
    public function index()
    {
        // Mostrar una lista de zonas horarias
        $zonasHorarias = ZonaHorario::all();
        return response()->json(['data' => $zonasHorarias], 200);
    }

    public function store(Request $request)
    {
        // Validar los datos del formulario
        $validator = Validator::make($request->all(), [
            'pais' => 'required|string|max:255',
            'gmt' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => 'Error en la validación', 'errors' => $validator->errors()], 400);
        }

        // Crear una nueva zona horaria en la base de datos
        ZonaHorario::create($request->all());

        return response()->json(['message' => 'Zona horaria creada con éxito'], 201);
    }

    public function show($id)
    {
        // Mostrar los detalles de una zona horaria en particular
        $zonaHoraria = ZonaHorario::findOrFail($id);
        return response()->json(['data' => $zonaHoraria], 200);
    }

    public function update(Request $request, $id)
    {
        // Validar los datos del formulario
        $validator = Validator::make($request->all(), [
            'pais' => 'required|string|max:255',
            'gmt' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => 'Error en la validación', 'errors' => $validator->errors()], 400);
        }

        // Encontrar la zona horaria que se va a actualizar
        $zonaHoraria = ZonaHorario::find($id);

        if (!$zonaHoraria) {
            return response()->json(['message' => 'Zona horaria no encontrada'], 404);
        }

        // Actualizar los datos de la zona horaria
        $zonaHoraria->update($request->all());

        return response()->json(['message' => 'Zona horaria actualizada con éxito'], 200);
    }

    public function destroy($id)
    {
        // Encontrar la zona horaria que se va a eliminar
        $zonaHoraria = ZonaHorario::find($id);

        if (!$zonaHoraria) {
            return response()->json(['message' => 'Zona horaria no encontrada'], 404);
        }

        // Eliminar la zona horaria
        $zonaHoraria->delete();

        return response()->json(['message' => 'Zona horaria eliminada con éxito'], 200);
    }
}
