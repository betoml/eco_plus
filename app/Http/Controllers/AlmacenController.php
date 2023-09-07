<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Almacen;

class AlmacenController extends Controller
{
    // Listar todos los almacenes
    public function index()
    {
        $almacenes = Almacen::all();
        return response()->json(['data' => $almacenes]);
    }

    // Mostrar un almacen específico
    public function show($id)
    {
        $almacen = Almacen::find($id);

        if (!$almacen) {
            return response()->json(['message' => 'Almacen no encontrado'], 404);
        }

        return response()->json(['data' => $almacen]);
    }

    // Crear un nuevo almacen
    public function store(Request $request)
    {
        $request->validate([
            'nombre_almacen' => 'required',
            'direccion_almacen' => 'required',
            'ciudad_almacen' => 'required',
            'pais_almacen' => 'required',
        ]);

        $almacen = Almacen::create($request->all());

        return response()->json(['message' => 'Almacen creado con éxito', 'data' => $almacen], 201);
    }

    // Actualizar un almacen existente
    public function update(Request $request, $id)
    {
        $almacen = Almacen::find($id);

        if (!$almacen) {
            return response()->json(['message' => 'Almacen no encontrado'], 404);
        }

        $request->validate([
            'nombre_almacen' => 'required',
            'direccion_almacen' => 'required',
            'ciudad_almacen' => 'required',
            'pais_almacen' => 'required',
        ]);

        $almacen->update($request->all());

        return response()->json(['message' => 'Almacen actualizado con éxito', 'data' => $almacen]);
    }

    // Eliminar un almacen
    public function destroy($id)
    {
        $almacen = Almacen::find($id);

        if (!$almacen) {
            return response()->json(['message' => 'Almacen no encontrado'], 404);
        }

        $almacen->delete();

        return response()->json(['message' => 'Almacen eliminado con éxito']);
    }
}
