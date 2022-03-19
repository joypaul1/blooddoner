<?php

use Illuminate\Support\Facades\Route;

 Route::group(['prefix' => '/order'], function (){
    Route::get('/','OrderController@index')->name('backend.order.index');
    Route::get('/show','OrderController@show')->name('backend.order.show');
    Route::get('/delete/{id}','OrderController@destroy')->name('backend.order.destroy');
    Route::get('/delivery','OrderController@delivery')->name('backend.order.delivery');

});
