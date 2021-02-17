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

Route::view('/','user.ambil-package.index');
// Route::get('/','Login\LoginController@index');
Route::post('/login','Login\LoginController@actionLogin')->name('login.post');
Route::post('/register','Login\LoginController@actionRegister')->name('register.post');

Route::prefix('admin')->group(function () {

	Route::get('/', 'Admin\DashboardController@index')->name('dashboard.admin');

    Route::get('package','Admin\PackageSoalController@index')->name('package.view');
    Route::post('package','Admin\PackageSoalController@add')->name('package.post');
    Route::get('package/{id}','Admin\PackageSoalController@first')->name('package.first');
    Route::delete('package/{id}','Admin\PackageSoalController@delete')->name('package.delete');

    Route::get('master_soal','Admin\MasterSoalController@index')->name('soal.view');
    Route::get('master_soal/{id}','Admin\MasterSoalController@goPackage')->name('soal.goPackage');
    Route::get('master_soal/create/{id}','Admin\MasterSoalController@goCreate')->name('soal.goCreate');
    Route::post('master_soal','Admin\MasterSoalController@addSoal')->name('soal.post');

});