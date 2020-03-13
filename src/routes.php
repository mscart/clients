<?php


Route::group(['prefix'  =>  config('app.admin_prefix')], function () {

    Route::group(['middleware' => ['web','auth:admin']], function () {


            Route::post('/clients/getClients', '\MsCart\Clients\ClientsController@getClients')->name('galleries.getClients');
            Route::resource('/clients', '\MsCart\Clients\Controllers\ClientsController');




    });

});
