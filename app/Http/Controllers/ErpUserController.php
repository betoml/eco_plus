<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ErpUser;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ErpUserController extends Controller
{
    public function index()
    {
        // Mostrar una lista de erp_users
        $erpUsers = ErpUser::all();
        return response()->json(['data' => $erpUsers], 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user' => 'required|string|max:255',
            'password' => 'required|string|max:255',
            'id_empleados' => 'required|integer',
            'activo' => 'required|boolean',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => 'Error en la validación', 'errors' => $validator->errors()], 400);
        }

        // Cifra la contraseña antes de almacenarla en la base de datos
        $hashedPassword = Hash::make($request->password);

        ErpUser::create([
            'user' => $request->user,
            'password' => $hashedPassword,
            'id_empleados' => $request->id_empleados,
            'activo' => $request->activo,
        ]);

        return response()->json(['message' => 'Usuario ERP creado con éxito'], 201);
    }

    public function show($id)
    {
        // Mostrar los detalles de un erp_user en particular
        $erpUser = ErpUser::findOrFail($id);
        return response()->json(['data' => $erpUser], 200);
    }

    public function update(Request $request, $id)
    {
        // Validar los datos del formulario
        $validator = Validator::make($request->all(), [
            'user' => 'required|string|max:255',
            'password' => 'required|string|max:255',
            'id_empleados' => 'required|exists:empleados,id',
            'activo' => 'required|boolean',
            // Otras validaciones aquí
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => 'Error en la validación', 'errors' => $validator->errors()], 400);
        }

        // Encontrar el erp_user que se va a actualizar
        $erpUser = ErpUser::find($id);

        if (!$erpUser) {
            return response()->json(['message' => 'ErpUser no encontrado'], 404);
        }

        // Actualizar los datos del erp_user
        $erpUser->update($request->all());

        return response()->json(['message' => 'ErpUser actualizado con éxito'], 200);
    }

    public function destroy($id)
    {
        // Encontrar el erp_user que se va a eliminar
        $erpUser = ErpUser::find($id);

        if (!$erpUser) {
            return response()->json(['message' => 'ErpUser no encontrado'], 404);
        }

        // Eliminar el erp_user
        $erpUser->delete();

        return response()->json(['message' => 'ErpUser eliminado con éxito'], 200);
    }
}
