<?php

namespace App\Http\Controllers;

use App\Models\DispositivoConectado;
use App\Models\Empleado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    protected $model = \App\Models\ErpUser::class; // Configurar el modelo ErpUser

    public function login(Request $request)
{
    // Validar los datos del formulario de inicio de sesión
    $request->validate([
        'user' => 'required|string',
        'password' => 'required|string',
    ]);

    // Intentar autenticar al usuario
    if (Auth::attempt($request->only('user', 'password'))) {
        // Usuario autenticado, verifica si está activo
        $user = Auth::user();

        if (!$user->activo) {
            // Si el usuario no está activo, envía un mensaje de error
            return response()->json(['message' => 'El usuario no está activo. Comuníquese con el administrador.'], 403);
        }

        // Obtener el ID de empleados desde la tabla "erp_users"
        $idEmpleados = $user->id_empleados;

        // Capturar la dirección IP del cliente
        $ip = $request->ip();

        // Obtener la información del agente del usuario (navegador/dispositivo)
        $userAgent = $request->userAgent();

        // Obtener el valor del campo "nombre_dispositivo" de la solicitud
        $nombreDispositivo = $request->input('nombre_dispositivo');

        // Forzar el valor a no ser nulo
        if ($nombreDispositivo === null || empty($nombreDispositivo)) {
            $nombreDispositivo = 'Desconocido';
        }

        // Guardar información en la tabla "dispositivos_conectados"
        DispositivoConectado::create([
            'ip' => $ip,
            'navegador_dispositivo' => $userAgent,
            'id_erp_users' => $user->id, // ID del usuario de "erp_users"
            'id_empleados' => $idEmpleados, // ID de empleados desde "erp_users"
            'nombre_dispositivo' => $nombreDispositivo,
            'created_at' => now(),
        ]);

        // Generar el token de autenticación
        $token = $user->createToken('api-token')->plainTextToken;

        return response()->json([
            'message' => 'Inicio de sesión exitoso',
            'token' => $token,
            'user' => $user,
        ]);
    }

    // Falló la autenticación
    return response()->json([
        'message' => 'Las credenciales son incorrectas. Verifique el usuario y la contraseña.'

    ], 401);
}

    
    
    
    
    
    


    public function logout(Request $request)
    {
        // Revoca el token actual del usuario autenticado
        $request->user()->tokens()->delete();

        return response()->json(['message' => 'Cierre de sesión exitoso']);
    }
}
