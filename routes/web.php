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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::resource('home', 'HomeController');

Route::put('get-ban', 'HomeController@getBan')->name('home.get-ban');
Route::delete('/delete/{id}', 'HomeController@delete')->name('home.delete');