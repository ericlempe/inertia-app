<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
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

Route::redirect('/', '/login');

Route::middleware('guest')->group(function () {
    Route::get('login', [AuthController::class, 'login'])->name('login');
    Route::get('registrar', [AuthController::class, 'registrar'])->name('registrar');
});

Route::post('/login', [AuthController::class, 'logar']);
Route::post('/registrar', [AuthController::class, 'cadastrar']);
Route::post('/logout', [AuthController::class, 'logout']);


Route::middleware('auth')->group(function () {

    Route::get('/home', [HomeController::class, 'index'])->name('home');
});
