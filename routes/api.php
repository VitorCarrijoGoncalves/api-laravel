<?php

use Illuminate\Support\Facades\Route;

//Route::get('clientes', 'Api\ClienteApiController@index');

// Rota de clientes
Route::get('clientes/{id}/filme-alugados', 'Api＼ClienteController@alugados');
Route::get('clientes/{id}/documento', 'Api＼ClienteController@documento');
Route::get('clientes/{id}/telefone', 'Api＼ClienteController@telefone');
Route::apiResource('clientes', 'Api＼ClienteApiController');

// Rota de documentos de clientes
Route::get('documento/{id}/cliente', 'Api＼DocumentoApiController@cliente');
Route::apiResource('documento', 'Api＼DocumentoApiController');

// Rota de telefone de clientes
Route::get('telefone/{id}/cliente', 'Api＼TelefoneApiController@cliente');
Route::apiResource('telefone', 'Api＼TelefoneApiController');

// Rota de filmes
Route::apiResource('filme', 'Api＼FilmeApiController');