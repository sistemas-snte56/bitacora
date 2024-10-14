<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TemaController;

Route::get('', function () {
    // route::resource('admin/delegaciones', DelegacionController::class)->names('delegacion');
});

route::resource('/temas', TemaController::class)->names('tema');

// Route::get('/', [RegistroController::class, 'index'])->name('registro');
//route::resource('/',RegistroController::class)->names('registro');



// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified',
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });
