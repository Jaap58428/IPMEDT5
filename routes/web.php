<?php

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'PagesController@map');

Route::get('/settings', 'PagesController@settings');

Route::get('/settings/new-user', 'PagesController@newUser');

Route::resource('buckets', 'BucketsController');
