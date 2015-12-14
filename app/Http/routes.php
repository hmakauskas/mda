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

Route::get('/', function () {   

	if(\Request::get('language')){
		$this->app->setLocale(\Request::get('language'));
		return response()->view('welcome')->withCookie(cookie()->forever('language', \Request::get('language')));
	}
	else{
		return view('welcome');	
	}
});

Route::get('/home', function () {
    return view('welcome');
});

// Authentication Routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');
Route::get('/loginGoogle', 'GoogleLoginController@loginWithGoogle');

// Registration Routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

Route::get('/fiscalDocument', 'fiscalDocumentController@index');
Route::get('/fiscalDocument/create', 'fiscalDocumentController@create');
Route::get('/fiscalDocument/{fd}/edit', 'fiscalDocumentController@edit');
Route::get('/fiscalDocument/{fd}/show', 'fiscalDocumentController@show');
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

Route::get('/joincosts', 'LinkFDtoCostsController@index');
Route::post('/joincosts', 'LinkFDtoCostsController@store');

Route::get('/company', 'CompanyController@index');
Route::get('/company/create', 'CompanyController@create');
Route::get('/company/{fd}/edit', 'CompanyController@edit');
Route::put('/company', 'CompanyController@update');
Route::post('/company', 'CompanyController@store');
Route::delete('/company/{company}', 'CompanyController@destroy');

Route::get('/supplier', 'SupplierController@index');
Route::get('/supplier/create', 'SupplierController@create');
Route::get('/supplier/{fd}/edit', 'SupplierController@edit');
Route::put('/supplier', 'SupplierController@update');
Route::post('/supplier', 'SupplierController@store');
Route::delete('/supplier/{supplier}', 'SupplierController@destroy');

Route::get('/supplierbranch', 'SupplierBranchController@index');
Route::get('/supplierbranch/create', 'SupplierBranchController@create');
Route::get('/supplierbranch/{fd}/edit', 'SupplierBranchController@edit');
Route::put('/supplierbranch', 'SupplierBranchController@update');
Route::post('/supplierbranch', 'SupplierBranchController@store');
Route::delete('/supplierbranch/{supplier}', 'SupplierBranchController@destroy');

Route::get('/marketingChannel', 'MarketingChannelController@index');
Route::get('/marketingChannel/create', 'MarketingChannelController@create');
Route::get('/marketingChannel/{marketingChannel}/edit', 'MarketingChannelController@edit');
Route::put('/marketingChannel', 'MarketingChannelController@update');
Route::post('/marketingChannel', 'MarketingChannelController@store');
Route::delete('/marketingChannel/{marketingChannel}', 'MarketingChannelController@destroy');

Route::get('/category', 'CategoryController@index');
Route::get('/category/create', 'CategoryController@create');
Route::get('/category/{category}/edit', 'CategoryController@edit');
Route::put('/category', 'CategoryController@update');
Route::post('/category', 'CategoryController@store');
Route::delete('/category/{category}', 'CategoryController@destroy');

Route::get('/fiscalDocumentStatus', 'FiscalDocumentStatusController@index');
Route::get('/fiscalDocumentStatus/create', 'FiscalDocumentStatusController@create');
Route::get('/fiscalDocumentStatus/{fiscalDocumentStatus}/edit', 'FiscalDocumentStatusController@edit');
Route::put('/fiscalDocumentStatus', 'FiscalDocumentStatusController@update');
Route::post('/fiscalDocumentStatus', 'FiscalDocumentStatusController@store');
Route::delete('/fiscalDocumentStatus/{fiscalDocumentStatus}', 'FiscalDocumentStatusController@destroy');

