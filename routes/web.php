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


Route::get('/home', 'HomeController@index');

Route::resource('companies', 'CompanyController');

Route::resource('exchanges', 'ExchangeController');

Route::resource('stockPrices', 'StockPriceController');

Route::resource('stocktypes', 'StocktypeController');

Route::get('/eqscompany/exchangedata', 'EqscompanyController@exchangeData');
Route::get('/eqscompany/companystockoverview', 'EqscompanyController@companyStockOverview');
Route::get('/eqscompany/highestmarketprice', 'EqscompanyController@highestMarketPrice');

