<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\Tablas_Sistema;
use App\Http\Controllers\EditarRegistroController;


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

Route::get('/', function () {
    return view('welcome');
});

//1 para retornar view login validar siempre la ruta \
Route::get('/ingreso', 'App\Http\Controllers\ConnectController@getIngreso')->name('ingreso'); //1pagina login

Route::get('/seccion-inicio', 'App\Http\Controllers\ConnectController@getSeccionInicio')->name('seccionInicio'); //2pagina inicio

Route::get('/registro', 'App\Http\Controllers\ConnectController@getRegistro')->name('registro'); //3 registro

//ruta creada para el dashboard



Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index')->middleware(['auth', 'verified'])->name('dashboard');

//ruta creada para retornar busqueda

Route::post('/dashboard/buscar', 'App\Http\Controllers\DashboardController@buscar')->middleware(['auth', 'verified'])->name('dashboard.buscar');


//Route original del dashboard
//Route::get('/dashboard', function () {
//    $datos = Tablas_Sistema::all();
//    return view('dashboard',compact('datos'));
//})->middleware(['auth', 'verified'])->name('dashboard');


Route::get('/editar-registro/{id}','App\Http\Controllers\DashboardController@editar-registro')->name('editar-registro');



//2 para retornar consultas a la db




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
//

//
//Route::get('/registro/{id}/edit', [RegistroController::class, 'edit'])->name('registro.edit');
//
//Route::put('/registro/{id}', [RegistroController::class, 'update'])->name('registro.update');



Route::get('dashboard/editar-registros/{tabla}/{id}/edit', [EditarRegistroController::class, 'edit'])->name('registro.edit');
Route::put('dashboard/editar-registros/{tabla}/{id}', [EditarRegistroController::class, 'update'])->name('registro.update');
