<?php

use Illuminate\Support\Facades\Route;

//Route::get('clientes', 'Api\ClienteApiController@index');

Route::get('clientes/{id}/documento', 'Api/ClienteApiController@documento');
Route::get('clientes/{id}/telefone', 'Api/ClienteApiController@telefone');
Route::apiResource('clientes', 'Api/ClienteApiController');

Route::get('documento/{id}/cliente', 'Api/DocumentoApiController@cliente');
Route::apiResource('documento', 'Api/DocumentoApiController');

Route::get('telefone/{id}/cliente', 'Api/TelefoneApiController@cliente');
Route::apiResource('telefone', 'Api/TelefoneApiController');