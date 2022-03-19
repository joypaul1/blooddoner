<?php
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'area_division'], function () {
   Route::get('/', 'AreaDivisionController@index')
              ->name('backend.area.index');

   Route::get('/create/division', 'AreaDivisionController@create')
              ->name('backend.area.create-division');

   Route::post('/store/division', 'AreaDivisionController@store')
              ->name('backend.area.division.store');

   Route::get('/edit/division/{id}', 'AreaDivisionController@edit')
              ->name('backend.area.edit');

   Route::post('/update/division/{division}', 'AreaDivisionController@update')
              ->name('backend.area.division.update');

   Route::get('/destroy/division/{id}', 'AreaDivisionController@destroy')
              ->name('backend.area.destroy');
});



Route::group(['prefix' => 'city'], function () {
   Route::get('/', 'CityController@index')->name('backend.area.city.index');
   Route::get('/create', 'CityController@create')->name('backend.area.city.create');
   Route::post('/store', 'CityController@store')->name('backend.area.city.store');
   Route::get('/show/{id}', 'CityController@show')->name('backend.area.city.show');
   Route::post('/update/{id}', 'CityController@update')->name('backend.area.city.update');
   Route::get('/destroy/{id}', 'CityController@destroy')->name('backend.area.city.destroy');
   Route::get('/getCity/{id}', 'CityController@getCity')->name('backend.area.city.getCity');
});


Route::group(['prefix' => 'post_code'], function () {
    Route::get('/', 'PostCodeController@index')->name('backend.area.post_code.index');
    Route::get('/post/create', 'PostCodeController@create')->name('backend.area.post_code.create');
    Route::get('/postCode/getCity/{divId}', 'PostCodeController@getCity')->name('postCode.getCity');
    Route::post('/postCode/create/', 'PostCodeController@store')->name('backend.area.post_code.store');
    Route::get('/postCode/edit/{id}', 'PostCodeController@edit')->name('backend.area.post_code.edit');
    Route::post('/postCode/update/{id}', 'PostCodeController@update')->name('backend.area.post_code.update');
    Route::get('/postCode/destroy/{id}', 'PostCodeController@destroy')->name('backend.area.post_code.destroy');
    Route::get('/getPostCode/{id}', 'PostCodeController@getPostCode')->name('backend.area.post_code.getPostCode');
});
