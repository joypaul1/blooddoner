<?php

use Illuminate\Support\Facades\Route;

// Offer page
Route::group(['prefix' => '/customer'], function (){
    Route::get('/','CustomerController@index')->name('backend.customer.index');
    Route::get('/show','CustomerController@show')->name('backend.customer.show');
    Route::get('/delete/{id}','CustomerController@destroy')->name('backend.customer.destroy');
});