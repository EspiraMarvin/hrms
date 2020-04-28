<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('todos', 'TodosController');


//creating a quote
Route::post('/quote', [
    'uses' => 'QuoteController@postQuote'
]);

//getting a quote/ viewing
Route::get('/quotes', [
    'uses' => 'QuoteController@getQuotes'
]);

//updating a quote
Route::put('/quote/{id', [
    'uses' => 'QuoteController@putQuote'
]);

//Delete Quote
Route::delete('/quote/{id}', [
    'uses' => 'QuoteController@deleteQuote'
]);
