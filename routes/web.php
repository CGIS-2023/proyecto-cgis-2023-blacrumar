<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticuloController;
use App\Http\Controllers\ProveedorController;

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


//Route::middleware(['auth'])->group(function () {
    Route::resources([
        'articulos' => ArticuloController::class,
        'proveedors' => ProveedorController::class,
        'odontologos' => OdontologoController::class,
        'auxiliars' => AuxiliarController::class,
    ]);

//Tanto los médicos como los administradores pueden editar el médico y trabajar con los medicamentos de las citas
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

require __DIR__.'/auth.php';
