<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ajustes;
use Illuminate\Support\Facades\Validator;

class AjustesController extends Controller
{
    public function index()
    {
        // Obtener los ajustes desde la base de datos
        $ajustes = Ajustes::first(); // Suponiendo que solo hay un registro de ajustes
    
        if (!$ajustes) {
            // Si no se encuentra ningún ajuste, retornar un array vacío
            return response()->json(['data' => []], 200);
        }
    
        return response()->json(['data' => $ajustes], 200);
    }
    

    public function store(Request $request)
    {
        // Validar los datos del formulario
        $validator = Validator::make($request->all(), [
            'nombre_empresa' => 'required|string|max:255',
            'logo_empresa' => 'nullable|string|max:255',
            'direccion_empresa' => 'nullable|string|max:255',
            'email_empresa' => 'nullable|email|max:255',
            'contacto_empresa' => 'nullable|string|max:255',
            'id_monedas' => 'required|integer',
            'id_zona_horario' => 'required|integer',
            'formato_horario' => 'required|in:24 horas,AM/PM',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => 'Error en la validación', 'errors' => $validator->errors()], 400);
        }

        // Crear la configuración de ajustes en la base de datos
        $ajustes = Ajustes::create($request->all());

        return response()->json(['message' => 'Ajustes creados con éxito', 'data' => $ajustes], 201);
    }

    public function update(Request $request)
    {
        // Validar los datos del formulario
        $validator = Validator::make($request->all(), [
            'nombre_empresa' => 'required|string|max:255',
            'logo_empresa' => 'nullable|string|max:255',
            'direccion_empresa' => 'nullable|string|max:255',
            'email_empresa' => 'nullable|email|max:255',
            'contacto_empresa' => 'nullable|string|max:255',
            'id_monedas' => 'required|integer',
            'id_zona_horario' => 'required|integer',
            'formato_horario' => 'required|in:24 horas,AM/PM',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => 'Error en la validación', 'errors' => $validator->errors()], 400);
        }

        // Actualizar la configuración de ajustes
        $ajustes = Ajustes::first();
        if (!$ajustes) {
            return response()->json(['message' => 'Configuración de ajustes no encontrada'], 404);
        }

        $ajustes->update($request->all());

        return response()->json(['message' => 'Ajustes actualizados con éxito', 'data' => $ajustes], 200);
    }
}
