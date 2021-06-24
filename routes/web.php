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
Route::post('login','Login\LoginController@actionLogin')->name('login.post');
Route::post('register','Login\LoginController@actionRegister')->name('register.post');
Route::get('logout','Login\LoginController@logout')->name('logout');

Route::prefix('admin')->group(function () {
    Route::group(['middleware' => 'cekLoginAdmin'], function () {
        Route::get('/', 'Admin\DashboardController@index')->name('dashboard.admin');

        Route::get('package','Admin\PackageSoalController@index')->name('package.view');
        Route::post('package','Admin\PackageSoalController@add')->name('package.post');
        Route::get('package/{id}','Admin\PackageSoalController@first')->name('package.first');
        Route::delete('package/{id}','Admin\PackageSoalController@delete')->name('package.delete');

        Route::get('master_soal','Admin\MasterSoalController@index')->name('soal.view');
        Route::get('master_soal/{id}','Admin\MasterSoalController@goPackage')->name('soal.goPackage');
        Route::get('master_soal/{id}/{type}','Admin\MasterSoalController@goCreate')->name('soal.goCreate');
        Route::post('master_soal','Admin\MasterSoalController@addSoal')->name('soal.post');
        Route::get('master_soal/create/{id}/{type}','Admin\MasterSoalController@editSoal')->name('soal.edit');
        Route::delete('master_soal/delete/{id}','Admin\MasterSoalController@delete');

        Route::get('list_package','Admin\ListPackageController@index')->name('listpack.view');

        Route::get('publish_package','Admin\PublishPackageController@index')->name('publish.view');
        Route::post('publish_package','Admin\PublishPackageController@publish')->name('publish.publish');
        route::get('publish_package/{id}','Admin\PublishPackageController@first')->name('publish.first');
        Route::delete('publish_package/{id}','Admin\PublishPackageController@delete')->name('publish.delete');

        Route::get('buat_materi','Admin\BuatMateriController@index')->name('buat_materi.view');
        Route::post('buat_materi','Admin\BuatMateriController@add_update')->name('buat_materi.post');
        Route::get('buat_materi/{id}','Admin\BuatMateriController@first')->name('buat_materi.first');
        Route::delete('buat_materi/{id}','Admin\BuatMateriController@delete');

        Route::get('hasil','Admin\HasilController@index')->name('hasil.view');
    });
});

Route::prefix('user')->group(function () {
    Route::group(['middleware' => 'cekLoginUser'], function () {
        Route::get('/', 'User\DashboardController@index')->name('dashboard.user');

        Route::get('list_materi','User\ListMateriController@index')->name('list_materi.view');
        Route::get('list_materi/{id}','User\ListMateriController@detail')->name('list_materi','detail');
    
        Route::get('user_package','User\UserPackageController@index')->name('user_package.view');
        Route::post('user_package','User\UserPackageController@ambil_package')->name('user_package.post');
        
        Route::get('kerjakan_soal','User\KerjakanSoalController@index')->name('kerjakan_soal.view');
        Route::get('kerjakan_soal/kerjakan/{id}','User\KerjakanSoalController@kerjakan')->name('kerjakan_soal.detail');
        Route::post('kerjakan_soal/jawab','User\KerjakanSoalController@jawab');
        Route::post('kerjakan_soal/finish','User\KerjakanSoalController@finish');
    
        Route::get('sudah_dikerjakan','User\SudahDikerjakanController@index')->name('sudah_dikerjakan.view');
    });
});

Route::prefix('checker')->group(function () {

    Route::get('/', 'Checker\DashboardController@index')->name('dashboard.checker');

    Route::prefix('checking')->group(function(){
        Route::get('lihat_berkas','Checker\LihatBerkasController@index');
        Route::get('lihat_berkas/detail/{id}','Checker\LihatBerkasController@detail');
        Route::post('lihat_berkas/persetujuan','Checker\LihatBerkasController@verifikasi_gagal');
        Route::post('verifikasi_berhasil','Checker\LihatBerkasController@verifikasi_berhasil');
    });
    
});