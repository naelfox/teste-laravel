<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\VendaController;
use App\Http\Controllers\VendaProdutoController;
use Illuminate\Support\Facades\Route;


// Route::view('/login', 'auth.login');
Route::match(['get', 'post'], '/', [LoginController::class, 'index'])->name('login');

Route::middleware('auth')->prefix('admin')->group(function () {

    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::resource('produtos', ProdutoController::class);
    Route::resource('clientes', ClienteController::class);
    Route::resource('vendas', VendaController::class);
    Route::resource('venda.produtos', VendaProdutoController::class)->only('create', 'store', 'destroy');

});
