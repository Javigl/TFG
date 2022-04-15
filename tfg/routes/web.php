<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', function () {
    $user = Auth::user();
    if($user){
        if($user->admin){
            return redirect('/admin');
        }
        return redirect('/user');
    }
    return redirect('/inicio');
});

Route::get('/inicio', function () {
    return view('inicio');
});

Route::middleware('user')->group(function(){
    Route::get('/user',[App\Http\Controllers\UserController::class, 'viajes']);
    Route::get('/viajes',[App\Http\Controllers\UserController::class, 'viajes']);
    Route::get('/reservarViaje/{id}', [App\Http\Controllers\UserController::class, 'confirmarReservaViaje']);
    Route::post('/reservarViaje/{id}', [App\Http\Controllers\UserController::class, 'reservarViaje']);
    Route::get('/cancelarViaje/{id}', [App\Http\Controllers\UserController::class, 'confirmarCancelacionViaje']);
    Route::post('/cancelarViaje/{id}', [App\Http\Controllers\UserController::class, 'cancelarViaje']);
    Route::get('/alquileres',[App\Http\Controllers\UserController::class, 'alquileres']);
    Route::get('/misalquileres',[App\Http\Controllers\UserController::class, 'misalquileres']);
    Route::get('/misviajes',[App\Http\Controllers\UserController::class, 'misviajes']);
    Route::get('/valoraciones',[App\Http\Controllers\UserController::class, 'valoraciones']);
    Route::get('/saldo',[App\Http\Controllers\UserController::class, 'formAddSaldo']);
    Route::post('/saldo',[App\Http\Controllers\UserController::class, 'addSaldo']);
});

Route::middleware('admin')->group(function(){
    Route::get('/admin', [App\Http\Controllers\AdminController::class, 'menu']);
});

