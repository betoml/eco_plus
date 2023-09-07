<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DispositivoConectado;
use Illuminate\Support\Facades\Validator;

class DispositivoConectadoController extends Controller
{
    public function index()
    {
        // Mostrar una lista de dispositivos conectados
        $dispositivos = DispositivoConectado::all();
        return response()->json(['data' => $dispositivos], 200);
    }

    public function store(Request $request)
    {
        // Validar los datos del formulario
        $validator = Validator::make($request->all(), [
            'ip' => 'required|ip',
            'nombre_dispositivo' => 'required|string|max:255',
            'id_erp_users' => 'required|exists:erp_users,id',
            'id_empleados' => 'required|exists:empleados,id',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => 'Error en la validación', 'errors' => $validator->errors()], 400);
        }

        // Crear un nuevo dispositivo conectado en la base de datos
        $dispositivo = DispositivoConectado::create($request->all());

        return response()->json(['message' => 'Dispositivo conectado creado con éxito', 'data' => $dispositivo], 201);
    }

    public function show($id)
    {
        // Mostrar los detalles de un dispositivo conectado en particular
        $dispositivo = DispositivoConectado::findOrFail($id);
        return response()->json(['data' => $dispositivo], 200);
    }

    public function update(Request $request, $id)
    {
        // Validar los datos del formulario
        $validator = Validator::make($request->all(), [
            'ip' => 'ip',
            'nombre_dispositivo' => 'string|max:255',
            'id_erp_users' => 'exists:erp_users,id',
            'id_empleados' => 'exists:empleados,id',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => 'Error en la validación', 'errors' => $validator->errors()], 400);
        }

        // Encontrar el dispositivo conectado que se va a actualizar
        $dispositivo = DispositivoConectado::find($id);

        if (!$dispositivo) {
            return response()->json(['message' => 'Dispositivo conectado no encontrado'], 404);
        }

        // Actualizar los datos del dispositivo conectado
        $dispositivo->update($request->all());

        return response()->json(['message' => 'Dispositivo conectado actualizado con éxito'], 200);
    }

    public function destroy($id)
    {
        // Encontrar el dispositivo conectado que se va a eliminar
        $dispositivo = DispositivoConectado::find($id);

        if (!$dispositivo) {
            return response()->json(['message' => 'Dispositivo conectado no encontrado'], 404);
        }

        // Eliminar el dispositivo conectado
        $dispositivo->delete();

        return response()->json(['message' => 'Dispositivo conectado eliminado con éxito'], 200);
    }
}
