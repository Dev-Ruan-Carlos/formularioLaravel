<?php

use App\Http\Controllers\CadastroController;
use App\Http\Controllers\FormularioController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', [LoginController::class, 'index'])->name('login');

Route::prefix('cadastro')->group(function() {
    Route::get('/', [CadastroController::class, 'index'])->name('cadastro');
    Route::post('gravar', [CadastroController::class, 'gravar'])->name('cadastro.gravar');
});

Route::prefix('login')->group(function() {
    Route::get('/', [LoginController::class, 'index'])->name('login.get');
    Route::post('entrar', [LoginController::class, 'entrar'])->name('login.entrar');
    Route::get('consultacnpj', [LoginController::class, 'consultacnpj'])->name('login.consultacnpj');
    // Route::get('sair', 'LoginController@sair')->name('login.sair');
});

Route::prefix('formulario')->group (function() {
    Route::get('/', [FormularioController::class, 'index'])->name('formulario');
    Route::get('resultadoresumo', [FormularioController::class, 'resultadoresumo'])->name('resultadoresumo.get');
    Route::post('resultadoresumo', [FormularioController::class, 'resultadoresumo'])->name('resultadoresumo.post');
    Route::post('resultado', [FormularioController::class, 'resultado'])->name('resultado');
});