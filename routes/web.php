<?php

use App\Http\Controllers\DriverController;
use App\Http\Controllers\GarbageController;
use App\Http\Controllers\NewDriverController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChartController;

// Registering drivers
Route::get('/', [DriverController::class, 'index']);
Route::get('/edit/{id}', [DriverController::class, 'edit']);
Route::get('/show/{id}', [DriverController::class, 'show']);
Route::get('/create', [DriverController::class, 'create']);
Route::get('/delete/{id}', [DriverController::class, 'destroy']);
Route::post('/store', [DriverController::class, 'store']);
Route::post('/update/{id}', [DriverController::class, 'update']);

// Registering garbage info
Route::get('/garbage', [GarbageController::class, 'index']);
Route::get('/editg/{id}', [GarbageController::class, 'editg']);
Route::get('/showg/{id}', [GarbageController::class, 'showg']);
Route::get('/createg', [GarbageController::class, 'createg']);
Route::get('/deleteg/{id}', [GarbageController::class, 'destroyg']);
Route::post('/storeg', [GarbageController::class, 'storeg']);
Route::post('/updateg/{id}', [GarbageController::class, 'updateg']);

// Assigning drivers to garbage
Route::get('/drivers', [NewDriverController::class, 'index'])->name('drivers.index');
Route::post('/assign-driver', [NewDriverController::class, 'assignDriver'])->name('drivers.assignDriver');
Route::middleware('web')->post('/assign-driver', [NewDriverController::class, 'assignDriver'])->name('drivers.assignDriver');

//chart

Route::get('/chart', [ChartController::class, 'index']);

