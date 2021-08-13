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
Route::post('/change-password','Login\LoginController@change_password');
Route::get('/view-change-password','Login\LoginController@view_change_password');
Route::get('/logout','Login\LoginController@logout')->name('logout');

Route::prefix('user')->group(function () {
    Route::group(['middleware' => 'cekLoginUser'], function () {
        Route::get('/', 'User\DashboardController@index')->name('dashboard.user');

        Route::get('/list_materi','User\ListMateriController@index')->name('list_materi.view');
        Route::get('/list_materi/{id}','User\ListMateriController@detail')->name('list_materi','detail');
    
        Route::get('/user_package','User\UserPackageController@index')->name('user_package.view');
        Route::post('/user_package','User\UserPackageController@ambil_package')->name('user_package.post');
        
        Route::get('/kerjakan_soal','User\KerjakanSoalController@index')->name('kerjakan_soal.view');
        Route::get('/kerjakan_soal/kerjakan/{id}','User\KerjakanSoalController@kerjakan')->name('kerjakan_soal.detail');
        Route::post('/kerjakan_soal/jawab','User\KerjakanSoalController@jawab');
        Route::post('/kerjakan_soal/finish','User\KerjakanSoalController@finish');
    
        Route::get('/sudah_dikerjakan','User\SudahDikerjakanController@index')->name('sudah_dikerjakan.view');
    });
});

Route::prefix('checker')->group(function () {

    Route::get('/', 'Checker\DashboardController@index')->name('dashboard.checker');

    Route::prefix('master-checker')->group(function(){
        Route::get('/','Checker\MasterCheckerController@index');
        Route::get('/detail/{id}','Checker\MasterCheckerController@detail');
        Route::get('/reset-password/{id}','Checker\MasterCheckerController@reset_password');
        Route::post('/store-update','Checker\MasterCheckerController@store_update');
        Route::delete('/delete/{id}','Checker\MasterCheckerController@delete');
    });

    Route::prefix('master-user')->group(function(){
        Route::get('/','Checker\MasterUserController@index');
        Route::get('/reset-password/{id}','Checker\MasterUserController@reset_password');
    });

    Route::get('/package','Checker\PackageSoalController@index')->name('package.view');
    Route::post('/package','Checker\PackageSoalController@add')->name('package.post');
    Route::get('/package/{id}','Checker\PackageSoalController@first')->name('package.first');
    Route::delete('/package/{id}','Checker\PackageSoalController@delete')->name('package.delete');

    Route::get('/master_soal','Checker\MasterSoalController@index')->name('soal.view');
    Route::get('/master_soal/{id}','Checker\MasterSoalController@goPackage')->name('soal.goPackage');
    Route::get('/master_soal/{id}/{type}','Checker\MasterSoalController@goCreate')->name('soal.goCreate');
    Route::post('/master_soal','Checker\MasterSoalController@addSoal')->name('soal.post');
    Route::get('/master_soal/create/{id}/{type}','Checker\MasterSoalController@editSoal')->name('soal.edit');
    Route::delete('/master_soal/delete/{id}','Checker\MasterSoalController@delete');

    Route::get('/list_package','Checker\ListPackageController@index')->name('listpack.view');

    Route::get('/publish_package','Checker\PublishPackageController@index')->name('publish.view');
    Route::post('/publish_package','Checker\PublishPackageController@publish')->name('publish.publish');
    route::get('/publish_package/{id}','Checker\PublishPackageController@first')->name('publish.first');
    Route::delete('/publish_package/{id}','Checker\PublishPackageController@delete')->name('publish.delete');

    Route::get('/buat_materi','Checker\BuatMateriController@index')->name('buat_materi.view');
    Route::post('/buat_materi','Checker\BuatMateriController@add_update')->name('buat_materi.post');
    Route::get('/buat_materi/{id}','Checker\BuatMateriController@first')->name('buat_materi.first');
    Route::delete('/buat_materi/{id}','Checker\BuatMateriController@delete');

    Route::prefix('checking')->group(function(){
        Route::get('/lihat_berkas','Checker\LihatBerkasController@index');
        Route::get('/lihat_berkas/detail/{id}','Checker\LihatBerkasController@detail');
        Route::post('/lihat_berkas/persetujuan','Checker\LihatBerkasController@verifikasi_gagal');
        Route::post('/verifikasi_berhasil','Checker\LihatBerkasController@verifikasi_berhasil');
    });

    Route::prefix('daftar-ujian')->group(function(){
        Route::get('/','Checker\DaftarUjianController@index');
        Route::post('/ambil-package','Checker\DaftarUjianController@ambil_package');
    });
    
    Route::prefix('kerjakan-ujian')->group(function(){
        Route::get('/','Checker\KerjakanUjianController@index');
        Route::get('/kerjakan_soal/kerjakan/{id}','Checker\KerjakanUjianController@kerjakan');
        Route::post('/kerjakan_soal/jawab','Checker\KerjakanUjianController@jawab');
        Route::post('/kerjakan_soal/finish','Checker\KerjakanUjianController@finish');
    });

    Route::prefix('sudah-ujian')->group(function(){
        Route::get('/','Checker\SudahUjianController@index');
    });

    Route::prefix('laporan-ujian')->group(function(){
        Route::get('/','Checker\LaporanUjianController@index');
        Route::get('/detail-hasil/{package_id}','Checker\LaporanUjianController@detail');
        Route::get('/cetak-pdf/{package_id}','Checker\LaporanUjianController@cetak_pdf');
    });
});