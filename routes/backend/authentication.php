<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/sadmin/login', 'Auth\BackendLoginController@showLoginForm')->name('backend.login.form');
Route::post('/sadmin/login', 'Auth\BackendLoginController@login')->name('backend.login.confirm');
Route::post('/sadmin/logout', 'Auth\BackendLoginController@logout')->name('backend.logout');

Auth::routes();
