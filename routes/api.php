<?php

use App\Http\Controllers\AjustesController;
use App\Http\Controllers\AlmacenCantidadController;
use App\Http\Controllers\AlmacenController;
use App\Http\Controllers\CantidadController;
use App\Http\Controllers\MedidasUnidadesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CargoController;
use App\Http\Controllers\CategoriaGastoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ComisionController;
use App\Http\Controllers\CompraController;
use App\Http\Controllers\DetalleVentaController;
use App\Http\Controllers\DispositivoConectadoController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\ErpUserController;
use App\Http\Controllers\GastoController;
use App\Http\Controllers\GrupoPreciosController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\MonedaController;
use App\Http\Controllers\PagoSalarioController;
use App\Http\Controllers\PrecioController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\TransferenciaController;
use App\Http\Controllers\UbicacionComercialController;
use App\Http\Controllers\VentaController;
use App\Http\Controllers\ZonaHorarioController;

// Ruta para el inicio de sesión
Route::post('/login', [LoginController::class, 'login'])->name('login');


// Ruta para el cierre de sesión
Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth:sanctum');

Route::middleware(['auth:sanctum'])->group(function () {
    // Rutas para la tabla "Cargos"
    Route::get('cargos', [CargoController::class, 'index']);
    Route::post('cargos', [CargoController::class, 'store']);
    Route::get('cargos/{id}', [CargoController::class, 'show']);
    Route::put('cargos/{id}', [CargoController::class, 'update']);
    Route::delete('cargos/{id}', [CargoController::class, 'destroy']);

    // Rutas para la tabla "Empleados"
    Route::get('empleados', [EmpleadoController::class, 'index']);
    Route::post('empleados', [EmpleadoController::class, 'store']);
    Route::get('empleados/{id}', [EmpleadoController::class, 'show']);
    Route::put('empleados/{id}', [EmpleadoController::class, 'update']);
    Route::delete('empleados/{id}', [EmpleadoController::class, 'destroy']);

    // Rutas para la tabla "Erp_Users"
    Route::get('erp_users', [ErpUserController::class, 'index']);
    Route::post('erp_users', [ErpUserController::class, 'store']);
    Route::get('erp_users/{id}', [ErpUserController::class, 'show']);
    Route::put('erp_users/{id}', [ErpUserController::class, 'update']);
    Route::delete('erp_users/{id}', [ErpUserController::class, 'destroy']);

    // Rutas para la tabla "dispositivos_conectados"
    Route::get('dispositivos', [DispositivoConectadoController::class, 'index']);
    Route::post('dispositivos', [DispositivoConectadoController::class, 'store']);
    Route::get('dispositivos/{id}', [DispositivoConectadoController::class, 'show']);
    Route::put('dispositivos/{id}', [DispositivoConectadoController::class, 'update']);
    Route::delete('dispositivos/{id}', [DispositivoConectadoController::class, 'destroy']);

    // Rutas para la tabla "Monedas" (MonedaController)
    Route::get('monedas', [MonedaController::class, 'index']);
    Route::post('monedas', [MonedaController::class, 'store']);
    Route::get('monedas/{id}', [MonedaController::class, 'show']);
    Route::put('monedas/{id}', [MonedaController::class, 'update']);
    Route::delete('monedas/{id}', [MonedaController::class, 'destroy']);

    // Rutas para la tabla "Zona horatio")
    Route::get('zona-horario', [ZonaHorarioController::class, 'index']);
    Route::post('zona-horario', [ZonaHorarioController::class, 'store']);
    Route::get('zona-horario/{id}', [ZonaHorarioController::class, 'show']);
    Route::put('zona-horario/{id}', [ZonaHorarioController::class, 'update']);
    Route::delete('zona-horario/{id}', [ZonaHorarioController::class, 'destroy']);

    // Rutas para el controlador de Ajustes
    Route::get('ajustes', [AjustesController::class, 'index']);
    Route::post('ajustes', [AjustesController::class, 'store']);
    Route::get('ajustes/{id}', [AjustesController::class, 'show']);
    Route::put('ajustes/{id}', [AjustesController::class, 'update']);
    Route::delete('ajustes/{id}', [AjustesController::class, 'destroy']);

    // Rutas para la tabla "Clientes"
    Route::get('clientes', [ClienteController::class, 'index']);
    Route::post('clientes', [ClienteController::class, 'store']);
    Route::get('clientes/{id}', [ClienteController::class, 'show']);
    Route::put('clientes/{id}', [ClienteController::class, 'update']);
    Route::delete('clientes/{id}', [ClienteController::class, 'destroy']);

    // Rutas para la tabla "marcas"
    Route::get('marcas', [MarcaController::class, 'index']);
    Route::post('marcas', [MarcaController::class, 'store']);
    Route::get('marcas/{id}', [MarcaController::class, 'show']);
    Route::put('marcas/{id}', [MarcaController::class, 'update']);
    Route::delete('marcas/{id}', [MarcaController::class, 'destroy']);

    // Rutas para la tabla "medidas_unidades"
    Route::get('medidas-unidades', [MedidasUnidadesController::class, 'index']);
    Route::post('medidas-unidades', [MedidasUnidadesController::class, 'store']);
    Route::get('medidas-unidades/{id}', [MedidasUnidadesController::class, 'show']);
    Route::put('medidas-unidades/{id}', [MedidasUnidadesController::class, 'update']);
    Route::delete('medidas-unidades/{id}', [MedidasUnidadesController::class, 'destroy']);

    // Rutas para la tabla "proveedores"
    Route::get('proveedores', [ProveedorController::class, 'index']);
    Route::post('proveedores', [ProveedorController::class, 'store']);
    Route::get('proveedores/{id}', [ProveedorController::class, 'show']);
    Route::put('proveedores/{id}', [ProveedorController::class, 'update']);
    Route::delete('proveedores/{id}', [ProveedorController::class, 'destroy']);


    // Rutas para la tabla "Productos"
    Route::get('productos', [ProductoController::class, 'index']);
    Route::post('productos', [ProductoController::class, 'store']);
    Route::get('productos/{id}', [ProductoController::class, 'show']);
    Route::put('productos/{id}', [ProductoController::class, 'update']);
    Route::delete('productos/{id}', [ProductoController::class, 'destroy']);

    // Rutas para la tabla "Grupos de Precios"
    Route::get('grupos-precios', [GrupoPreciosController::class, 'index']);
    Route::post('grupos-precios', [GrupoPreciosController::class, 'store']);
    Route::get('grupos-precios/{id}', [GrupoPreciosController::class, 'show']);
    Route::put('grupos-precios/{id}', [GrupoPreciosController::class, 'update']);
    Route::delete('grupos-precios/{id}', [GrupoPreciosController::class, 'destroy']);

    // Rutas para la tabla "precios"
    Route::get('precios', [PrecioController::class, 'index']);
    Route::post('precios', [PrecioController::class, 'store']);
    Route::get('precios/{id}', [PrecioController::class, 'show']);
    Route::put('precios/{id}', [PrecioController::class, 'update']);
    Route::delete('precios/{id}', [PrecioController::class, 'destroy']);

    // Rutas para el controlador DetalleVenta
    Route::get('detalle_ventas', [DetalleVentaController::class, 'index']);
    Route::post('detalle_ventas', [DetalleVentaController::class, 'store']);
    Route::get('detalle_ventas/{id}', [DetalleVentaController::class, 'show']);
    Route::put('detalle_ventas/{id}', [DetalleVentaController::class, 'update']);
    Route::delete('detalle_ventas/{id}', [DetalleVentaController::class, 'destroy']);

    // Rutas para la tabla "Ventas"
    Route::get('ventas', [VentaController::class, 'index']);
    Route::post('ventas', [VentaController::class, 'store']);
    Route::get('ventas/{id}', [VentaController::class, 'show']);
    Route::put('ventas/{id}', [VentaController::class, 'update']);
    Route::delete('ventas/{id}', [VentaController::class, 'destroy']);

    // Rutas para la tabla "Cantidades"
    Route::get('cantidades', [CantidadController::class, 'index']);
    Route::post('cantidades', [CantidadController::class, 'store']);
    Route::get('cantidades/{id}', [CantidadController::class, 'show']);
    Route::put('cantidades/{id}', [CantidadController::class, 'update']);
    Route::delete('cantidades/{id}', [CantidadController::class, 'destroy']);

    // Rutas para la tabla "Compras"
    Route::get('compras', [CompraController::class, 'index']);
    Route::post('compras', [CompraController::class, 'store']);
    Route::get('compras/{id}', [CompraController::class, 'show']);
    Route::put('compras/{id}', [CompraController::class, 'update']);
    Route::delete('compras/{id}', [CompraController::class, 'destroy']);

    // Rutas para la tabla "Almacenes"
    Route::get('almacenes', [AlmacenController::class, 'index']);
    Route::post('almacenes', [AlmacenController::class, 'store']);
    Route::get('almacenes/{id}', [AlmacenController::class, 'show']);
    Route::put('almacenes/{id}', [AlmacenController::class, 'update']);
    Route::delete('almacenes/{id}', [AlmacenController::class, 'destroy']);

    // Rutas para la tabla "Almacenes Cantidades"
    Route::get('almacen-cantidades', [AlmacenCantidadController::class, 'index']);
    Route::post('almacen-cantidades', [AlmacenCantidadController::class, 'store']);
    Route::get('almacen-cantidades/{id}', [AlmacenCantidadController::class, 'show']);
    Route::put('almacen-cantidades/{id}', [AlmacenCantidadController::class, 'update']);
    Route::delete('almacen-cantidades/{id}', [AlmacenCantidadController::class, 'destroy']);

    // Rutas para la tabla "ubicaciones_comerciales"
    Route::get('ubicaciones-comerciales', [UbicacionComercialController::class, 'index']);
    Route::post('ubicaciones-comerciales', [UbicacionComercialController::class, 'store']);
    Route::get('ubicaciones-comerciales/{id}', [UbicacionComercialController::class, 'show']);
    Route::put('ubicaciones-comerciales/{id}', [UbicacionComercialController::class, 'update']);
    Route::delete('ubicaciones-comerciales/{id}', [UbicacionComercialController::class, 'destroy']);

    // Rutas para la tabla "Transferencias"
    Route::get('transferencias', [TransferenciaController::class, 'index']);
    Route::post('transferencias', [TransferenciaController::class, 'store']);
    Route::get('transferencias/{id}', [TransferenciaController::class, 'show']);
    Route::put('transferencias/{id}', [TransferenciaController::class, 'update']);
    Route::delete('transferencias/{id}', [TransferenciaController::class, 'destroy']);

    // Rutas para la tabla "categoria_gastos"
    Route::get('categoria-gastos', [CategoriaGastoController::class, 'index']);
    Route::post('categoria-gastos', [CategoriaGastoController::class, 'store']);
    Route::get('categoria-gastos/{id}', [CategoriaGastoController::class, 'show']);
    Route::put('categoria-gastos/{id}', [CategoriaGastoController::class, 'update']);
    Route::delete('categoria-gastos/{id}', [CategoriaGastoController::class, 'destroy']);

    // Rutas para la tabla "Gastos"
    Route::get('gastos', [GastoController::class, 'index']);
    Route::post('gastos', [GastoController::class, 'store']);
    Route::get('gastos/{id}', [GastoController::class, 'show']);
    Route::put('gastos/{id}', [GastoController::class, 'update']);
    Route::delete('gastos/{id}', [GastoController::class, 'destroy']);

    // Rutas para la tabla "comisiones"
    Route::get('comisiones', [ComisionController::class, 'index']);
    Route::post('comisiones', [ComisionController::class, 'store']);
    Route::get('comisiones/{id}', [ComisionController::class, 'show']);
    Route::put('comisiones/{id}', [ComisionController::class, 'update']);
    Route::delete('comisiones/{id}', [ComisionController::class, 'destroy']);

    // Rutas para la tabla "Pagos Salarios"
    Route::get('pagos-salarios', [PagoSalarioController::class, 'index']);
    Route::post('pagos-salarios', [PagoSalarioController::class, 'store']);
    Route::get('pagos-salarios/{id}', [PagoSalarioController::class, 'show']);
    Route::put('pagos-salarios/{id}', [PagoSalarioController::class, 'update']);
    Route::delete('pagos-salarios/{id}', [PagoSalarioController::class, 'destroy']);
});
