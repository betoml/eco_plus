<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PagoSalario;
use Illuminate\Support\Facades\Validator;

class PagoSalarioController extends Controller
{
    public function index()
    {
        // Mostrar una lista de pagos de salarios
        $pagosSalarios = PagoSalario::all();
        return response()->json(['data' => $pagosSalarios], 200);
    }

    public function store(Request $request)
    {
        // Validar los datos del formulario
        $validator = Validator::make($request->all(), [
            'id_empleados' => 'required|exists:empleados,id',
            'valor' => 'required|numeric',
            'estado' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => 'Error en la validación', 'errors' => $validator->errors()], 400);
        }

        // Crear un nuevo pago de salario en la base de datos
        PagoSalario::create($request->all());

        return response()->json(['message' => 'Pago de salario creado con éxito'], 201);
    }

    public function show($id)
    {
        // Mostrar los detalles de un pago de salario en particular
        $pagoSalario = PagoSalario::findOrFail($id);
        return response()->json(['data' => $pagoSalario], 200);
    }

    public function update(Request $request, $id)
    {
        // Validar los datos del formulario
        $validator = Validator::make($request->all(), [
            'id_empleados' => 'required|exists:empleados,id',
            'valor' => 'required|numeric',
            'estado' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => 'Error en la validación', 'errors' => $validator->errors()], 400);
        }

        // Encontrar el pago de salario que se va a actualizar
        $pagoSalario = PagoSalario::findOrFail($id);

        if (!$pagoSalario) {
            return response()->json(['message' => 'Pago de salario no encontrado'], 404);
        }

        // Actualizar los datos del pago de salario
        $pagoSalario->update($request->all());

        return response()->json(['message' => 'Pago de salario actualizado con éxito'], 200);
    }

    public function destroy($id)
    {
        // Encontrar el pago de salario que se va a eliminar
        $pagoSalario = PagoSalario::findOrFail($id);

        if (!$pagoSalario) {
            return response()->json(['message' => 'Pago de salario no encontrado'], 404);
        }

        // Eliminar el pago de salario
        $pagoSalario->delete();

        return response()->json(['message' => 'Pago de salario eliminado con éxito'], 200);
    }
}
