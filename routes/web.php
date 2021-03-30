<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

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

Route::get('/home', 'KtpController@indexuser')->name('home');
Route::get('/export/user', 'KtpController@exportuser');
route::get('laporan/user', "KtpController@pdfuser");

// Route::get('/indexuser', 'KtpController@indexuser');
// Route::middleware('role:admin')->get('/dashboard', 'HomeController@index')->name('dashboard');

Route::group(['middleware' => ['role:admin']], function () {
    Route::get('/dashboard', 'HomeController@index')->name('dashboard');
    Route::get('ktp', 'KtpController@index')->name('ktp.index');
    Route::get('create', 'KtpController@create')->name('ktp.create');
    Route::post('/store', 'KtpController@store')->name('ktp.store');
    // Route::post('/store/{id}', 'KtpController@store')->name('ktp.store');
    Route::get('/edit/{id}', 'KtpController@edit')->name('ktp.edit');
    Route::put('/update/{id}', 'KtpController@update')->name('ktp.update');
    Route::delete('/destroy/{id}', 'KtpController@destroy')->name('ktp.destroy');
    Route::get('/import', 'KtpController@import');
    Route::get('/export', 'KtpController@export');

    Route::get('/show/{id}', 'KtpController@show')->name('ktp.show');
    
    Route::post('/data', 'KtpController@data')->name('ktp.data');
    
    route::get('laporan', "KtpController@pdf");
});

// Route::middleware('role:admin')->get('/dashboard', function(){
//     return 'Dashboard';
// })->name('dashboard');
