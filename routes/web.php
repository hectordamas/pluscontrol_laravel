<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/solicitud', function(){
    return view('publico.formularioDeSolicitud');
});

Route::post('/enviarSolicitud', [App\Http\Controllers\FormController::class, 'submit']);

Route::get('/eliminar-cuenta', function() { return view('eliminarCuenta'); });

Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function () {

    Route::get('esps', [App\Http\Controllers\EspController::class, 'index']);
    Route::post('esps/renew', [App\Http\Controllers\EspController::class, 'renew']);
    Route::get('esps/downloadReceipt/{id}', [App\Http\Controllers\EspController::class, 'downloadReceipt'])->name('downloadReceipt');
    Route::post('/uploadProof/{id}', [App\Http\Controllers\EspController::class, 'uploadProof'])->name('uploadProof');
    Route::get('esps/create', [App\Http\Controllers\EspController::class, 'create']);
    Route::post('esps/store', [App\Http\Controllers\EspController::class, 'store']);
    Route::post('esps/{id}/update', [App\Http\Controllers\EspController::class, 'update']);
    Route::get('esps/{id}/edit', [App\Http\Controllers\EspController::class, 'edit']);
    Route::post('esps/{id}/destroy', [App\Http\Controllers\EspController::class, 'destroy']);
    Route::get('esps/{id}/show', [App\Http\Controllers\EspController::class, 'show']);

    Route::get('users', [App\Http\Controllers\UsersController::class, 'index']);
    Route::get('users/create', [App\Http\Controllers\UsersController::class, 'create']);
    Route::post('users/store', [App\Http\Controllers\UsersController::class, 'store']);
    Route::get('users/{id}/edit', [App\Http\Controllers\UsersController::class, 'edit']);
    Route::post('users/{id}/update', [App\Http\Controllers\UsersController::class, 'update']);
    Route::post('users/{id}/destroy', [App\Http\Controllers\UsersController::class, 'destroy']);
    Route::get('users/{id}/show', [App\Http\Controllers\UsersController::class, 'show']);
});