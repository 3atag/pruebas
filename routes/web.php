<?php

use App\Http\Controllers\RolController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('dashboard');
});

Route::post('/usuarios', [UserController::class, 'store'])->name('users.store');

Route::get('/usuarios', [UserController::class,'index'])->name('users.index');

Route::get('/usuarios/nuevo', [UserController::class, 'create'])->name('users.create');

Route::get('/usuarios/{user}', [UserController::class,'show'])->name('users.show');

Route::get('/roles', [RolController::class,'index'])->name('rols.index');





