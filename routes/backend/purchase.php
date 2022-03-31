<?php

use Illuminate\Support\Facades\Route;

// Sources
Route::group(['prefix' => 'blood-request'], function () {
    Route::get('/', 'SourceController@index')
        ->name('backend.blood.index');
    Route::get('/create', 'SourceController@create')
        ->name('backend.purchase.sources.create');
    Route::get('/edit/{source}', 'SourceController@edit')
        ->name('backend.purchase.sources.edit');

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
