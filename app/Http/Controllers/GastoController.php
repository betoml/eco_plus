<?php

namespace App\Http\Controllers;

use App\Models\Gasto;
use Illuminate\Http\Request;

class GastoController extends Controller
{
    public function index()
    {
        $gastos = Gasto::all();
        return response()->json(['data' => $gastos], 200);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'id_categoria_gastos' => 'required',
            'valor' => 'required',
            'observacion' => 'nullable',
            'firmado' => 'nullable',
            'solicitado' => 'nullable',
            'autorizado' => 'nullable',
            'estado' => 'nullable',
            'comprobante' => 'nullable',
        ]);

        $gasto = new Gasto([
            'id_categoria_gastos' => $request->input('id_categoria_gastos'),
            'valor' => $request->input('valor'),
            'observacion' => $request->input('observacion'),
            'firmado' => $request->input('firmado'),
            'solicitado' => $request->input('solicitado'),
            'autorizado' => $request->input('autorizado'),
            'estado' => $request->input('estado'),
            'comprobante' => $request->input('comprobante'),
        ]);

        $gasto->save();

        return response()->json(['message' => 'Gasto creado con éxito'], 201);
    }

    public function show($id)
    {
        $gasto = Gasto::find($id);

        if (!$gasto) {
            return response()->json(['message' => 'Gasto no encontrado'], 404);
        }

        return response()->json(['data' => $gasto], 200);
    }

    public function update(Request $request, $id)
    {
        $gasto = Gasto::find($id);

        if (!$gasto) {
            return response()->json(['message' => 'Gasto no encontrado'], 404);
        }

        $gasto->fill($request->all());
        $gasto->save();

        return response()->json(['message' => 'Gasto actualizado con éxito'], 200);
    }

    public function destroy($id)
    {
        $gasto = Gasto::find($id);

        if (!$gasto) {
            return response()->json(['message' => 'Gasto no encontrado'], 404);
        }

        $gasto->delete();

        return response()->json(['message' => 'Gasto eliminado con éxito'], 200);
    }
}
