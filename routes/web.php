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

// Auth
Route::get('/manage/auth/login', 'Manage\AuthController@login')->name('login');
Route::post('/manage/auth/login', 'Manage\AuthController@doLogin');
Route::get('/manage/auth/logout', 'Manage\AuthController@logout');
Route::post('/manage/auth/logout', 'Manage\AuthController@logout');

// Dashboard
Route::get('/manage/dashboard', 'Manage\DashboardController@index');

// Cars
Route::get('/manage/car', 'Manage\CarController@index');
Route::get('/manage/car/add', 'Manage\CarController@store');
Route::post('/manage/car/add', 'Manage\CarController@store');
Route::get('/manage/car/edit/{id}', 'Manage\CarController@store');
Route::post('/manage/car/edit/{id}', 'Manage\CarController@store');
Route::post('/manage/car/delete/{id}', 'Manage\CarController@delete');


// Sales
Route::get('/manage/sale', 'Manage\SaleController@index');