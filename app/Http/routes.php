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

// Authentication Routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');
Route::get('/loginGoogle', 'GoogleLoginController@loginWithGoogle');

// Registration Routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('welcome');
});

Route::get('/fiscalDocument', 'fiscalDocumentController@index');
Route::get('/fiscalDocument/create', 'fiscalDocumentController@create');
Route::get('/fiscalDocument/{fd}/edit', 'fiscalDocumentController@edit');
Route::put('/fiscalDocument', 'fiscalDocumentController@update');
Route::post('/fiscalDocument', 'fiscalDocumentController@store');
Route::delete('/fiscalDocument/{fiscalDocument}', 'fiscalDocumentController@destroy');


Route::get('/cost', 'CostController@index');
Route::get('/cost/create', 'CostController@create');
Route::get('/cost/{cost}/edit', 'CostController@edit');
Route::put('/cost', 'CostController@update');
Route::post('/cost', 'CostController@store');
Route::delete('/cost/{cost}', 'CostController@destroy');

Route::get('/costStatus', 'CostStatusController@index');
Route::get('/costStatus/create', 'CostStatusController@create');
Route::get('/costStatus/{costStatus}/edit', 'CostStatusController@edit');
Route::put('/costStatus', 'CostStatusController@update');
Route::post('/costStatus', 'CostStatusController@store');
Route::delete('/costStatus/{costStatus}', 'CostStatusController@destroy');



