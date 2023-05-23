<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticuloController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\LineaPedidoController;
use App\Http\Controllers\AdministradorController;
use App\Http\Controllers\AuxiliarController;
use App\Http\Controllers\OdontologoController;
use App\Http\Controllers\RecepcionistaController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

/*

Route::middleware(['auth', 'tipo_usuario:1,2,4'])->group(function () {
    Route::get('/odontologos/{odontologo}/edit', [OdontologoController::class, 'edit'])->name('odontologos.edit');
    Route::put('/odontologos/{odontologo}', [OdontologoController::class, 'update'])->name('odontologos.update');
    //Dos rutas que tienen además un middleware con un Policy para hilar fino
    Route::post('/proveedors/{proveedor}/attach-articulo', [ProveedorController::class, 'attach_articulo'])
        ->name('proveedors.attachArticulo')
        ->middleware('can:attach_articulo,proveedor');
    Route::delete('/proveedors/{proveedor}/detach-articulo/{articulo}', [ProveedorController::class, 'detach_articulo'])
        ->name('proveedors.detachArticulo')
        ->middleware('can:detach_articulo,proveedor');
});




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



*/

require __DIR__.'/auth.php';
// Route::middleware(['auth'])->group(function () {
    Route::resources([
        'proveedors' => ProveedorController::class,
        'articulos' => ArticuloController::class,
        'odontologos' => OdontologoController::class,
        'auxiliars' => AuxiliarController::class,
        'administradors' => AdministradorController::class,
        'recepcionistas' => RecepcionistaController::class,
        'pedidos' => PedidoController::class,
        'lineaPedidos' => LineaPedidoController::class,
    ]);

    Route::post('/proveedors/{proveedor}/attach-articulo', [ProveedorController::class, 'attach_articulo'])
        ->name('proveedors.attach_articulo');
    Route::delete('/proveedors/{proveedor}/detach_articulo/{articulo}', [ProveedorController::class, 'detach_articulo'])
        ->name('proveedors.detach_articulo');

    Route::post('/articulos/{articulo}/attach-proveedor', [ArticuloController::class, 'attach_proveedor'])
        ->name('articulos.attach_proveedor');
    Route::delete('/articulos/{articulo}/detach_proveedor/{proveedor}', [ArticuloController::class, 'detach_proveedor'])
        ->name('articulos.detach_proveedor');







    
// });
