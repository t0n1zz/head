<?php

use Illuminate\Http\Request;


Route::group(['prefix' => 'auth'], function ($router) {
    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
});


Route::group(['middleware'=>'jwt.auth'],function(){

    // user
    Route::get('/user', 'UserController@index');
    Route::get('/user/create', 'UserController@create');
    Route::post('/user/store', 'UserController@store');
    Route::get('/user/edit/{id}', 'UserController@edit');
    Route::post('/user/update/{id}', 'UserController@update');
    Route::post('/user/updateStatus/{id}', 'UserController@updateStatus');
    Route::post('/user/updateResetPassword/{id}', 'UserController@updateResetPassword');
    Route::post('/user/updatePassword/{id}', 'UserController@updatePassword');
    Route::delete('/user/{id}', 'UserController@destroy');

});