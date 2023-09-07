<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use Illuminate\Support\Facades\Validator;

class ProductoController extends Controller
{
    public function index()
    {
        // Mostrar una lista de productos
        $productos = Producto::all();
        return response()->json(['data' => $productos], 200);
    }

    public function store(Request $request)
    {
        // Validar los datos del formulario
        $validator = Validator::make($request->all(), [
            'nombre_producto' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'img_proveedores' => 'nullable|url',
            'id_proveedores' => 'required|exists:proveedores,id',
            'id_marcas' => 'required|exists:marcas,id',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => 'Error en la validación', 'errors' => $validator->errors()], 400);
        }

        // Crear un nuevo producto en la base de datos
        $producto = Producto::create($request->all());

        return response()->json(['message' => 'Producto creado con éxito', 'data' => $producto], 201);
    }

    public function show($id)
    {
        // Mostrar los detalles de un producto en particular
        $producto = Producto::findOrFail($id);
        return response()->json(['data' => $producto], 200);
    }

    public function update(Request $request, $id)
    {
        // Validar los datos del formulario
        $validator = Validator::make($request->all(), [
            'nombre_producto' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'img_proveedores' => 'nullable|url',
            'id_proveedores' => 'required|exists:proveedores,id',
            'id_marcas' => 'required|exists:marcas,id',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => 'Error en la validación', 'errors' => $validator->errors()], 400);
        }

        // Encontrar el producto que se va a actualizar
        $producto = Producto::find($id);

        if (!$producto) {
            return response()->json(['message' => 'Producto no encontrado'], 404);
        }

        // Actualizar los datos del producto
        $producto->update($request->all());

        return response()->json(['message' => 'Producto actualizado con éxito'], 200);
    }

    public function destroy($id)
    {
        // Encontrar el producto que se va a eliminar
        $producto = Producto::find($id);

        if (!$producto) {
            return response()->json(['message' => 'Producto no encontrado'], 404);
        }

        // Eliminar el producto
        $producto->delete();

        return response()->json(['message' => 'Producto eliminado con éxito'], 200);
    }
}
