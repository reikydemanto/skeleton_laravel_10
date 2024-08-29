<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', 'ExampleController@index');
Route::get('/login', 'AuthenticationController@index_login');

Route::get('/dashboard', 'DashboardController@index');
Route::get('/add-mahasiswa', 'DashboardController@index_add_edit');
Route::get('/edit-mahasiswa/{nrp}', 'DashboardController@index_add_edit');
Route::post('/add-mahasiswa/new', 'DashboardController@add_mahasiswa');
Route::post('/edit_mahasiswa', 'DashboardController@edit_mahasiswa');
Route::get('/delete-mahasiswa/{nrp}', 'DashboardController@delete_mahasiswa');
