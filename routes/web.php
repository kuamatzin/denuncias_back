<?php

Route::get('/', function () {
    return redirect('denuncias');
});
Auth::routes();

Route::resource('/denuncias', 'DenunciaController');
