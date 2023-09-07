<?php

namespace App\Http\Controllers;

use App\Models\UbicacionComercial;
use Illuminate\Http\Request;


class UbicacionComercialController extends Controller
{
    public function index()
    {
        // Obtener todas las ubicaciones comerciales
        $ubicacionesComerciales = UbicacionComercial::all();

        return response()->json(['data' => $ubicacionesComerciales]);
    }

    public function show($id)
    {
        // Buscar una ubicación comercial por ID
        $ubicacionComercial = UbicacionComercial::find($id);

        if (!$ubicacionComercial) {
            return response()->json(['message' => 'Ubicación comercial no encontrada'], 404);
        }

        return response()->json(['data' => $ubicacionComercial]);
    }

    public function store(Request $request)
    {
        // Validar los datos de entrada
        $request->validate([
            'id_ajustes' => 'required',
            'direccion_ubicacion_comercial' => 'required',
            'ciudad_ubicacion_comercial' => 'required',
            'pais_ubicacion_comercial' => 'required',
        ]);

        // Crear una nueva ubicación comercial
        $ubicacionComercial = UbicacionComercial::create($request->all());

        return response()->json(['message' => 'Ubicación comercial creada', 'data' => $ubicacionComercial], 201);
    }

    public function update(Request $request, $id)
    {
        // Buscar una ubicación comercial por ID
        $ubicacionComercial = UbicacionComercial::find($id);

        if (!$ubicacionComercial) {
            return response()->json(['message' => 'Ubicación comercial no encontrada'], 404);
        }

        // Validar los datos de entrada
        $request->validate([
            'id_ajustes' => 'required',
            'direccion_ubicacion_comercial' => 'required',
            'ciudad_ubicacion_comercial' => 'required',
            'pais_ubicacion_comercial' => 'required',
        ]);

        // Actualizar los datos de la ubicación comercial
        $ubicacionComercial->update($request->all());

        return response()->json(['message' => 'Ubicación comercial actualizada', 'data' => $ubicacionComercial]);
    }

    public function destroy($id)
    {
        // Buscar una ubicación comercial por ID
        $ubicacionComercial = UbicacionComercial::find($id);

        if (!$ubicacionComercial) {
            return response()->json(['message' => 'Ubicación comercial no encontrada'], 404);
        }

        // Eliminar la ubicación comercial
        $ubicacionComercial->delete();

        return response()->json(['message' => 'Ubicación comercial eliminada']);
    }
}
