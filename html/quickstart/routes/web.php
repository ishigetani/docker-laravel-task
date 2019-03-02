<?php

use Illuminate\Http\Request;

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

Route::redirect('/', '/login');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/home', 'HomeController@add')->name('task.add');
Route::delete('/home/{task}', 'HomeController@delete')->name('task.delete');

Route::get('/close_account', 'AccountController@close_confirm')->name('account.close_confirm');
Route::delete('/close_account', 'AccountController@close')->name('account.close');
