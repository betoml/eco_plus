<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proveedor;
use Illuminate\Support\Facades\Validator;

class ProveedorController extends Controller
{
    public function index()
    {
        // Obtener una lista de proveedores
        $proveedores = Proveedor::all();
        return response()->json(['data' => $proveedores], 200);
    }

    public function store(Request $request)
    {
        // Validar los datos del formulario
        $validator = Validator::make($request->all(), [
            'nombre_proveedores' => 'required|string|max:255',
            'id_impuestos_proveedores' => 'required|string|max:255',
            'email_proveedores' => 'required|email|max:255',
            'celular_proveedores' => 'nullable|string|max:255',
            'celular_2_proveedores' => 'nullable|string|max:255',
            'telefono_proveedores' => 'nullable|string|max:255',
            'direccion_proveedores' => 'nullable|string|max:255',
            'ciudad_proveedores' => 'nullable|string|max:255',
            'pais_proveedores' => 'nullable|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => 'Error en la validación', 'errors' => $validator->errors()], 400);
        }

        // Crear un nuevo proveedor en la base de datos
        Proveedor::create($request->all());

        return response()->json(['message' => 'Proveedor creado con éxito'], 201);
    }

    public function show($id)
    {
        // Mostrar los detalles de un proveedor en particular
        $proveedor = Proveedor::findOrFail($id);
        return response()->json(['data' => $proveedor], 200);
    }

    public function update(Request $request, $id)
    {
        // Validar los datos del formulario
        $validator = Validator::make($request->all(), [
            'nombre_proveedores' => 'required|string|max:255',
            'id_impuestos_proveedores' => 'required|string|max:255',
            'email_proveedores' => 'required|email|max:255',
            'celular_proveedores' => 'nullable|string|max:255',
            'celular_2_proveedores' => 'nullable|string|max:255',
            'telefono_proveedores' => 'nullable|string|max:255',
            'direccion_proveedores' => 'nullable|string|max:255',
            'ciudad_proveedores' => 'nullable|string|max:255',
            'pais_proveedores' => 'nullable|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => 'Error en la validación', 'errors' => $validator->errors()], 400);
        }

        // Encontrar el proveedor que se va a actualizar
        $proveedor = Proveedor::find($id);

        if (!$proveedor) {
            return response()->json(['message' => 'Proveedor no encontrado'], 404);
        }

        // Actualizar los datos del proveedor
        $proveedor->update($request->all());

        return response()->json(['message' => 'Proveedor actualizado con éxito'], 200);
    }

    public function destroy($id)
    {
        // Encontrar el proveedor que se va a eliminar
        $proveedor = Proveedor::find($id);

        if (!$proveedor) {
            return response()->json(['message' => 'Proveedor no encontrado'], 404);
        }

        // Eliminar el proveedor
        $proveedor->delete();

        return response()->json(['message' => 'Proveedor eliminado con éxito'], 200);
    }
}
