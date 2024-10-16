<?php

use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

route::resource('/',UserController::class)->names('admin.bitacora');
