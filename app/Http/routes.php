<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group(['prefix' => '/'], function(){
    Route::get('/', 'HomeController@index');
    Route::get('/news', 'HomeController@news');
    Route::get('/blog', 'HomeController@blog');
    Route::get('/faq', 'HomeController@faq');
    Route::get('/rules', 'HomeController@rules');
    Route::get('/support', 'HomeController@support');
    Route::get('/advertise', 'HomeController@advertise');
    Route::get('/press', 'HomeController@press');
});
Route::group(['prefix' => 'board'], function(){
    Route::get('{board}', 'BoardController@index');
    Route::get('{board}/thread/{thread}', 'BoardController@show');
});

Route::group(['prefix' => 'thread'], function(){
    Route::post('new/{board}', 'ThreadController@store');
    Route::post('new-comment/{thread}', 'ThreadController@comment');
});
