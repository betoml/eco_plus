<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoriaGasto;

class CategoriaGastoController extends Controller
{
    // Listar todas las categorías de gastos
    public function index()
    {
        $categorias = CategoriaGasto::all();
        return response()->json(['data' => $categorias]);
    }

    // Mostrar una categoría de gasto específica
    public function show($id)
    {
        $categoria = CategoriaGasto::find($id);

        if (!$categoria) {
            return response()->json(['message' => 'Categoría de gasto no encontrada'], 404);
        }

        return response()->json(['data' => $categoria]);
    }

    // Almacenar una nueva categoría de gasto
    public function store(Request $request)
    {
        $request->validate([
            'nombre_categoria_gastos' => 'required|string|unique:categoria_gastos,nombre_categoria_gastos'
        ]);

        $categoria = CategoriaGasto::create([
            'nombre_categoria_gastos' => $request->input('nombre_categoria_gastos')
        ]);

        return response()->json(['data' => $categoria], 201);
    }

    // Actualizar una categoría de gasto existente
    public function update(Request $request, $id)
    {
        $categoria = CategoriaGasto::find($id);

        if (!$categoria) {
            return response()->json(['message' => 'Categoría de gasto no encontrada'], 404);
        }

        $request->validate([
            'nombre_categoria_gastos' => 'required|string|unique:categoria_gastos,nombre_categoria_gastos,' . $id
        ]);

        $categoria->nombre_categoria_gastos = $request->input('nombre_categoria_gastos');
        $categoria->save();

        return response()->json(['data' => $categoria]);
    }

    // Eliminar una categoría de gasto
    public function destroy($id)
    {
        $categoria = CategoriaGasto::find($id);

        if (!$categoria) {
            return response()->json(['message' => 'Categoría de gasto no encontrada'], 404);
        }

        $categoria->delete();

        return response()->json(['message' => 'Categoría de gasto eliminada']);
    }
}
