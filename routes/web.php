<?php

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();

Route::get('/denuncias', 'DenunciaController@index');
