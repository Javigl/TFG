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
    Route::get('/perfil/{id}',[App\Http\Controllers\UserController::class, 'perfil']);
    Route::get('/user',[App\Http\Controllers\UserController::class, 'viajes']);
    Route::get('/viajes',[App\Http\Controllers\UserController::class, 'viajes']);
    Route::get('/misviajes',[App\Http\Controllers\UserController::class, 'misviajes']);
    Route::get('/nuevoViaje',[App\Http\Controllers\UserController::class, 'formNuevoViaje']);
    Route::post('/nuevoViaje',[App\Http\Controllers\UserController::class, 'nuevoViaje']);
    Route::get('/reservarViaje/{id}', [App\Http\Controllers\UserController::class, 'confirmarReservaViaje']);
    Route::post('/reservarViaje/{id}', [App\Http\Controllers\UserController::class, 'reservarViaje']);
    Route::get('/cancelarViaje/{id}', [App\Http\Controllers\UserController::class, 'confirmarCancelacionViaje']);
    Route::post('/cancelarViaje/{id}', [App\Http\Controllers\UserController::class, 'cancelarViaje']);
    Route::get('/eliminarViaje/{id}', [App\Http\Controllers\UserController::class, 'confirmarEliminacionViaje']);
    Route::post('/eliminarViaje/{id}', [App\Http\Controllers\UserController::class, 'eliminarViaje']);
    Route::get('/alquileres',[App\Http\Controllers\UserController::class, 'alquileres']);
    Route::get('/misalquileres',[App\Http\Controllers\UserController::class, 'misAlquileres']);
    Route::get('/detallesAlquiler/{id}',[App\Http\Controllers\UserController::class, 'detallesAlquiler']);
    Route::get('/nuevoAlquiler',[App\Http\Controllers\UserController::class, 'formNuevoAlquiler']);
    Route::post('/nuevoAlquiler',[App\Http\Controllers\UserController::class, 'nuevoAlquiler']);
    Route::get('/reservarAlquiler/{id}',[App\Http\Controllers\UserController::class, 'confirmarReservaAlquiler']);
    Route::post('/reservarAlquiler/{id}',[App\Http\Controllers\UserController::class, 'reservaAlquiler']);
    Route::get('/cancelarAlquiler/{id}', [App\Http\Controllers\UserController::class, 'confirmarCancelacionAlquiler']);
    Route::post('/cancelarAlquiler/{id}', [App\Http\Controllers\UserController::class, 'cancelarAlquiler']);
    Route::get('/eliminarAlquiler/{id}', [App\Http\Controllers\UserController::class, 'confirmarEliminacionAlquiler']);
    Route::post('/eliminarAlquiler/{id}', [App\Http\Controllers\UserController::class, 'eliminarAlquiler']);
    Route::get('/misviajes',[App\Http\Controllers\UserController::class, 'misviajes']);
    Route::get('/valorar/{id}',[App\Http\Controllers\UserController::class, 'formValorar']);
    Route::post('/valorar/{id}',[App\Http\Controllers\UserController::class, 'guardarValoracion']);
    Route::get('/valoraciones/{id}',[App\Http\Controllers\UserController::class, 'listarValoraciones']);
    Route::get('/eliminarValoracion/{id}', [App\Http\Controllers\UserController::class, 'confirmarEliminacionValoracion']);
    Route::post('/eliminarValoracion/{id}', [App\Http\Controllers\UserController::class, 'eliminarValoracion']);
    Route::get('/saldo',[App\Http\Controllers\UserController::class, 'formAddSaldo']);
    Route::post('/saldo',[App\Http\Controllers\UserController::class, 'addSaldo']);

});

Route::middleware('admin')->group(function(){
    Route::get('/admin', [App\Http\Controllers\AdminController::class, 'menu']);
    Route::get('/bloquearUsuario/{id}', [App\Http\Controllers\AdminController::class, 'bloquearUsuario']);
    Route::get('/habilitarUsuario/{id}', [App\Http\Controllers\AdminController::class, 'habilitarUsuario']);
    Route::get('/administrarViajes', [App\Http\Controllers\AdminController::class, 'viajes']);
    Route::get('/eliminarViajeAdmin/{id}', [App\Http\Controllers\AdminController::class, 'eliminarViaje']);
    Route::get('/administrarValoraciones', [App\Http\Controllers\AdminController::class, 'valoraciones']);
    Route::get('/eliminarValoracionAdmin/{id}', [App\Http\Controllers\AdminController::class, 'eliminarValoracion']);
});

