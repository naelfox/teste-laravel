<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\VendaController;
use App\Http\Controllers\VendaProdutoController;
use Illuminate\Support\Facades\Route;


Route::prefix('admin')->group(function () {

    Route::resource('produtos', ProdutoController::class);
    Route::resource('clientes', ClienteController::class);
    Route::resource('vendas', VendaController::class);
    Route::resource('venda.produtos', VendaProdutoController::class)->parameters([
        'produtos' => 'vendaProduto',
    ])->only('create', 'store', 'destroy');

    // Route::delete('venda.produtos/{vendaProduto}', [VendaProdutoController::class, 'delete'])->name('venda.produtos.destroy');

});
