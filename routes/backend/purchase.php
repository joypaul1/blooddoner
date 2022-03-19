<?php

use Illuminate\Support\Facades\Route;

// Sources
Route::group(['prefix' => 'sources'], function () {
    Route::get('/', 'SourceController@index')
        ->name('backend.purchase.sources.index');
    Route::get('/create', 'SourceController@create')
        ->name('backend.purchase.sources.create');
    Route::get('/edit/{source}', 'SourceController@edit')
        ->name('backend.purchase.sources.edit');

    // non view
    Route::get('/destroy/{source}', 'SourceController@destroy')
        ->name('backend.purchase.sources.destroy');
    Route::post('/store', 'SourceController@store')
        ->name('backend.purchase.sources.store');
    Route::post('/update/{source}', 'SourceController@update')
        ->name('backend.purchase.sources.update');
});

// Purchases
Route::group(['prefix' => 'purchases'], function () {
    Route::get('/', 'PurchaseController@index')
        ->name('backend.purchase.purchases.index');
    Route::get('/create', 'PurchaseController@create')
        ->name('backend.purchase.purchases.create');
    Route::get('/edit/{id}', 'PurchaseController@edit')
        ->name('backend.purchase.purchases.edit');

    // non view
    Route::get('/destroy/{id}', 'PurchaseController@destroy')
        ->name('backend.purchase.purchases.destroy');
    Route::post('/store', 'PurchaseController@store')
        ->name('backend.purchase.purchases.store');
    Route::post('/update/{id}', 'PurchaseController@update')
        ->name('backend.purchase.purchases.update');
});
