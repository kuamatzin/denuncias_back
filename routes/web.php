<?php

use Carbon\Carbon;

Route::get('/', function () {
    return redirect('denuncias');
});
Auth::routes();

Route::resource('/denuncias', 'DenunciaController');

Route::get('/test', function(){
    $date = Carbon::createFromFormat('Y-m-d\TH:i:s.uT', '2017-04-26T17:14:07.597Z');
    dd($date);
});
