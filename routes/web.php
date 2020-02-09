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

Route::get('/home', 'HomeController@index');

Route::get('/services', 'ServicesController@index');

Route::get('/services', 'ServicesController@services');
/*Route::get('/home', function () {
    return view('home');
});*/

//dynamic routes
/*Route::get('users/{id}', function ($id) {
    return 'This is user '. $id;
});*/





