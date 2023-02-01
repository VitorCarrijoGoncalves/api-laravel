<?php

use Illuminate\Routing\Route;

//Route::get('clientes', 'Api\ClienteApiController@index');

$this->apiResource('clientes', 'Api/ClienteApiController');