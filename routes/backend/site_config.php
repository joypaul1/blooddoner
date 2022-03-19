<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => '/site-config'], function () {
    Route::get('/info', 'SiteInfoController@index')->name('backend.site_config.info');
    Route::post('/info', 'SiteInfoController@update')->name('backend.site_config.info');
});

// about-us
Route::group(['prefix' => '/about-us'], function (){
   Route::get('/','AboutusController@create')->name('backend.site_config.about-us');
   Route::post('/update','AboutusController@update')->name('backend.site_config.about-us.update');
});

// banner
Route::group(['prefix' => '/banner'], function (){
	 Route::get('/','BannerController@index')->name('backend.site_config.banner.index');
	 Route::get('/create','BannerController@create')->name('backend.site_config.banner.create');
	 Route::get('/edit/{id}','BannerController@edit')->name('backend.site_config.banner.edit');
    Route::post('/store','BannerController@store')->name('backend.site_config.banner.store');
    Route::get('/delete/{banner}','BannerController@destroy')->name('backend.site_config.banner.destroy');
    Route::post('/update/{banner}','BannerController@update')->name('backend.site_config.banner.update');
});
// slider
Route::group(['prefix' => '/slider'], function (){
    Route::get('/','SliderController@index')->name('backend.site_config.slider.index');
    Route::get('/create','SliderController@create')->name('backend.site_config.slider.create');
    Route::get('/edit/{id}','SliderController@edit')->name('backend.site_config.slider.edit');
    Route::post('/store','SliderController@store')->name('backend.site_config.slider.store');
    Route::get('/delete/{slider}','SliderController@destroy')->name('backend.site_config.slider.destroy');
    Route::post('/update/{slider}','SliderController@update')->name('backend.site_config.slider.update');
});


// quick page
Route::group(['prefix' => '/quick-page'], function (){
    Route::get('/','QuickPageController@index')->name('backend.site_config.quick-page.index');
    Route::get('/create','QuickPageController@create')->name('backend.site_config.quick-page.create');
    Route::get('/edit/{id}','QuickPageController@edit')->name('backend.site_config.quick-page.edit');
    Route::post('/store','QuickPageController@store')->name('backend.site_config.quick-page.store');
    Route::get('/delete/{id}','QuickPageController@destroy')->name('backend.site_config.quick-page.destroy');
    Route::post('/update/{id}','QuickPageController@update')->name('backend.site_config.quick-page.update');

});

// Offer page
Route::group(['prefix' => '/offer'], function (){
    Route::get('/','OfferController@index')->name('backend.site_config.offer.index');
    Route::get('/create','OfferController@create')->name('backend.site_config.offer.create');
    Route::get('/edit/{id}','OfferController@edit')->name('backend.site_config.offer.edit');
    Route::post('/store','OfferController@store')->name('backend.site_config.offer.store');
    Route::get('/delete/{offer}','OfferController@destroy')->name('backend.site_config.offer.destroy');
    Route::post('/update/{offer}','OfferController@update')->name('backend.site_config.offer.update');

});






