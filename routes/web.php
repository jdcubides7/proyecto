<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\Tablas_Sistema;
use App\Http\Controllers\EditarRegistroController;
use App\Http\Controllers\VentasController;
use App\Http\Controllers\Inventario;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ConnectController;


use Illuminate\Facades\DB; // Import DB Facade
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

//use IlluminateSupportFacadesRoute;





/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
//muestra la vista welcome de laravel
//Route::get('/', function () {    return view('welcome');});

Route::get('/',[ConnectController::class,'getSeccionInicio']);
// retornar view login validar siempre la ruta \
Route::get('/ingreso', 'App\Http\Controllers\ConnectController@getIngreso')->name('ingreso'); //1pagina login
Route::get('/seccion-inicio', 'App\Http\Controllers\ConnectController@getSeccionInicio')->name('seccionInicio'); //2pagina inicio
Route::get('/registro', 'App\Http\Controllers\ConnectController@getRegistro')->name('registro'); //3 registro
//ruta creada para el dashboard
Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index')->middleware(['auth', 'verified'])->name('dashboard');
Route::post('/dashboard/buscar', 'App\Http\Controllers\DashboardController@buscar')->middleware(['auth', 'verified'])->name('dashboard.buscar');
//Route original del dashboard
//Route::get('/dashboard', function () {
//    $datos = Tablas_Sistema::all();
//    return view('dashboard',compact('datos'));
//})->middleware(['auth', 'verified'])->name('dashboard');
//
//
//
//Route::get('/registro/{id}/edit', [RegistroController::class, 'edit'])->name('registro.edit');
//
//Route::put('/registro/{id}', [RegistroController::class, 'update'])->name('registro.update');
//#########Vista para editar registros de base de datos
Route::get('/editar-registro/{id}','App\Http\Controllers\DashboardController@editar-registro')->name('editar-registro');
//#############Vistas para eliminar registros según la tabla de base de datos seleccionada
Route::get('dashboard/editar-registros/{tabla}/{id}/edit', [EditarRegistroController::class, 'edit'])->middleware(['auth', 'verified'])->name('registro.edit');
Route::put('dashboard/editar-registros/{tabla}/{id}', [EditarRegistroController::class, 'update'])->middleware(['auth', 'verified'])->name('registro.update');
//#############Vistas para borrar registros según la tabla de base de datos seleccionada
Route::get('dashboard/borrar-registro/{tabla}/{id}',[EditarRegistroController::class,'show'])->middleware(['auth', 'verified'])->name('registro.show');
Route::delete('dashboard/borrar-registro/{tabla}/{id}',[EditarRegistroController::class,'destroy'])->middleware(['auth', 'verified'])->name('registro.destroy');
//#############Vistas para insertar registros según la tabla de base de datos seleccionada
Route::get('dashboard/insertar-registro/{tabla}',[EditarRegistroController::class,'InsertTable'])->middleware(['auth', 'verified'])->name('registro.InsertTable');
Route::post('dashboard/insertar-registro/{tabla}',[EditarRegistroController::class,'InsertTableBD'])->middleware(['auth', 'verified'])->name('registro.InsertTableDB');


//########Vistas para editar el perfil y cambiar el password
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
require __DIR__.'/auth.php';


//##PARA LA SECCION DE VENTAS################################################################################################

// Ruta para mostrar el formulario
Route::get('dashboard/registrar-ventas', [VentasController::class, 'registrarVentas'])
    ->middleware(['auth', 'verified'])
    ->name('registro-ventas.registrarVentas');

// Ruta para manejar el almacenamiento de los datos del formulario
Route::post('dashboard/registrar-ventas', [VentasController::class, 'store'])
    ->middleware(['auth', 'verified'])
    ->name('registro-ventas.store');

//Ruta para cargar las categorias por medio de codigo ajax
Route::get('/productos/categoria/{categoriaId}', [VentasController::class, 'getProductsByCategory']);

//PARA LA SECCION DE INVENTARIO#############################################################################################

Route::get('dashboard/inventarios', [Inventario::class, 'inventario'])
    ->middleware(['auth', 'verified'])
    ->name('registro-inventario.inventario');