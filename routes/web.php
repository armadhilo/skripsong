<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/','Login\LoginController@index');
Route::post('/login','Login\LoginController@actionLogin')->name('login.post');
Route::post('/register','Login\LoginController@actionRegister')->name('register.post');

Route::prefix('admin')->group(function () {

	Route::get('/', 'Admin\DashboardController@index')->name('dashboard.admin');

    Route::get('master_soal','Admin\MasterSoalController@index');
    Route::post('master_soal','Admin\MasterSoalController@addSoal')->name('soal.post');

});