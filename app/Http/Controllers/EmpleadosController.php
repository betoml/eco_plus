<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empleados;

class EmpleadoController extends Controller
{
    public function index()
    {
        // Mostrar una lista de empleados
        $empleados = Empleados::all();
        return view('empleados.index', compact('empleados'));
    }

    public function create()
    {
        // Mostrar el formulario para crear un nuevo empleado
        return view('empleados.create');
    }

    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'nombres_empleados' => 'required|string|max:255',
            'apellidos_empleados' => 'required|string|max:255',
            'fecha_nacimiento_empleados' => 'required|date',
            'email_empleados' => 'required|email|unique:empleados,email_empleados',
            'fecha_contratacion' => 'required|date',
            'direccion_empleados' => 'required|string|max:255',
            'ciudad_empleados' => 'required|string|max:255',
            'pais_empleados' => 'required|string|max:255',
            'celular_empleados' => 'required|string|max:20',
            'id_cargos' => 'required|exists:cargos,id',
            'salario_empleados' => 'required|numeric',
        ]);

        // Crear un nuevo empleado en la base de datos
        Empleados::create($request->all());

        // Redireccionar a la lista de empleados con un mensaje de éxito
        return redirect()->route('empleados.index')
            ->with('success', 'Empleado creado con éxito');
    }

    public function show($id)
    {
        // Mostrar los detalles de un empleado en particular
        $empleado = Empleados::findOrFail($id);
        return view('empleados.show', compact('empleado'));
    }

    public function edit($id)
    {
        // Mostrar el formulario para editar un empleado
        $empleado = Empleados::findOrFail($id);
        return view('empleados.edit', compact('empleado'));
    }

    public function update(Request $request, $id)
    {
        // Validar los datos del formulario
        $request->validate([
            'nombres_empleados' => 'required|string|max:255',
            'apellidos_empleados' => 'required|string|max:255',
            'fecha_nacimiento_empleados' => 'required|date',
            'email_empleados' => 'required|email|unique:empleados,email_empleados,' . $id,
            'fecha_contratacion' => 'required|date',
            'direccion_empleados' => 'required|string|max:255',
            'ciudad_empleados' => 'required|string|max:255',
            'pais_empleados' => 'required|string|max:255',
            'celular_empleados' => 'required|string|max:20',
            'id_cargos' => 'required|exists:cargos,id',
            'salario_empleados' => 'required|numeric',
        ]);

        // Encontrar el empleado que se va a actualizar
        $empleado = Empleados::findOrFail($id);

        // Actualizar los datos del empleado
        $empleado->update($request->all());

        // Redireccionar a la lista de empleados con un mensaje de éxito
        return redirect()->route('empleados.index')
            ->with('success', 'Empleado actualizado con éxito');
    }

    public function destroy($id)
    {
        // Eliminar un empleado
        $empleado = Empleados::findOrFail($id);
        $empleado->delete();

        // Redireccionar a la lista de empleados con un mensaje de éxito
        return redirect()->route('empleados.index')
            ->with('success', 'Empleado eliminado con éxito');
    }
}
