<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


// Not Authenticated
Route::group(['prefix' => '/', 'namespace' => 'Frontend'], function () {
    Route::get('/', 'HomeController@index');
    Route::get('/user-login', 'HomeController@login');
    Route::get('/user-registration', 'HomeController@registration');
    Route::get('/about-us', 'HomeController@aboutUs');

    Route::get('/getDivision', 'HomeController@division');
    Route::get('/getCity', 'HomeController@city');
    Route::get('/getPostCode', 'HomeController@getPostCode');
    Route::get('/donner-search', 'HomeController@donnerSearch');
});

// Authenticated
Route::group(['prefix' => '/', 'middleware' => ['auth'], 'namespace' => 'Frontend'], function () {
    Route::get('/protected', 'HomeController@protected'); // test purpose

    Route::get('/become-Donor', 'HomeController@profile');
    Route::post('/profile-save', 'HomeController@profileSave');
});
Route::get('logout', function(){
    Auth::logout();
    return back();
});
