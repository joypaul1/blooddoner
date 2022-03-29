<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'DashboardController@index')->name('backend.dashboard.index');

// Brands
Route::group(['prefix' => 'admins'], function () {
    Route::get('/', 'AdminController@index')
        ->name('backend.admins.index');
    Route::get('/create', 'AdminController@create')
        ->name('backend.admins.create');
    Route::get('/edit/{admin}', 'AdminController@edit')
        ->name('backend.admins.edit');

    // non view
    Route::get('/destroy/{admin}', 'AdminController@destroy')
        ->name('backend.admins.destroy');
    Route::post('/store', 'AdminController@store')
        ->name('backend.admins.store');
    Route::post('/update/{admin}', 'AdminController@update')
        ->name('backend.admins.update');
});
