<?php

Route::get('/', 'EditionsController@index');
Route::get('/editions/{id}/read', ['as' => 'editions.read', 'uses' => 'EditionsController@getRead']);
Route::get('/editions/{id}/download', ['as' => 'editions.download', 'uses' => 'EditionsController@getDownload']);
Route::resource('editions', 'EditionsController');