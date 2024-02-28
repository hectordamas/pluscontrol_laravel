<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\EspController;
use App\Http\Controllers\Api\EspLogsController;
use App\Http\Controllers\Api\UsersController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\IndexController;
use App\Http\Controllers\Api\TimerController;
use App\Http\Controllers\Api\NotificationController;
use App\Http\Controllers\Api\TicketController;

Route::post('storeEspData', [EspLogsController::class, 'store']);
Route::get('getDeviceInfo', [EspLogsController::class, 'getDeviceInfo']);
Route::post('getDeviceInfoInterval', [EspLogsController::class, 'getDeviceInfoInterval']);
Route::post("support", [TicketController::class, 'store']);

//Reportes por fecha
Route::post('getWeeklyReport', [IndexController::class, 'getWeeklyReport']);
Route::post('getMonthlyReport', [IndexController::class, 'getMonthlyReport']);
Route::post('getDailyReport', [IndexController::class, 'getDailyReport']);

//Notificaciones
Route::post('saveToken', [NotificationController::class, 'saveToken']);
Route::post('lowLevelNotification', [NotificationController::class, 'lowLevelNotification']);
Route::post('mediumLevelNotification', [NotificationController::class, 'mediumLevelNotification']);
Route::post('waterSupplyRestored', [NotificationController::class, 'waterSupplyRestored']);
Route::post('interruptedWaterSupply', [NotificationController::class, 'interruptedWaterSupply']);
Route::post('internalWaterSupplyRestored', [NotificationController::class, 'internalWaterSupplyRestored']);
Route::post('interruptedInternalWaterSupply', [NotificationController::class, 'interruptedInternalWaterSupply']);
Route::post('overflowAlert', [NotificationController::class, 'overflowAlert']);
Route::post('highPressure', [NotificationController::class, 'highPressure']);
Route::post('lowPressure', [NotificationController::class, 'lowPressure']);

//Actualizaciones
Route::get('getAppStoresVersion', [IndexController::class, 'getAppStoresVersion']);
Route::post('newDeviceData', [IndexController::class, 'newDeviceData']);

Route::group(['middleware' => 'auth:sanctum'], function(){
    Route::get('getIndexData', [IndexController::class, 'index']);

    //Usuarios
    Route::post('users/getUserData', [UsersController::class, 'show']);
    Route::post('users/usersList', [UsersController::class, 'index']);
    Route::post('users/create', [UsersController::class, 'store']);
    Route::post('users/edit', [UsersController::class, 'edit']);
    Route::post('users/update', [UsersController::class, 'update']);
    Route::post('users/associate', [UsersController::class, 'associate']);
    Route::post('users/updateProfile', [UsersController::class, 'updateProfile']);
    Route::post('users/searchUser', [UsersController::class, 'searchUser']);
    Route::post('users/destroy', [UsersController::class, 'destroy']);
    Route::post('users/updateAvatar', [UsersController::class, 'updateAvatar']);

    //Temporización
    Route::post('getTimersData', [TimerController::class, 'getTimersData']);
    Route::post('setTimers', [TimerController::class, 'setTimers']);
    Route::post('setControl', [TimerController::class, 'setControl']);

    Route::post('setDimensions', [TimerController::class, 'setDimensions']);
    Route::post('getDimensions', [TimerController::class, 'getDimensions']);

    //Esps
    Route::post("esps/update", [EspController::class, 'update']);
    Route::post("esps/edit", [EspController::class, 'edit']);
    
});

Route::group(['prefix' => 'auth'], function() {
    Route::post('/login', [AuthController::class, 'login']);

    Route::group(['middleware' => 'auth:sanctum'], function() {
        Route::post('/logout', [AuthController::class, 'logout']);
    });
});
