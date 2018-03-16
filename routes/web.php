<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/map', 'PagesController@map');

Route::get('/map/getGeoJSON', 'PagesController@getGeoJSON');

Route::get('/list', 'PagesController@list');

Route::get('/settings', 'PagesController@settings');

Route::get('/settings/new-user', 'PagesController@newUser');
