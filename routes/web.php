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

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/error-rol', function() {
	return view('errors.errorRol');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::group(['middleware' => 'auth'], function() {

	Route::group(['middleware' => 'role:admin|gestion'], function() {
		Route::resource('usuarios', \App\Http\Controllers\userController::class);
		Route::resource('vacunas', \App\Http\Controllers\vacunasController::class);
		Route::resource('centros', \App\Http\Controllers\centrosController::class);
		Route::resource('vacunatorios', \App\Http\Controllers\vacunatoriosController::class);
		Route::resource('asignaciones', \App\Http\Controllers\asignacionesController::class);
	});

	Route::group(['middleware' => 'role:enfermero'], function() {
		Route::resource('registrarVacunados', \App\Http\Controllers\registrarVacunadosController::class);
		Route::post('/buscar', [\App\Http\Controllers\registrarVacunadosController::class,"buscar"])->name("registrarVacunados.buscar");
	});
});
