<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Precio;

class PrecioController extends Controller
{
    public function index()
    {
        // Obtener todos los registros de precios
        $precios = Precio::all();

        return response()->json(['data' => $precios]);
    }

    public function show($id)
    {
        // Buscar un precio por ID
        $precio = Precio::find($id);

        if (!$precio) {
            return response()->json(['message' => 'Precio no encontrado'], 404);
        }

        return response()->json(['data' => $precio]);
    }

    public function store(Request $request)
    {
        // Validar los datos enviados
        $request->validate([
            'valor' => 'required|numeric',
            'id_grupos_precios' => 'required|exists:grupos_precios,id',
            'id_productos' => 'required|exists:productos,id',
        ]);

        // Crear un nuevo precio
        $precio = Precio::create($request->all());

        return response()->json(['message' => 'Precio creado', 'data' => $precio], 201);
    }

    public function update(Request $request, $id)
    {
        // Validar los datos enviados
        $request->validate([
            'valor' => 'numeric',
            'id_grupos_precios' => 'exists:grupos_precios,id',
            'id_productos' => 'exists:productos,id',
        ]);

        // Buscar el precio por ID
        $precio = Precio::find($id);

        if (!$precio) {
            return response()->json(['message' => 'Precio no encontrado'], 404);
        }

        // Actualizar el precio
        $precio->update($request->all());

        return response()->json(['message' => 'Precio actualizado', 'data' => $precio]);
    }

    public function destroy($id)
    {
        // Buscar el precio por ID
        $precio = Precio::find($id);

        if (!$precio) {
            return response()->json(['message' => 'Precio no encontrado'], 404);
        }

        // Eliminar el precio
        $precio->delete();

        return response()->json(['message' => 'Precio eliminado']);
    }
}
