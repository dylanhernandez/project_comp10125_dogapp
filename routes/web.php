<?php

/*
|--------------------------------------------------------------------------
| StAuth10065: I Dylan Hernandez, 000307857 certify that this material is my original work. 
| No other person's work has been used without due acknowledgement. 
| I have not made my work available to anyone else.
|--------------------------------------------------------------------------
*/

Route::get('/', 'AboutController@showHome');
Route::get('/about', 'AboutController@showAbout');

Route::group(['prefix' => 'crud'], function () {
    Route::get('/', 'CrudController@crudRead');
    Route::get('/add', 'CrudController@crudCreate');
    Route::post('/add', 'CrudController@crudCreatePost');
    Route::get('/edit/{id}', 'CrudController@crudUpdate');
    Route::post('/edit/{id}', 'CrudController@crudUpdatePost');
    Route::get('/delete/{id}', 'CrudController@crudDelete');
});

Route::group(['prefix' => 'ajax'], function () {
    Route::get('/', 'AjaxController@showAjax');
    Route::get('/read', 'AjaxController@ajaxRead');
    Route::post('/add', 'AjaxController@ajaxCreate');
    Route::get('/edit/{id}', 'AjaxController@ajaxUpdate');
    Route::post('/edit/{id}', 'AjaxController@ajaxUpdatePost');
    Route::get('/delete/{id}', 'AjaxController@ajaxDelete');
});


