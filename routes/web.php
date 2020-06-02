<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('login/index');
});


Route::resource('/unidade_medida','UnidadeMedidaController');
Route::resource('/itens','ItensController');
Route::resource('/produto','ProdutoController');