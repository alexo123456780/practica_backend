<?php

use App\Http\Controllers\auth\LoginController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('auth')->group(function(){

    Route::post('login', [LoginController::class,'login']);

});
