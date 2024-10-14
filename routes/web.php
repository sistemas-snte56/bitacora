<?php

use App\Http\Controllers\BitacoraController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TemaController;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\DelegacionController;

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

// Route::get('/', [RegistroController::class, 'index'])->name('registro');
//route::resource('/',RegistroController::class)->names('registro');



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    route::get('/bitacora/status',[BitacoraController::class, 'UpdateStatusSalida'])->name('bitacora.status');
    route::resource('/bitacora',BitacoraController::class)->names('bitacora');
});
