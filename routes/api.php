<?php

use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\auth\RegistroController;
use App\Http\Middleware\GuardMiddleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('auth')->group(function(){

    Route::post('login', [LoginController::class,'login']);
    Route::post('registro/{iid}', [RegistroController::class,'registro'])->middleware([GuardMiddleware::class]);

});

