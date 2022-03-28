<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


// Not Authenticated
Route::group(['prefix' => '/', 'namespace' => 'Frontend'], function () {
    Route::get('/', 'HomeController@index');
    Route::get('/user-login', 'HomeController@login');
    Route::get('/user-registration', 'HomeController@registration');
    Route::get('/about-us', 'HomeController@aboutUs');
});

// Authenticated
Route::group(['prefix' => '/', 'middleware' => ['auth'], 'namespace' => 'Frontend'], function () {
    Route::get('/protected', 'HomeController@protected'); // test purpose
});
Route::get('logout', function(){
    Auth::logout();
    return back();
});
