<?php

use App\Http\Controllers\ServiceController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [ServiceController::class,'index'])->name('index');

Route::post('/service', [ServiceController::class,'service'])->name('service');
Route::post('/service/start', [ServiceController::class,'start'])->name('service.start');
Route::post('/service/stop', [ServiceController::class,'stop'])->name('service.stop');
Route::post('/service/restart', [ServiceController::class,'restart'])->name('service.restart');

Route::post('/service/addAll',[ServiceController::class,'addAllServices'])->name('service.addAll');
