<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use Illuminate\Support\Facades\Validator;

class ClienteController extends Controller
{
    public function index()
    {
        $clientes = Cliente::all();
        return response()->json(['data' => $clientes], 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nombre_cliente' => 'required|string|max:255',
            'apellidos_cliente' => 'required|string|max:255',
            'email_cliente' => 'required|email|unique:clientes,email_cliente',
            'telefono_cliente' => 'nullable|string|max:255',
            'celular_cliente' => 'nullable|string|max:255',
            'direccion_cliente' => 'nullable|string|max:255',
            'ciudad_cliente' => 'nullable|string|max:255',
            'pais_cliente' => 'nullable|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => 'Error en la validación', 'errors' => $validator->errors()], 400);
        }

        $cliente = Cliente::create($request->all());

        return response()->json(['message' => 'Cliente creado con éxito', 'data' => $cliente], 201);
    }

    public function show($id)
    {
        $cliente = Cliente::findOrFail($id);
        return response()->json(['data' => $cliente], 200);
    }

    public function update(Request $request, $id)
    {
        $cliente = Cliente::find($id);

        if (!$cliente) {
            return response()->json(['message' => 'Cliente no encontrado'], 404);
        }

        $validator = Validator::make($request->all(), [
            'nombre_cliente' => 'required|string|max:255',
            'apellidos_cliente' => 'required|string|max:255',
            'email_cliente' => 'required|email|unique:clientes,email_cliente,' . $cliente->id,
            'telefono_cliente' => 'nullable|string|max:255',
            'celular_cliente' => 'nullable|string|max:255',
            'direccion_cliente' => 'nullable|string|max:255',
            'ciudad_cliente' => 'nullable|string|max:255',
            'pais_cliente' => 'nullable|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => 'Error en la validación', 'errors' => $validator->errors()], 400);
        }

        $cliente->update($request->all());

        return response()->json(['message' => 'Cliente actualizado con éxito', 'data' => $cliente], 200);
    }

    public function destroy($id)
    {
        $cliente = Cliente::find($id);

        if (!$cliente) {
            return response()->json(['message' => 'Cliente no encontrado'], 404);
        }

        $cliente->delete();

        return response()->json(['message' => 'Cliente eliminado con éxito'], 200);
    }
}
