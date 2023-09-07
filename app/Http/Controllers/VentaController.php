<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Venta;

class VentaController extends Controller
{
    protected $model = Venta::class; // Configura el modelo Venta

    public function index()
    {
        // Obtiene una lista de todas las ventas
        $ventas = $this->model::all();

        return response()->json([
            'data' => $ventas,
        ]);
    }

    public function store(Request $request)
    {
        // Valida y crea una nueva venta
        $this->validate($request, [
            'id_detalle_ventas' => 'required|integer',
            'id_clientes' => 'required|integer',
            'id_empleados' => 'required|integer',
        ]);

        $venta = $this->model::create($request->all());

        return response()->json([
            'message' => 'Venta creada exitosamente',
            'data' => $venta,
        ]);
    }

    public function show($id)
    {
        // Encuentra y muestra una venta por su ID
        $venta = $this->model::find($id);

        if (!$venta) {
            return response()->json([
                'message' => 'Venta no encontrada',
            ], 404);
        }

        return response()->json([
            'data' => $venta,
        ]);
    }

    public function update(Request $request, $id)
    {
        // Valida y actualiza una venta por su ID
        $venta = $this->model::find($id);

        if (!$venta) {
            return response()->json([
                'message' => 'Venta no encontrada',
            ], 404);
        }

        $this->validate($request, [
            'id_detalle_ventas' => 'required|integer',
            'id_clientes' => 'required|integer',
            'id_empleados' => 'required|integer',
        ]);

        $venta->update($request->all());

        return response()->json([
            'message' => 'Venta actualizada exitosamente',
            'data' => $venta,
        ]);
    }

    public function destroy($id)
    {
        // Elimina una venta por su ID
        $venta = $this->model::find($id);

        if (!$venta) {
            return response()->json([
                'message' => 'Venta no encontrada',
            ], 404);
        }

        $venta->delete();

        return response()->json([
            'message' => 'Venta eliminada exitosamente',
        ]);
    }
}
