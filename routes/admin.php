<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AdminRolController;
use App\Http\Controllers\Admin\AdminUserdController;
use App\Http\Controllers\Admin\AdminBitacoraController;
use App\Http\Controllers\Admin\AdminDashboardController;

route::resource('/',AdminDashboardController::class)->names('admin.principal');
route::resource('/bitacora',AdminBitacoraController::class)->names('admin.bitacora');
route::resource('/users',AdminUserdController::class)->names('admin.user');
route::resource('/roles',AdminRolController::class)->names('admin.roles');