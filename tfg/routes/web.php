<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

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

Route::get('/user', function () {
    return view('user.menuUser');
});

Route::get('/admin', function () {
    return view('admin.menuAdmin');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
