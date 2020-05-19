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



Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/pajak', 'PajakController@index')->name('pajak');
Route::get('/petugas', 'PetugasController@index')->name('pajak');
/*Route::get('/pajak/{id}', 'PajakController@indexbyId');*/
Route::get('/pajak/{id}', 'PajakController@delete');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
